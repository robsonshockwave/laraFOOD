@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome: " value="{{ $permission->name ?? old('name') }}"> <!--esse old('') vai fazer voltar com os campos preenchidos caso rejeitado-->
</div>
<div class="form-group">
    <label>Observação:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição: " value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>