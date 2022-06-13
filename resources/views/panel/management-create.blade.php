<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Crear un nuevo Actor
        </h2>
    </x-slot>

    <livewire:create-actor :type="'create'" />
</x-app-layout>