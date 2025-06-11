<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-extrabold text-3xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-briefcase text-green-600 mr-4 text-4xl"></i> {{-- Ícone de Vagas --}}
                {{ __('Gerenciar Vagas') }}
            </h1>
            <a href="{{ route('admin.job_offers.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus-circle mr-2"></i> Adicionar Nova Vaga
            </a>
        </div>
        <p class="text-gray-600 mt-4 text-md px-6">
            Gerencie as ofertas de emprego e oportunidades de trabalho disponíveis.
        </p>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Mensagem de Sucesso --}}
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
            @if($job_offers->count())
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
                            @foreach ($job_offers as $service) {{-- Mantido $service como você tinha, assumindo que funciona para seu modelo de Vagas --}}
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out"> {{-- Efeito de hover na linha --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $service->nome }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{-- Estilização para 'Tipo' (assumindo que 'tipo' é um atributo direto da vaga) --}}
                                        @php
                                            $typeClass = '';
                                            switch(strtolower($service->tipo)) { // Converte para minúsculas para comparação consistente
                                                case 'presencial':
                                                    $typeClass = 'bg-blue-100 text-blue-800';
                                                    break;
                                                case 'remoto':
                                                    $typeClass = 'bg-indigo-100 text-indigo-800';
                                                    break;
                                                case 'hibrido':
                                                    $typeClass = 'bg-purple-100 text-purple-800';
                                                    break;
                                                default:
                                                    $typeClass = 'bg-gray-100 text-gray-800';
                                            }
                                        @endphp
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $typeClass }}">
                                            {{ $service->tipo }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $service->cidade->nome }} / {{ $service->cidade->estado }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3"> {{-- Espaçamento entre botões --}}
                                        <a href="{{ route('admin.job_offers.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200" title="Editar">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>

                                        <form action="{{ route('admin.job_offers.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta vaga? Esta ação é irreversível.')"> {{-- Mensagem de confirmação melhorada --}}
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
                    {{ $job_offers->links() }}
                </div>
            @else
                {{-- Mensagem de Vazio --}}
                <div class="text-center py-10 px-4 text-gray-600 bg-gray-50 rounded-lg flex flex-col items-center justify-center">
                    <i class="fas fa-search-dollar text-6xl text-gray-400 mb-4"></i> {{-- Ícone de busca de vaga --}}
                    <p class="text-xl font-semibold mb-2">Nenhuma vaga encontrada.</p>
                    <p class="text-md">Atualmente, não há vagas de emprego cadastradas no portal.</p>
                    <a href="{{ route('admin.job_offers.create') }}" class="mt-6 inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fas fa-plus mr-2"></i> Adicionar Nova Vaga
                    </a>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
