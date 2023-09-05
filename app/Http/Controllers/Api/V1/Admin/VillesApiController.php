<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVilleRequest;
use App\Http\Requests\UpdateVilleRequest;
use App\Http\Resources\Admin\VilleResource;
use App\Models\Ville;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VillesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ville_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VilleResource(Ville::all());
    }

    public function store(StoreVilleRequest $request)
    {
        $ville = Ville::create($request->all());

        return (new VilleResource($ville))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ville $ville)
    {
        abort_if(Gate::denies('ville_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VilleResource($ville);
    }

    public function update(UpdateVilleRequest $request, Ville $ville)
    {
        $ville->update($request->all());

        return (new VilleResource($ville))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ville $ville)
    {
        abort_if(Gate::denies('ville_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ville->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
