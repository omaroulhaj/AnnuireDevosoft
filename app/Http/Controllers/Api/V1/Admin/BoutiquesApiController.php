<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBoutiqueRequest;
use App\Http\Requests\UpdateBoutiqueRequest;
use App\Http\Resources\Admin\BoutiqueResource;
use App\Models\Boutique;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoutiquesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('boutique_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BoutiqueResource(Boutique::with(['categorie', 'ville'])->get());
    }

    public function store(StoreBoutiqueRequest $request)
    {
        $boutique = Boutique::create($request->all());

        foreach ($request->input('galery', []) as $file) {
            $boutique->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('galery');
        }

        foreach ($request->input('video', []) as $file) {
            $boutique->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('video');
        }

        return (new BoutiqueResource($boutique))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Boutique $boutique)
    {
        abort_if(Gate::denies('boutique_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BoutiqueResource($boutique->load(['categorie', 'ville']));
    }

    public function update(UpdateBoutiqueRequest $request, Boutique $boutique)
    {
        $boutique->update($request->all());

        if (count($boutique->galery) > 0) {
            foreach ($boutique->galery as $media) {
                if (! in_array($media->file_name, $request->input('galery', []))) {
                    $media->delete();
                }
            }
        }
        $media = $boutique->galery->pluck('file_name')->toArray();
        foreach ($request->input('galery', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $boutique->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('galery');
            }
        }

        if (count($boutique->video) > 0) {
            foreach ($boutique->video as $media) {
                if (! in_array($media->file_name, $request->input('video', []))) {
                    $media->delete();
                }
            }
        }
        $media = $boutique->video->pluck('file_name')->toArray();
        foreach ($request->input('video', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $boutique->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('video');
            }
        }

        return (new BoutiqueResource($boutique))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Boutique $boutique)
    {
        abort_if(Gate::denies('boutique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boutique->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
