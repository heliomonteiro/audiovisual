<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="text-sm font-medium text-gray-500 uppercase">Serviços</div>
                        <div class="text-5xl font-bold text-indigo-600 mt-2">12</div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="text-sm font-medium text-gray-500 uppercase">Vagas</div>
                        <div class="text-5xl font-bold text-indigo-600 mt-2">13</div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="text-sm font-medium text-gray-500 uppercase">Usuários</div>
                        <div class="text-5xl font-bold text-indigo-600 mt-2">1</div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="text-sm font-medium text-gray-500 uppercase">Cidades</div>
                        <div class="text-5xl font-bold text-indigo-600 mt-2">8</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Você está logado!") }}
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
