@extends('layouts.layout')

@section('content')

<x-desktop-nav-fixed />

<style>
    .carusel-img {
        min-height: 28rem;
        width: 100%;
        object-fit: cover
    }

    @media (min-width: 40em) { 
        
        .hero-p-w { width: 77%; } 

    }
</style>

<div class="smooth-scroll">
    <section class="px-3.5 lg:pr-16 lg:pl-8 flex flex-col-reverse lg:flex-row justify-between mb-12 w-full">

        <div class="flex flex-col gap-4 mt-32 lg:gap-8 lg:mt-32">
            <h1 class="tracking-tight uppercase saigon-text-5xl saigon-font-thin saigon-title-line-height">{{__("Ficción")}}</h1>
            <div class="flex flex-col w-full gap-5 lg:text-xl hero-p-w">
                <div>
                    <p>{{__("Un espacio dedicado al diseño de casting moderno y de dedicación creativa.")}}</p>
                    <p>{{__("Cubrimos el medio audiovisual en su espectro más artístico: cine, series, televisión , voz original, video clip, video arte, fashion film, transmedia.")}}</p>
                </div>
                <div>
                    <p>{{__("Componemos un mapa de acción para formar elencos que se articulen a cada propósito.")}}</p>
                    <p>{{__("Damos relieve a las historias que nos toca contar desde las actuaciones y los ensambles de talentos.")}}</p>
                </div>
                <div>
                    <p>{{__("Enfocar la búsqueda, proponer opciones originales y efectivas, son nuestra prioridad.")}}</p>
                    <p>{{__("Vemos en los proyectos lo que nadie vio todavía para materializarlos a través acciones propias y eficaces.")}}</p>
                </div>
                <div>
                    <p>{{__("La ficción en Saigón es nuestra nueva realidad potenciando nuestra experiencia y pasión.")}}</p>
                </div>
                <div>
                    <p>{{__("Contacto")}}:</p>
                    <p>Pablo Lapa |  lapa@saigonbuenosaires.com</p>
                </div>
            </div>
        </div>
    
    </section>
    
    <div class="px-3.5 lg:pr-16 lg:pl-10 lg:mt-0">
        @livewire('casting-list', ['seccion' => $seccion])
    </div>
</div>

@endsection