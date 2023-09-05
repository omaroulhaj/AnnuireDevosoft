<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVilleRequest;
use App\Http\Requests\StoreVilleRequest;
use App\Http\Requests\UpdateVilleRequest;
use App\Models\Ville;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VillesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ville_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villes = Ville::all();

        return view('admin.villes.index', compact('villes'));
    }

    public function create()
    {
        abort_if(Gate::denies('ville_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villes.create');
    }

    public function store(StoreVilleRequest $request)
    {
        $ville = Ville::create($request->all());

        return redirect()->route('admin.villes.index');
    }

    public function edit(Ville $ville)
    {
        abort_if(Gate::denies('ville_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villes.edit', compact('ville'));
    }

    public function update(UpdateVilleRequest $request, Ville $ville)
    {
        $ville->update($request->all());

        return redirect()->route('admin.villes.index');
    }

    public function show(Ville $ville)
    {
        abort_if(Gate::denies('ville_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ville->load('villeBoutiques');

        return view('admin.villes.show', compact('ville'));
    }

    public function destroy(Ville $ville)
    {
        abort_if(Gate::denies('ville_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ville->delete();

        return back();
    }

    public function massDestroy(MassDestroyVilleRequest $request)
    {
        $villes = Ville::find(request('ids'));

        foreach ($villes as $ville) {
            $ville->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
