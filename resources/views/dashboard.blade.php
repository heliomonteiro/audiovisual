<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-chart-line text-blue-500 mr-3 text-3xl"></i> Visão Geral do Portal
            </h2>

        </div>
        <p class="text-gray-600 mt-4 text-md px-6">
            Acompanhe as principais métricas e atividades do seu portal de acessibilidade.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="bg-white p-6 rounded-lg shadow-xl border-l-4 border-blue-500 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm font-medium text-blue-600 uppercase">Serviços</div>
                            <i class="fas fa-sign-language text-2xl text-blue-400"></i> </div>
                        <div class="text-5xl font-bold text-blue-700 mt-2">{{$serviceCount}}</div>
                        <p class="text-xs text-gray-500 mt-1">Serviços cadastrados</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-xl border-l-4 border-green-500 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm font-medium text-green-600 uppercase">Vagas</div>
                            <i class="fas fa-briefcase text-2xl text-green-400"></i> </div>
                        <div class="text-5xl font-bold text-green-700 mt-2">{{$jobOfferCount}}</div>
                        <p class="text-xs text-gray-500 mt-1">Vagas de emprego</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-xl border-l-4 border-purple-500 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm font-medium text-purple-600 uppercase">Usuários</div>
                            <i class="fas fa-users text-2xl text-purple-400"></i> </div>
                        <div class="text-5xl font-bold text-purple-700 mt-2">{{$userCount}}</div>
                        <p class="text-xs text-gray-500 mt-1">Usuários registrados</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-xl border-l-4 border-orange-500 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm font-medium text-orange-600 uppercase">Cidades</div>
                            <i class="fas fa-city text-2xl text-orange-400"></i> </div>
                        <div class="text-5xl font-bold text-orange-700 mt-2">{{$cityCount}}</div>
                        <p class="text-xs text-gray-500 mt-1">Cidades atendidas</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{--
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Você está logado!") }}
                </div>
            </div>
        </div>
    </div>
    --}}

</x-app-layout>
