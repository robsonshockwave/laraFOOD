<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

//Cadastrar Novo Plano - para preencher a url por aqui
//use Illuminate\Support\Str;

//Organizar Rota e Preparar Listagem dos Planos no Laravel
class PlanController extends Controller
{      
    //Listar Planos
    private $repository; //objeto do model plan

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    
    public function index()
    {   
        //para todos os planos é ->all() e quantidade de páginas é ->paginate(n de itens) por default é 15
        //->lasted do mais recente pro antigo
        $plans = $this->repository->latest()->paginate(10);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    //Cadastrar Novo Plano
    //view
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    //cadastro em si - sql
    //Validar Planos -------\/ tem q importar
    public function store(StoreUpdatePlan $request) //request pega os dados do formulário
    {   
        //Criar Observer de Plano
        //$data = $request->all();
        //$data['url'] = Str::kebab($request->name);

        $this->repository->create($request->all());
        return redirect()->route('plans.index');
        //dps vá para providers e AppServiceProvider.php
    }

    //Mostrar detalhes do plano ao clicar em VER
    public function show($url) //recebe a url
    {
        //where recuperar certo e o find só pelo id, o first retorna um único registro
        $plan = $this->repository->where('url', $url)->first();
        //caso n encontrar volta
        if(!$plan)
            return redirect()->back();
        //vai passar todas as informações do plano para a view
        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    //Deletar um plano
    public function destroy($url)
    {
        //where recuperar certo e o find só pelo id, o first retorna um único registro
        $plan = $this->repository
                        //Não Permitir Deletar Plano com Detalhes
                        ->with('details')

                        ->where('url', $url)
                        ->first();
        
        //Não Permitir Deletar Plano com Detalhes
        if ($plan->details->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem detalhes vinculados, portanto exclua os detalhes primeiro!');
        }
        
        //caso n encontrar volta
        if(!$plan)
            return redirect()->back();
        //delete o plano
        $plan->delete();
        //volta para rota de listagem de planos
        return redirect()->route('plans.index');
    }

    //Pesquisar um plano - Filtrar
    public function search(Request $request)
    {
        $filters = $request->except('_token'); //esse except('_token') não faz mostrar o token na url

        $plans = $this->repository->search($request->filter);
        
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    //Editando um plano
    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();
        
        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }
    //Editando um plano
    //Validar Planos -------\/ tem q importar
    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();
        
        if(!$plan)
            return redirect()->back();
        //esse método ->uptade que irá atualizar
        $plan->update($request->all());
        //dps irá redirecionar novamente pra rota de planos
        return redirect()->route('plans.index');
    }
}




