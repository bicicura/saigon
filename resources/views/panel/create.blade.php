<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Crear un nuevo Casting
        </h2>
    </x-slot>

    <livewire:create-post :type="'save'" :productoras="$productoras" />
</x-app-layout>