@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome: " value="{{ $cliente->name ?? old('name') }}"> <!--esse old('') vai fazer voltar com os campos preenchidos caso rejeitado-->
</div>
<div class="form-group">
    <label>Idade:</label>
    <input type="text" name="birth" class="form-control" placeholder="Idade: " value="{{ $cliente->birth ?? old('birth') }}">
</div>
<div class="form-group">
    <label>Telefone:</label>
    <input type="text" name="fone" class="form-control" placeholder="Telefone: " value="{{ $cliente->fone ?? old('fone') }}">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="text" name="email" class="form-control" placeholder="E-mail: " value="{{ $cliente->email ?? old('email') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>