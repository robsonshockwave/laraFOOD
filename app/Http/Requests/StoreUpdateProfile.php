<?php

//Validar Planos

//ANTES DE TUDO, EU FUI NO TERMINAL E DIGITEI
// php artisan make:request StoreUpdateProfile
//PARA CRIAR ISSO AQUI, TENDEU?

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProfile extends FormRequest
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
        $id = $this->segment(3);
        return [
            'name' => "required|min:3|max:255||unique:profiles,name,{$id},id",
            'cnpj' => 'min:14|max:14',
            'fone' => 'nullable',
            'email' => 'nullable|email:rfc,dns',
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
