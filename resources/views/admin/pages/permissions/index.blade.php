<!--Organizar Rota e Preparar Listagem dos Permissao no Laravel-->

@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <!--Breadcrumb - aquele negócio em cima-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('permissions.index') }}">Permissões</a>
        </li>
    </ol>
    <!--Melhorias no módulo de Permissao-->
    <!-- https://fontawesome.com/icons?d=gallery&q=add -->
    <h1>Permissões <a href="{{ route('permissions.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <!--FILTRO - Pesquisar um Permissao-->
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
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
                        <th width="260px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px">
                                <!--Listar os Detalhes do Permissao-->
                                {{-- <a href="{{ route('details.permission.index', $permission->id)}}" class="btn btn-primary">DETALHES</a> --}}
                                <!---->
                                <a href="{{ route('permissions.edit', $permission->id)}}" class="btn btn-info">EDITAR</a>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--criar paginação com links()-->
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
<!---->

