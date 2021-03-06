<!--Listar os Permissões de um Perfil-->

@extends('adminlte::page')

@section('title', 'Permissões do Perfil {$profile->name}')

@section('content_header')
    <!--Breadcrumb - aquele negócio em cima-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('profiles.index') }}">Permissões do Perfil</a>
        </li>
    </ol>
    <!-- https://fontawesome.com/icons?d=gallery&q=add -->
    <h1>Permissões do Perfil <strong>{{ $profile->name }}</strong></h1>
    {{-- Vincular Permissões ao Perfil --}}
    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO<i class="fas fa-plus-square"></i></a>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome: </th>
                        <th width="60px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px">
                                <!--<a href="{ { route('details.permission.index', $permission->url)}}" class="btn btn-primary">DETALHES</a>-->
                                <!---->
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id])}}" class="btn btn-danger">REMOVER</a>
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

