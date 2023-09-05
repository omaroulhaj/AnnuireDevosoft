@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.boutique.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boutiques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.id') }}
                        </th>
                        <td>
                            {{ $boutique->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.nom') }}
                        </th>
                        <td>
                            {{ $boutique->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Boutique::TYPE_SELECT[$boutique->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.categorie') }}
                        </th>
                        <td>
                            {{ $boutique->categorie->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.ville') }}
                        </th>
                        <td>
                            {{ $boutique->ville->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.email') }}
                        </th>
                        <td>
                            {{ $boutique->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.telephone') }}
                        </th>
                        <td>
                            {{ $boutique->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.image') }}
                        </th>
                        <td>
                            {{ $boutique->image }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.galery') }}
                        </th>
                        <td>
                            @foreach($boutique->galery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.video') }}
                        </th>
                        <td>
                            @foreach($boutique->video as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.site_web') }}
                        </th>
                        <td>
                            {{ $boutique->site_web }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.facebook') }}
                        </th>
                        <td>
                            {{ $boutique->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.instagram') }}
                        </th>
                        <td>
                            {{ $boutique->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.tiktok') }}
                        </th>
                        <td>
                            {{ $boutique->tiktok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.youtube') }}
                        </th>
                        <td>
                            {{ $boutique->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.longitude') }}
                        </th>
                        <td>
                            {{ $boutique->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boutique.fields.latitude') }}
                        </th>
                        <td>
                            {{ $boutique->latitude }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boutiques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection