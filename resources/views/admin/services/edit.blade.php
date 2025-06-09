<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Serviço
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('admin.services.update', $service) }}" method="POST">
                @method('PUT')
                @include('admin.services.form', ['service' => $service])
            </form>
        </div>
    </div>
</x-app-layout>
