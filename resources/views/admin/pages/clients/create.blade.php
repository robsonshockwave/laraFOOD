<!-- Cadastrar Novo Plano -->

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Cliente')

@section('content_header')
<h1>Cadastrar Novo Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--criando um form em bootstrap-->
            <form action="{{ route('clients.store') }}" class="form" method="POST">
                <!--esse @ csrf é usado para questões de segurança e ele retorna erro também-->
                @csrf

                @include('admin.pages.clients._partials.form')
            </form>
        </div>
    </div>
@endsection