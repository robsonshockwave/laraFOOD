<!--Validar Planos-->

@if ($errors->any()) 
    <!--fará a impressão dos erros-->
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<!--Deletar Detalhes do Plano-->
@if (session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

<!--Não Permitir Deletar Plano com Detalhes-->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!--Vincular Permissões ao Perfil-->
@if (session('info'))
    <div class="alert alert-warning">
        {{ session('info') }}
    </div>
@endif