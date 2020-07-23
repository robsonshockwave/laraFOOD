<!-- Mostrar Detalhes do Plano - VER -->

@extends('adminlte::page')

@section('title', "Destalhes do Plano {$plan->name}")

@section('content_header')
<h1>Detalhes do Plano <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--Irá exibir todas as informações do plano-->
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $plan->url }}
                </li>
            </ul>
            <!-- Não Permitir Deletar Plano com Detalhes -->
            @include('admin.includes.alerts')

            <!--Deletar um plano faça isso-->
            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE') <!--quando for método post e delete usa esses dois-->
                <button type="submit" class="btn btn-danger">DELETAR O PLANO {{ $plan->name }} <i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>

@endsection