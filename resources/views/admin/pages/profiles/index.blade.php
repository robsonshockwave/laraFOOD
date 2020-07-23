<!--Listar os Perfils-->

@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <!--Breadcrumb - aquele negócio em cima-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('profiles.index') }}">Perfil</a>
        </li>
    </ol>
    <!--Melhorias no módulo de Planos-->
    <!-- https://fontawesome.com/icons?d=gallery&q=add -->
    <h1>Perfil <a href="{{ route('profiles.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <!--FILTRO - Pesquisar um plano-->
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf <!--sempre que for post utiliza o @ csrf-->
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? ''}}"> <!--esse value deixa o campo preenchido com último valor digitado-->
                <button type="submit" class="btn btn-dark">PESQUISAR</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome: </th>
                        <th>CNPJ: </th>
                        <th>Telefone: </th>
                        <th>E-mail: </th>
                        <th width="260px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td>
                                {{ $profile->cnpj }}
                            </td>
                            <td>
                                {{ $profile->fone }}
                            </td>
                            <td>
                                {{ $profile->email }}
                            </td>
                            <td style="width=10px">
                                <!--Listar os Detalhes do Plano-->
                                <!--<a href="{ { route('details.profile.index', $profile->url)}}" class="btn btn-primary">DETALHES</a>-->
                                <!---->
                                <a href="{{ route('profiles.edit', $profile->id)}}" class="btn btn-info">EDITAR</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--criar paginação com links()-->
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
<!---->

