<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //Criar Model e Migration de Planos no Laravel   
    //plans
    protected $fillable = ['name', 'url', 'price', 'description'];
    //cria um banco de dados no mysql
    // dps no terminal: php artisan migrate

    //Pesquisar um plano - Filtrar
    //representa não só o model como o repository
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%") //irá pesquisar o nome, independente se estiover no meio, início ou fim ou cortado
                        ->orWhere('description', 'LIKE', "%{$filter}%") //irá pesquisar na descrição também
                        ->paginate(10); //lista as opções encontradas

        return $results;
    }

    //Criar Model de Detalhes do Plano de Relacionamentos
    //Um plano pode ter vários detalhes e um detalhe é específico de um plano
    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }
}
