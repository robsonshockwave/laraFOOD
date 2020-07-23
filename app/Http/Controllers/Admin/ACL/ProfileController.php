<?php

//Listar os Perfils
//criou ele com resource

namespace App\Http\Controllers\Admin\ACL;

//Validar Perfil
//tem q importar essa classe
use App\Http\Requests\StoreUpdateProfile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //Listar os Perfils
    protected $repository;

    public function __construct(Profile $profile) //lembre-se de importar
    {
        $this->repository = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar os Perfils
        $profiles = $this->repository->paginate();
    
        return view('admin.pages.profiles.index', compact('profiles'));
        //dps vamos criar uma interface para esse controller para ter a definicação de uma rota padrão, 
        //pra que se um dia tiver q renomear essa pasta para admin, para chamar o nome que quiser, tem a libertade de mudar na interface e não tem o risco de quebrar todo o controller
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //Cadastrar Perfil
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *                  aqui eu troqueiiii \/ tem q mudar o caminho ATENÇÃOOOOOOO
     * @param  \App\Http\Requests\StoreUpdateProfile  $request
     * @return \Illuminate\Http\Response
     */

    //Cadastrar Perfil
    public function store(StoreUpdateProfile $request) //tem q mudar ali e colcoar o StoreUpdateProfile
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Editar Perfil
    public function edit($id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *                      aqui eu troqueiiii \/ tem q mudar o caminho ATENÇÃOOOOOOO
     * @param  \App\Http\Requests\StoreUpdateProfile  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Editar Perfil
    public function update(StoreUpdateProfile $request, $id) //tem q mudar ali e colcoar o StoreUpdateProfile
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profiles.index');
    }

    /**
     * Search results.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //se a implementação ficar muito grande é interessante que leve pro repository ou até mesmo pro model

        $filter = $request->only('filter');

        $profiles = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', $request->filter);
                                    $query->orwhere('description', 'LIKE', "%{$request->filter}%");
                                    $query->orwhere('cnpj', 'LIKE', "%{$request->filter}%");
                                    $query->orwhere('email', 'LIKE', "%{$request->filter}%"); 
                                }
                            })
                            ->paginate();
    
        return view('admin.pages.profiles.index', compact('profiles', 'filter'));
    }
}
