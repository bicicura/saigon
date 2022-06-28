<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editando Reel
        </h2>
    </x-slot>
    {{-- Le paso al componente de livewire los datos del Talento para que se autocomplete el form --}}
    @livewire('reel-edit', [
        'Reel' => $Reel, 
        'active' => $Reel->active,
        'nombre' => $Reel->nombre,
        'video_url' => $Reel->url,
        'avatarActual' => $Reel->thumbnail,
        ]);
</x-app-layout>