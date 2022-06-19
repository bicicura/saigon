@extends('layouts.layout')

@section('content')

@section('title') {{ '— ' . __('Fotografía') }} @endsection

<x-desktop-nav-fixed />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
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
</style>

<section id="scroll-target" data-scroll data-scroll-target class="smooth-scroll px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between lg:gap-0 lg:pb-36 pb-24">
    
    <div class="mt-20 space-y-20 lg:space-y-10 lg:mt-28 lg:w-10/12">
        @foreach ($castings as $item)
            <x-fotografia-slider :item="$item" />
        @endforeach
    </div>

    <div data-scroll data-scroll-sticky data-scroll-target="#scroll-target" class="flex flex-col items-end gap-4 mt-32 text-right lg:top-12 lg:sticky lg:right-0 lg:gap-10 lg:mt-20 lg:w-8/12 lg:h-fit lg:z-10"">
        <h1 class="uppercase saigon-text-5xl saigon-font-thin saigon-title-line-height">{{__("Fotografía")}}</h1>
        <div  class="saigon-text-300 saigon-p-line-height" style="width: 35rem;">
            <p>{{__("En nuestros casting fotográficos, cubrimos proyectos de moda, publicidad, catalogo, social media, corporativo, branding y todo el campo del medio gráfico y digital.")}}</p>
            <br>
            <p>{{__("Nuestros fotógrafos trabajan optimizando recursos - técnicos y creativos - para lograr los objetivos de cada proyecto.")}}</p>
            <br>
            <p>{{__("Le ponemos los cuerpos los rostros a tus ideas y proyectos.")}}</p>
            @if (app()->getLocale() === "es")
                <br>    
                <p>La luz y el movimiento son el juego y nos encanta jugar.</p>
            @endif
            <br>
            <div>
                <p class="uppercase">{{__("Contacto")}}:</p>
                <p>Andi di Napoli  |  andi@saigonbuenosaires.com</p>
                <p>Javier Daniel  |  javier@saigonbuenosaires.com</p>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        document.querySelectorAll('.splide').forEach(carousel => new Splide( carousel, {
            perPage: 1,
            pagination: false,
        } ).mount());
    } );
</script>

@endsection