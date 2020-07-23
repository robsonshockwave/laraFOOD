<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Criar Model de Detalhes do Plano de Relacionamentos
    
    public function up()
    {
        Schema::create('details_plan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Criar Model de Detalhes do Plano de Relacionamentos
            $table->string('name');
            //Depois vai no terminal e digita php artisan migrate

            //Listar os Detalhes do Plano
            //Deu erro SQLSTATE[42S22]: Column not found: 1054 Unknown column 'details_plan.plan_id, precisa fazer isso
            $table->unsignedBigInteger('plan_id');

            $table->foreign('plan_id')
                        ->references('id')
                        ->on('plans')
                        ->onDelete('cascade');
            //vai lá no site do mysql deleta a tabela de details_plan e depois vai na tabela de migrations e apaga o registro dela, simples
            //depois vai no terminal e digita
            //php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_plans');
    }
}
