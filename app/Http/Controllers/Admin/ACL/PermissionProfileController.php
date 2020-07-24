<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    //Listar as Permissões de um Perfil
    protected $profile;
    protected $permission;

    public function __construct(Profile $profile, Permission $permission) //lembre-se de importar
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    //primeiro vai listar as permissões de um perfil
    public function permissions($idProfile)
    {
        //primeiro vai recuperar o perfil pelo id
        $profile = $this->profile->find($idProfile);
        if(!$profile) {
            return redirect()->back();
        } //dps disso vai lá em Models e em Profile.php

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
        //dps disso vai lá e cria pasta dentro de profiles e nela cria uma view permissions.blade.php
    }

    //Vincular Permissões ao Perfil
    public function permissionsAvailable($idProfile)
    {
        if(!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $permissions = $this->permission->paginate(); //como vai trabalhar com links precisa paginar

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
        //dps disso vai lá e cria pasta dentro de profiles e nela cria uma view available.blade.php
    }
    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if(!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        //pra fazer selecionar pelo menos uma permissão
        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $profile->permissions()->attach($request->permissions); //esse método attach() faz vincular

        return redirect()->route('profiles.permissions', $profile->id);
    }
}
