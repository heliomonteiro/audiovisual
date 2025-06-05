@php
    use App\Enums\Estado;
    $estados = Estado::values();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Cidade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form action="{{ route('admin.cities.store') }}" method="POST">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" required>
                    <select name="estado" required>
                        <option value="">Selecione um estado</option>
                        @foreach ($estados as $uf)
                            <option value="{{ $uf }}">{{ $uf }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Salvar</button>
                    <script>
                        document.querySelector('form').addEventListener('submit', function(e) {
                            alert('submit disparado');
                        });
                    </script>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
