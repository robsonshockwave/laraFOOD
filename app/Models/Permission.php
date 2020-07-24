<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    //Listar as Permissões de um Perfil
    /**
     * Get Profiles
     */

    public function profiles() //relacionamento para recuperar as profiles dessa permissão
    {
        return $this->belongsToMany(Profile::class);
    }
}
