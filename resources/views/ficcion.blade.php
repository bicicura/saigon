@extends('layouts.layout')

@section('title') {{ '— ' . __('Ficción') }} @endsection

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

@livewire('casting-carusel', ['seccion' => $seccion])

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

<x-desktop-nav-fixed />

<style>
    .splide__arrow {
        background: none
    }

    .splide__arrow { 
        height: fit-content;
        transform: translate(0%)
    }

    .carusel-img {
        min-height: 28rem;
        width: 100%;
        object-fit: cover
    }

    .splide__arrow {
        position: static!important;
        display: flex!important;
        justify-content: center!important;
        background: none!important;
        top: unset!important;
        bottom: -.5rem!important;
        color: black!important;
        width: unset!important;
    }

    .splide__arrow--prev {
    left: 0!important
}

.splide__arrow--next {
    right: 0!important
}


    @media (min-width: 40em) { 
        
        .hero-p-w { 
            width: 77%;
        
        } 

        .hero-p-w div p {
            line-height: 1.6rem;
        }

    }
</style>

<div class="smooth-scroll">
    <section class="px-3.5 lg:pr-16 lg:pl-8 flex flex-col-reverse lg:flex-row justify-between mb-12 w-full">

        <div class="flex flex-col gap-4 mt-32 lg:gap-6 lg:mt-26">
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
                    <p class="uppercase">{{__('Contacto')}}:</p>
                    <p><span class="block lg:inline">Pablo Lapa</span><span class="hidden lg:inline lg:mx-1">  |  </span><span class="block lg:inline">lapa@saigonbuenosaires.com</span></p>
                </div>
            </div>
        </div>
    
    </section>
    
    <div class="px-3.5 lg:pr-16 lg:pl-10 lg:mt-0">
        @livewire('casting-list', ['seccion' => $seccion])
    </div>    
    
</div>

<script defer>
    window.addEventListener('build', function (e) { 
        console.log('se disparo')
        var splide = new Splide( '.splide', {
            perPage: 1,
            arrows: true,
            pagination: false,
        } );
        
        splide.mount();
     }, false);
</script>

@endsection