<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Cadastrar Perfil

    protected $fillable = ['name', 'cnpj', 'fone', 'email', 'description'];

    //Listar as Permissões de um Perfil
    /**
     * Get Permissions
     */

    public function permissions() //relacionamento para recuperar as permissions desse perfil
    {
        return $this->belongsToMany(Permission::class);
    } //dps q fizer isso vai em Models e em Permission.php e faça a msm coisa
}
