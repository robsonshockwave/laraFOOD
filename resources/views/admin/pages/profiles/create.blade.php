<!-- Cadastrar Perfil -->

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
<h1>Cadastrar Novo Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--criando um form em bootstrap-->
            <form action="{{ route('profiles.store') }}" class="form" method="POST">
                <!--esse @ csrf é usado para questões de segurança e ele retorna erro também-->
                @csrf

                <!--aqui eu criei a pasta _partials e o form que está lá dentro, e chamei eles aqui-->
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div> 
@endsection