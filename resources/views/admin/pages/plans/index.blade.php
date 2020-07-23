<!--Organizar Rota e Preparar Listagem dos Planos no Laravel-->

@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <!--Breadcrumb - aquele negócio em cima-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>
    </ol>
    <!--Melhorias no módulo de Planos-->
    <!-- https://fontawesome.com/icons?d=gallery&q=add -->
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <!--FILTRO - Pesquisar um plano-->
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf <!--sempre que for post utiliza o @ csrf-->
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? ''}}"> <!--esse value deixa o campo preenchido com último valor digitado-->
                <button type="submit" class="btn btn-dark">PESQUISAR</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="260px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width=10px">
                                <!--Listar os Detalhes do Plano-->
                                <a href="{{ route('details.plan.index', $plan->url)}}" class="btn btn-primary">DETALHES</a>
                                <!---->
                                <a href="{{ route('plans.edit', $plan->url)}}" class="btn btn-info">EDITAR</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--criar paginação com links()-->
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
<!---->

