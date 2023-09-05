@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ville.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.villes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ville.fields.id') }}
                        </th>
                        <td>
                            {{ $ville->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ville.fields.nom') }}
                        </th>
                        <td>
                            {{ $ville->nom }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.villes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#ville_boutiques" role="tab" data-toggle="tab">
                {{ trans('cruds.boutique.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ville_boutiques">
            @includeIf('admin.villes.relationships.villeBoutiques', ['boutiques' => $ville->villeBoutiques])
        </div>
    </div>
</div>

@endsection