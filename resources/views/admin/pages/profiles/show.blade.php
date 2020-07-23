<!-- Detalhes e Deletar Perfil -->

@extends('adminlte::page')

@section('title', "Destalhes do Perfil {$profile->name}")

@section('content_header')
<h1>Detalhes do Perfil <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--Irá exibir todas as informações do plano-->
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Cnpj: </strong> {{ $profile->cnpj }}
                </li>
                <li>
                    <strong>Telefone: </strong> {{ $profile->fone }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $profile->email }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>
            <!-- Não Permitir Deletar Plano com Detalhes -->
            @include('admin.includes.alerts')

            <!--Deletar um plano faça isso-->
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE') <!--quando for método post e delete usa esses dois-->
                <button type="submit" class="btn btn-danger">DELETAR O PERFIL {{ $profile->name }} <i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>

@endsection