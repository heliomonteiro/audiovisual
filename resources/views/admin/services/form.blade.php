@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <strong>Erros encontrados:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Nome</label>
    <input type="text" name="nome" value="{{ old('nome', $service->nome ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Tipo</label>
    <input type="text" name="tipo" value="{{ old('tipo', $service->tipo ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Descrição</label>
    <textarea name="descricao"
        class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
        rows="3">{{ old('descricao', $service->descricao ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Cidade</label>
    <select name="cidade_id"
        class="form-select mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
        <option value="">Selecione uma cidade</option>
        @foreach($cities as $cidade)
            <option value="{{ $cidade->id }}"
                {{ old('cidade_id', $service->cidade_id ?? '') == $cidade->id ? 'selected' : '' }}>
                {{ $cidade->nome }} - {{ $cidade->estado }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Latitude</label>
    <input type="number" step="any" name="lat" value="{{ old('lat', $service->lat ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Longitude</label>
    <input type="number" step="any" name="lng" value="{{ old('lng', $service->lng ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="flex items-center justify-end mt-4">
    <button type="submit"
        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        Salvar
    </button>
</div>
