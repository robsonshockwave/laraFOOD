<!--Deletar Detalhes do Plano-->

@extends('adminlte::page')

@section('title', "Detalhes do Plano {$detail->name}")

@section('content_header')
    <!--Breadcrumb - aquele negócio em cima-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="active">Detalhes</a>
        </li>
    </ol>
    <!--Melhorias no módulo de planos-->
    <!-- https://fontawesome.com/icons?d=gallery&q=add -->
    <h1>Detalhe do Planos {{ $detail->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$detail->name}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o Detalhe {{ $detail->name }}, do Plano {{ $plan->name }}</button>
            </form>
        </div>
    </div>
@endsection