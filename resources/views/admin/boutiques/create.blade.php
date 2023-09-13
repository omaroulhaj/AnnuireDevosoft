@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.boutique.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.boutiques.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.boutique.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.boutique.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Boutique::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categorie_id">{{ trans('cruds.boutique.fields.categorie') }}</label>
                <select class="form-control select2 {{ $errors->has('categorie') ? 'is-invalid' : '' }}" name="categorie_id" id="categorie_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('categorie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categorie'))
                    <span class="text-danger">{{ $errors->first('categorie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.categorie_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ville_id">{{ trans('cruds.boutique.fields.ville') }}</label>
                <select class="form-control select2 {{ $errors->has('ville') ? 'is-invalid' : '' }}" name="ville_id" id="ville_id" required>
                    @foreach($villes as $id => $entry)
                        <option value="{{ $id }}" {{ old('ville_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ville'))
                    <span class="text-danger">{{ $errors->first('ville') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.ville_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.boutique.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone">{{ trans('cruds.boutique.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" id="telephone" value="{{ old('telephone', '') }}">
                @if($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.boutique.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text" name="image" id="image" value="{{ old('image', '') }}">
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="galery">{{ trans('cruds.boutique.fields.galery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('galery') ? 'is-invalid' : '' }}" id="galery-dropzone">
                </div>
                @if($errors->has('galery'))
                    <span class="text-danger">{{ $errors->first('galery') }}</span>
                @endif
                <span class="help-block">{{trans('cruds.boutique.fields.galery_helper')}}</span>
            </div>
            <div class="form-group">
                <label for="video">{{ trans('cruds.boutique.fields.video') }}</label>
                <div class="needsclick dropzone {{ $errors->has('video') ? 'is-invalid' : '' }}" id="video-dropzone">
                </div>
                @if($errors->has('video'))
                    <span class="text-danger">{{ $errors->first('video') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_web">{{ trans('cruds.boutique.fields.site_web') }}</label>
                <input class="form-control {{ $errors->has('site_web') ? 'is-invalid' : '' }}" type="text" name="site_web" id="site_web" value="{{ old('site_web', '') }}">
                @if($errors->has('site_web'))
                    <span class="text-danger">{{ $errors->first('site_web') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.site_web_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.boutique.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.boutique.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tiktok">{{ trans('cruds.boutique.fields.tiktok') }}</label>
                <input class="form-control {{ $errors->has('tiktok') ? 'is-invalid' : '' }}" type="text" name="tiktok" id="tiktok" value="{{ old('tiktok', '') }}">
                @if($errors->has('tiktok'))
                    <span class="text-danger">{{ $errors->first('tiktok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.tiktok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.boutique.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                @if($errors->has('youtube'))
                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.boutique.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="number" name="longitude" id="longitude" value="{{ old('longitude', '') }}" step="0.0000000001">
                @if($errors->has('longitude'))
                    <span class="text-danger">{{ $errors->first('longitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.boutique.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="number" name="latitude" id="latitude" value="{{ old('latitude', '') }}" step="0.0000000001">
                @if($errors->has('latitude'))
                    <span class="text-danger">{{ $errors->first('latitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.boutique.fields.galery') }}</label>
                <input class="form-control {{ $errors->has('galery') ? 'is-invalid' : '' }}" type="file" name="galery_o" id="galery" value="{{ old('galery', '') }}" step="0.0000000001">
                @if($errors->has('galery'))
                    <span class="text-danger">{{ $errors->first('galery') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boutique.fields.galery_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedGaleryMap = {}
    Dropzone.options.galeryDropzone = {
    url: '{{ route('admin.boutiques.storeMedia') }}',
    maxFilesize: 100, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="galery[]" value="' + response.name + '">')
      uploadedGaleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGaleryMap[file.name]
      }
      $('form').find('input[name="galery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($boutique) && $boutique->galery)
      var files = {!! json_encode($boutique->galery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="galery[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
<script>
    var uploadedVideoMap = {}
Dropzone.options.videoDropzone = {
    url: '{{ route('admin.boutiques.storeMedia') }}',
    maxFilesize: 2000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="video[]" value="' + response.name + '">')
      uploadedVideoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedVideoMap[file.name]
      }
      $('form').find('input[name="video[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($boutique) && $boutique->video)
          var files =
            {!! json_encode($boutique->video) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="video[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection