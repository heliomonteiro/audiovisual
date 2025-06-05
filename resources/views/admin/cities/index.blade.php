<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cidades
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('admin.cities.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nova Cidade</a>
        </div>

        <div class="bg-white shadow-sm sm:rounded-lg p-4">

            @if($cities->count())
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Nome</th>
                            <th class="px-4 py-2 text-left">Estado</th>
                            <th class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $city->nome }}</td>
                                <td class="px-4 py-2">{{ $city->estado }}</td>
                                <td class="px-4 py-2 text-center space-x-2">
                                    <a href="{{ route('admin.cities.edit', $city) }}" class="text-blue-600 hover:underline">Editar</a>

                                    <form action="{{ route('admin.cities.destroy', $city) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            <div class="mt-4 flex justify-center">
                {{ $cities->links() }}
            </div>

            @else
            <div class="text-gray-600 p-4 bg-gray-50 rounded">
                Nenhuma cidade cadastrada no momento.
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
