@csrf
<div class="mb-3">
    <label for="nome" class="form-label">Nome da Cidade</label>
    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $city->nome ?? '') }}">
</div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado (UF)</label>
    <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado', $city->estado ?? '') }}">
</div>
