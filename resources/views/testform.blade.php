<form action="{{ route('admin.cities.store') }}" method="POST">
    @csrf
    <input type="text" name="nome" value="Teste" />
    <select name="estado">
        <option value="MG">MG</option>
    </select>
    <button type="submit">Enviar</button>
</form>
