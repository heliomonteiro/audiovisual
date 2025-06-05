<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cidade: {{ $city->nome }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <p><strong>Nome:</strong> {{ $city->nome }}</p>
            <p><strong>Estado:</strong> {{ $city->estado }}</p>
            <p><strong>Slug:</strong> {{ $city->slug }}</p>

            <div class="mt-4">
                <a href="{{ route('cities.edit', $city) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
                <a href="{{ route('cities.index') }}" class="ml-4 text-gray-600 hover:underline">Voltar</a>
            </div>
        </div>
    </div>
</x-app-layout>
