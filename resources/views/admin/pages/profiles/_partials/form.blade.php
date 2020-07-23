<!--Cadastrar Perfil-->
@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome: " value="{{ $profile->name ?? old('name') }}"> <!--esse old('') vai fazer voltar com os campos preenchidos caso rejeitado-->
</div>
<div class="form-group">
    <label>CNPJ:</label>
    <input type="text" name="cnpj" class="form-control" placeholder="CNPJ: " value="{{ $profile->cnpj ?? old('cnpj') }}">
</div>
<div class="form-group">
    <label>Telefone:</label>
    <input type="text" name="fone" class="form-control" placeholder="Telefone: " value="{{ $profile->fone ?? old('fone') }}">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="text" name="email" class="form-control" placeholder="E-mail: " value="{{ $profile->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição: " value="{{ $profile->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>