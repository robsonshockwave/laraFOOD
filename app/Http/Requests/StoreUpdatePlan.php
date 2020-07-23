<?php

//Validar Planos

//ANTES DE TUDO, EU FUI NO TERMINAL E DIGITEI
// php artisan make:request StoreUpdatePlan
//PARA CRIAR ISSO AQUI, TENDEU?

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        //aqui temos q colocar\/ o seguimento da url do plano, onde pegará ela e ignorará ela no caso da editar planos
        $url = $this->segment(3);

        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url", //ATENÇÃO
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
