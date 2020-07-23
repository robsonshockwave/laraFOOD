<?php

//Validar Detalhe do Plano

//ANTES DE TUDO, EU FUI NO TERMINAL E DIGITEI
// php artisan make:request StoreUpdateDetailPlan
//PARA CRIAR ISSO AQUI, TENDEU?

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDetailPlan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //aqui tava false e mudei pra true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
        ];
    }
}
