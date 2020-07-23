@extends('adminlte::page')

@section('title', "Editar o Cliente {$cliente->name}")

@section('content_header')
<h1>Editar o Cliente {{ $cliente->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--criando um form em bootstrap-->
            <form action="{{ route('clients.update', $cliente->id) }}" class="form" method="POST">
                <!--esse @ csrf é usado para questões de segurança e ele retorna erro também-->
                <!--@ csrf <- ele ficou lá no form-->
                <!-- quando for atuallizar precisa desse @ method('PUT')-->
                @method('PUT')

                @include('admin.pages.clients._partials.form')
            </form>
        </div>
    </div>
@endsection