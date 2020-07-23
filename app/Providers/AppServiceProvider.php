<?php

namespace App\Providers;

use App\Models\Plan;
use App\Observers\PlanObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Criar Observer de Plano
        //tem q importar
        Plan::observe(PlanObserver::class);
    }
}
