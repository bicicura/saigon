<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $label }}
        </h2>
    </x-slot>

    
    @livewire('edit-fotografias', 
        [
            'imgs' => $imgs,
            'casting_id' => $actor_id,
            'table' => $table,
            'directorio' => $directorio
        ]);

</x-app-layout>