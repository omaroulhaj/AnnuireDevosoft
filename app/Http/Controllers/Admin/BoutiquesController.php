<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBoutiqueRequest;
use App\Http\Requests\StoreBoutiqueRequest;
use App\Http\Requests\UpdateBoutiqueRequest;
use App\Models\Boutique;
use App\Models\Category;
use App\Models\Ville;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BoutiquesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('boutique_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boutiques = Boutique::with(['categorie', 'ville', 'media'])->get();

        return view('admin.boutiques.index', compact('boutiques'));
    }

    public function create()
    {
        abort_if(Gate::denies('boutique_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $villes = Ville::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.boutiques.create', compact('categories', 'villes'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $boutique->id]);
        }

        return redirect()->route('admin.boutiques.index');
    }

    public function edit(Boutique $boutique)
    {
        abort_if(Gate::denies('boutique_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $villes = Ville::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boutique->load('categorie', 'ville');

        return view('admin.boutiques.edit', compact('boutique', 'categories', 'villes'));
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

        return redirect()->route('admin.boutiques.index');
    }

    public function show(Boutique $boutique)
    {
        abort_if(Gate::denies('boutique_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boutique->load('categorie', 'ville');

        return view('admin.boutiques.show', compact('boutique'));
    }

    public function destroy(Boutique $boutique)
    {
        abort_if(Gate::denies('boutique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boutique->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoutiqueRequest $request)
    {
        $boutiques = Boutique::find(request('ids'));

        foreach ($boutiques as $boutique) {
            $boutique->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('boutique_create') && Gate::denies('boutique_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Boutique();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
