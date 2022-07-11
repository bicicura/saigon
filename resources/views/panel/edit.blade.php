<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editar Casting: {{$casting['nombre']}}
        </h2>
    </x-slot>
    {{-- Le paso al componente de livewire los datos del Talento para que se autocomplete el form --}}
    @livewire('create-post', 
        [
            'type' => 'update',
            'casting' => $casting,
            'seccion' => $casting['seccion'],
            'nombre' => $casting['nombre'],
            'productora' => $casting['productora'],
            'director' => $casting['director'],
            'categoria' => $casting['categoria'],
            'video_url' => $casting['url'],
            'avatarActual' => $casting['thumbnail'],
            'reel' => $casting['reel'],
            'reelActual' => $casting['reel_video'],
        ]);
</x-app-layout>