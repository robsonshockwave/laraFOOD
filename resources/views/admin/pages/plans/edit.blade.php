<!-- Editar um Plano -->

@extends('adminlte::page')

@section('title', "Editar o Plano {$plan->name}")

@section('content_header')
<h1>Editar o Plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--criando um form em bootstrap-->
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                <!--esse @ csrf é usado para questões de segurança e ele retorna erro também-->
                @csrf
                <!-- quando for atuallizar precisa desse @ method('PUT')-->
                @method('PUT')

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection