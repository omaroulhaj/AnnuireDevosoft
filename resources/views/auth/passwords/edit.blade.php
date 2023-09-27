@extends('layouts.admin')
@section('content')

<style>
    .my-buttonp {
    background-size: cover;
    background-repeat: no-repeat;
    width: 100px;
    height:100px;
    margin-top: 15px;
    border: none;
  }
</style>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                {{ trans('global.my_profile') }}
                <div class="form-group">
                    <button class="my-buttonp rounded-circle"  style=" background-image: url('data:image/png;base64,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');"></button>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("profile.password.updateProfile") }}">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                {{ trans('global.change_password') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route("profile.password.update") }}">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="password">New {{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="required" for="password_confirmation">Repeat New {{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                {{ trans('global.delete_account') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("profile.password.destroyProfile") }}" onsubmit="return prompt('{{ __('global.delete_account_warning') }}') == '{{ auth()->user()->email }}'">
                    @csrf
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.delete') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection