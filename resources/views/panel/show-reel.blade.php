<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Listado de Reels') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <livewire:panel-table :reel="true" />
    </div>
    
</x-app-layout>