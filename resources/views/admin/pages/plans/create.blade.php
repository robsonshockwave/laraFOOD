<!-- Cadastrar Novo Plano -->

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
<h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--criando um form em bootstrap-->
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                <!--esse @ csrf é usado para questões de segurança e ele retorna erro também-->
                @csrf

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection