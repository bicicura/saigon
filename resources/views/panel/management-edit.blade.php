<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editando Perfil: {{$Actor['nombre']}}
        </h2>
    </x-slot>
    {{-- Le paso al componente de livewire los datos del Talento para que se autocomplete el form --}}
    @livewire('create-actor', 
        [
            'type' => 'update',
            'actor' => $Actor,
            'nombre' => $Actor['nombre'],
            'date_of_birth' => $Actor['date_of_birth'],
            'nacionalidad' => $Actor['nacionalidad'],
            'altura' => $Actor['altura'],
            'imdb' => $Actor['imdb'],
            'ig' => $Actor['ig'],
            'cv' => $Actor['cv'],
            'bio' => $Actor['bio'],
            'videos' => $Actor['videos'],
            // 'avatarActual' => $Actor['thumbnail'],
        ]);
</x-app-layout>