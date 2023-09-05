<?php

namespace App\Http\Requests;

use App\Models\Boutique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBoutiqueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('boutique_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'categorie_id' => [
                'required',
                'integer',
            ],
            'ville_id' => [
                'required',
                'integer',
            ],
            'telephone' => [
                'string',
                'nullable',
            ],
            'image' => [
                'string',
                'nullable',
            ],
            'galery' => [
                'array',
            ],
            'video' => [
                'array',
            ],
            'site_web' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'tiktok' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'numeric',
            ],
            'latitude' => [
                'numeric',
            ],
        ];
    }
}
