<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cidade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form action="{{ route('admin.cities.update', $city) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                            Nome da Cidade
                        </label>
                        <input type="text" name="nome" id="nome"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                            value="{{ old('nome', $city->nome) }}" required>
                    </div>

                    @php
                        $estados = [
                            'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO',
                            'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
                            'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'
                        ];
                    @endphp

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="estado">
                            Estado
                        </label>
                        <select name="estado" id="estado"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                            <option value="">Selecione um estado</option>
                            @foreach ($estados as $uf)
                                <option value="{{ $uf }}" {{ old('estado', $city->estado) == $uf ? 'selected' : '' }}>
                                    {{ $uf }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
