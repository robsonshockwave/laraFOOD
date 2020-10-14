<!--Listar Perfis da Permissão-->

@extends('adminlte::page')

@section('title', "Perfis da Permissão {$permission->name}")

@section('content_header')
    <!--Breadcrumb - aquele negócio em cima-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('permissions.index') }}">Perfis da Permissão</a>
        </li>
    </ol>
    <!-- https://fontawesome.com/icons?d=gallery&q=add -->
    <h1>Perfis da Permissão <strong>{{ $permission->name }}</strong></h1>
    
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width=10px">
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
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
<!---->

