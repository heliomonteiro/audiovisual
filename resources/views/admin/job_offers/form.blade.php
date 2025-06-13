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
    <input type="text" name="nome" value="{{ old('nome', $job_offer->nome ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Tipo</label>
    <input type="text" name="tipo" value="{{ old('tipo', $job_offer->tipo ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Descrição</label>
    <textarea name="descricao"
        class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
        rows="3">{{ old('descricao', $job_offer->descricao ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Cidade</label>
    <select name="cidade_id"
        class="form-select mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
        <option value="">Selecione uma cidade</option>
        @foreach($cities as $cidade)
            <option value="{{ $cidade->id }}"
                {{ old('cidade_id', $job_offer->cidade_id ?? '') == $cidade->id ? 'selected' : '' }}>
                {{ $cidade->nome }} - {{ $cidade->estado }}
            </option>
        @endforeach
    </select>
</div>

<!-- Inputs lat/lng -->
<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Latitude</label>
    <input type="text" name="lat" value="{{ old('lat', $job_offer->lat ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Longitude</label>
    <input type="text" name="lng" value="{{ old('lng', $job_offer->lng ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<!-- Aviso sobre como obter coordenadas -->
<div class="mb-6 bg-blue-50 border-l-4 border-blue-400 text-blue-700 p-4 rounded">
    <p class="text-sm">
        💡 Para preencher Latitude e Longitude, acesse 
        <a href="https://www.coordenadas-gps.net/" target="_blank" class="text-blue-600 underline font-semibold">coordenadas-gps.net</a>,
        pesquise o endereço desejado e copie os valores para os campos acima.
    </p>
</div>

<!-- Botão de salvar -->
<div class="flex justify-end">
    <button type="submit"
        class="px-6 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 transition duration-200">
        Salvar
    </button>
</div>
