<!-- Detalhes e Deletar Perfil -->

@extends('adminlte::page')

@section('title', "Destalhes da Permissão {$permission->name}")

@section('content_header')
<h1>Detalhes da Permissão <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--Irá exibir todas as informações do plano-->
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Observação: </strong> {{ $permission->description }}
                </li>
            </ul>
            <!-- Não Permitir Deletar Plano com Detalhes -->
            @include('admin.includes.alerts')

            <!--Deletar um plano faça isso-->
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE') <!--quando for método post e delete usa esses dois-->
                <button type="submit" class="btn btn-danger">DELETAR A PERMISSÃO {{ $permission->name }} <i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>

@endsection