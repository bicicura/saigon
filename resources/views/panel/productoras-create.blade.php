<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $label }}
        </h2>
    </x-slot>

    @if ($type === "create")
        <livewire:create-productora :type="$type" />
    @else
        <livewire:create-productora :type="$type" :nombre="$productora->nombre" :productoraEditada="$productora" :castings="$productora->getCastings()" />
    @endif
    
</x-app-layout>