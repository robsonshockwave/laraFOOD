<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            //Criar Model e Migration do Perfil
            $table->string('name')->unique();
            $table->string('description')->nullable();
            //depois no terminal digite isso para criar o banco de dados no mysql
            //php artisan migrate
            
            //delete depois
            $table->string('email')->unique();
            $table->double('cnpj'); //aqui esqueci de colocar ->nullable(); para ser opcional 
            $table->double('fone'); //aqui esqueci de colocar ->nullable(); para ser opcional 
            //

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
