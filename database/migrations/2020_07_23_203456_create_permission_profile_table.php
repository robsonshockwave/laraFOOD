<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_profile', function (Blueprint $table) {

            //Listar as Permissões de um Perfil
            //antes disso digitei no terminal: php artisan make:migration create_permission_profile_table
            $table->id();

            $table->unsignedBigInteger('permission_id'); //vai relacionar com a tabela de permissão
            $table->unsignedBigInteger('profile_id'); //vai relacionar com a tabela de profile

            $table->foreign('permission_id') //vai criar como CHAVE ESTRANGEIRA
                        ->references('id') //vai falar que a coluna permission_id faz referência com a culana id da tabela permissions
                        ->on('permissions')
                        ->onDelete('cascade');
            $table->foreign('profile_id')
                        ->references('id')
                        ->on('profiles')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_profile');
    }
}
