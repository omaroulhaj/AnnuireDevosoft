<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Boutique extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'boutiques';

    protected $appends = [
        'galery',
        'video',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'entreprise'  => 'entreprise',
        'particulier' => 'particulier',
    ];

    protected $fillable = [
        'nom',
        'type',
        'categorie_id',
        'ville_id',
        'email',
        'telephone',
        'image',
        'site_web',
        'facebook',
        'instagram',
        'tiktok',
        'youtube',
        'longitude',
        'latitude',
        'created_at',
        'updated_at',
        'deleted_at',
        'image_url',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function getGaleryAttribute()
    {
        $files = $this->getMedia('galery');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video');
    }
  
}
