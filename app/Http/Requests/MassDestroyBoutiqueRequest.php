<?php

namespace App\Http\Requests;

use App\Models\Boutique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBoutiqueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('boutique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:boutiques,id',
        ];
    }
}
