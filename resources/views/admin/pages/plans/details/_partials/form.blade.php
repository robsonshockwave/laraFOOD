<!--Validar Detalhe do Plano-->
@include('admin.includes.alerts')

<!-- Cadastrar Novo Detalhe Plano -->
@csrf

<div class="form-group">
    <label>Nome: </label>                                                <!--ele respeita oq já tinha \/ -->
<input type="text" name="name" placeholder="Nome" class="form-control" value="{{ $detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>