<?php

namespace App\Http\Requests;

use App\Models\Ville;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVilleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ville_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
                'unique:villes,nom,' . request()->route('ville')->id,
            ],
        ];
    }
}
