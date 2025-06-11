<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-extrabold text-3xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-sign-language text-blue-600 mr-4 text-4xl"></i> {{-- Ícone de Serviços/Libras --}}
                {{ __('Gerenciar Serviços') }}
            </h1>
            <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus-circle mr-2"></i> Adicionar Novo Serviço
            </a>
        </div>
        <p class="text-gray-600 mt-4 text-md px-6">
            Edite e organize os serviços de acessibilidade disponíveis no portal.
        </p>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Mensagem de Sucesso (mantida, mas podemos estilizar mais) --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg shadow-md flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-lg"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.closest('div').remove()" class="text-green-700 hover:text-green-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden border border-gray-200"> {{-- Sombra mais pronunciada, borda e overflow para tabelas grandes --}}
            @if($services->count())
                <div class="overflow-x-auto"> {{-- Adiciona scroll horizontal se a tabela for muito larga --}}
                    <table class="min-w-full divide-y divide-gray-200"> {{-- Divide-y para linhas mais claras --}}
                        <thead class="bg-gray-50"> {{-- Fundo leve para o cabeçalho --}}
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th> {{-- Centralizado para ações --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($services as $service)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out"> {{-- Efeito de hover na linha --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $service->nome }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"> {{-- Tag estilizada para o tipo --}}
                                            {{ $service->tipo }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $service->cidade->nome }} / {{ $service->cidade->estado }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3"> {{-- Espaçamento entre botões --}}
                                        <a href="{{ route('admin.services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200" title="Editar">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>

                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este serviço? Esta ação é irreversível.')"> {{-- Mensagem de confirmação melhorada --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" title="Excluir">
                                                <i class="fas fa-trash-alt text-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> {{-- Fim do overflow-x-auto --}}

                {{-- Paginação --}}
                <div class="p-4 border-t border-gray-200 bg-gray-50"> {{-- Fundo e borda para a paginação --}}
                    {{ $services->links() }}
                </div>
            @else
                {{-- Mensagem de Vazio --}}
                <div class="text-center py-10 px-4 text-gray-600 bg-gray-50 rounded-lg flex flex-col items-center justify-center">
                    <i class="fas fa-box-open text-6xl text-gray-400 mb-4"></i> {{-- Ícone de caixa vazia --}}
                    <p class="text-xl font-semibold mb-2">Nenhum serviço encontrado.</p>
                    <p class="text-md">Parece que não há serviços cadastrados no momento.</p>
                    <a href="{{ route('admin.services.create') }}" class="mt-6 inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fas fa-plus mr-2"></i> Adicionar Novo Serviço
                    </a>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
