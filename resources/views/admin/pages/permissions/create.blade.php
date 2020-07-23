<!-- Cadastrar Novo Plano -->

@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
<h1>Cadastrar Nova Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--criando um form em bootstrap-->
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                <!--esse @ csrf é usado para questões de segurança e ele retorna erro também-->
                @csrf

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection