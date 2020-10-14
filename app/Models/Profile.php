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

    //Listar Apenas Permissões disponíveis para o perfil
    /**
     * Permission not linked with this profile
     */
    public function permissionsAvailable($filter = null) //esse dentro do () veio do //Filtrar Permissões disponíveis
    {   
        //$this->id; //vai pegar o id desse perfil, o objeto desse perfil
        $permissions = Permission::whereNotIn('permissions.id', function($query){ //vai receber as permissoes q n recebe a query
            $query->select('permission_profile.permission_id'); //especifica qual coluna quer trazer
            $query->from('permission_profile'); //qual a tabela que está filtrando
            $query->whereRaw("permission_profile.profile_id={$this->id}"); //vai pegar o id
            })//Filtrar Permissões disponíveis
            ->where(function($queryFilter) use ($filter){
                if($filter)
                    $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();
        
        return $permissions;
    }
}
