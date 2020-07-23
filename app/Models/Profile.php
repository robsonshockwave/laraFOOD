<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Cadastrar Perfil

    protected $fillable = ['name', 'cnpj', 'fone', 'email', 'description'];
}
