<!-- Detalhes e Deletar Perfil -->

@extends('adminlte::page')

@section('title', "Destalhes do Cliente {$cliente->name}")

@section('content_header')
<h1>Detalhes do Cliente <b>{{$cliente->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--Irá exibir todas as informações do plano-->
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $cliente->name }}
                </li>
                <li>
                    <strong>Idade: </strong> {{ $cliente->birth }}
                </li>
                <li>
                    <strong>Telefone: </strong> {{ $cliente->fone }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $cliente->email }}
                </li>
            </ul>
            <!-- Não Permitir Deletar Plano com Detalhes -->
            @include('admin.includes.alerts')

            <!--Deletar um plano faça isso-->
            <form action="{{ route('clients.destroy', $cliente->id) }}" method="POST">
                @csrf
                @method('DELETE') <!--quando for método post e delete usa esses dois-->
                <button type="submit" class="btn btn-danger">DELETAR O CLIENTE {{ $cliente->name }} <i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>

@endsection