<?php

//Criar Observer de Plano

//ANTES DE TUDO, EU FUI NO TERMINAL E DIGITEI
// php artisan make:observer PlanObserver --model=Models\Plan 
//PARA CRIAR ISSO AQUI, TENDEU?

namespace App\Observers;

use App\Models\Plan;

//importe isso para usar no creating e updating
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */

     //Criar Observer de Plano
    public function creating(Plan $plan)//troquei o created por creating
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "updated" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)//troquei o update por updating
    {
        $plan->url = Str::kebab($plan->name);
    }

    //deletei o resto
}
