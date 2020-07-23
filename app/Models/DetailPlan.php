<?php

//Criar Model de Detalhes do Plano de Relacionamentos

//ANTES DE TUDO, EU FUI NO TERMINAL E DIGITEI
// php artisan make:model Models\DetailPlan -m
//Esse -m faz criar a migration tbm
//PARA CRIAR ISSO AQUI, TENDEU?

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table = 'details_plan';
    //dps vai lá no migration que criou 2020_06_20...

    //Cadastrar Novo Detalhe Plano
    protected $fillable = ['name'];
    
    //aqui faz o relacionamento de muitos pra um, através de um detalhe recupera o plano dele
    public function plan()
    {
        $this->belongsTo(Plan::class);
    }
}
