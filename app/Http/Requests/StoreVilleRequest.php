<?php

namespace App\Http\Requests;

use App\Models\Ville;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVilleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ville_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
                'unique:villes',
            ],
        ];
    }
}
