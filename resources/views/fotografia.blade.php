@extends('layouts.layout')

@section('title') {{ '— ' . __('Fotografía') }} @endsection

@section('content')

@livewire('casting-carusel')

<x-desktop-nav-fixed />

<style>

.splide__arrow {
        background: none
    }

    .splide-popup .splide__arrow { 
        height: fit-content;
        transform: translate(0%)
    }

    .splide-popup .carusel-img {
        min-height: 28rem;
        width: 100%;
        object-fit: cover
    }

    .splide-popup .splide__arrow {
        position: static!important;
        display: flex!important;
        justify-content: center!important;
        background: none!important;
        top: unset!important;
        bottom: -.5rem!important;
        color: black!important;
        width: unset!important;
    }

    .splide-popup .splide__arrow--prev {
        left: 0!important
    }

    .splide-popup .splide__arrow--next {
        right: 0!important
    }

    .splide-fotografia .splide__arrow {
        background: none
    }

    .splide-fotografia .splide__arrow { 
        height: fit-content;
        transform: translate(0%)
    }

    @media (min-width: 40em) {
        
        .fotografia-text-hero { width: 35rem; }

        .splide-fotografia .carusel-img {
            min-height: 28rem;
            width: 100%;
            object-fit: cover;
        }
        
        }
</style>



<section data-scroll data-scroll-target class="smooth-scroll px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between lg:gap-0 lg:pb-36 pb-24 lg:fixed">
    
    <div class="mt-20 lg:mt-28 lg:w-9/12">
        @livewire('fotografia-slider', ['castings' => $castings])
    </div>
    <div id="scroll-target"></div>
    <div data-scroll data-scroll-sticky data-scroll-target="#scroll-target" class="flex flex-col items-end gap-4 mt-32 text-right lg:top-12 lg:sticky lg:right-0 lg:gap-10 lg:mt-20 lg:w-8/12 lg:h-fit lg:z-10"">
        <h1 class="tracking-tighter uppercase saigon-text-5xl saigon-font-thin saigon-title-line-height" style="{{ app()->getLocale() == 'en'? 'letter-spacing: -0.025em;' : ''  }}">{{__("Fotografía")}}</h1>
        <div class="saigon-text-300 saigon-p-line-height fotografia-text-hero">
            <p>{{__("En nuestros casting fotográficos, cubrimos proyectos de moda, publicidad, catalogo, social media, corporativo, branding y todo el campo del medio gráfico y digital.")}}</p>
            <br>
            <p>{{__("Nuestros fotógrafos trabajan optimizando recursos - técnicos y creativos - para lograr los objetivos de cada proyecto.")}}</p>
            <br>
            <p>{{__("Le ponemos los cuerpos y los rostros a tus ideas y proyectos.")}}</p>
            <br>
            <div>
                <p class="uppercase">{{__('Contacto')}}:</p>
                <p><span class="block lg:inline">Andi di Napoli</span><span class="hidden lg:inline lg:mx-1">  |  </span><span class="block lg:inline hover:underline"><a href="mailto:andi@saigonbuenosaires.com">andi@saigonbuenosaires.com</a></span></p>
                <p><span class="block lg:inline">Javier Daniel</span><span class="hidden lg:inline lg:mx-1">  |  </span><span class="block lg:inline hover:underline"><a href="mailto:javier@saigonbuenosaires.com">javier@saigonbuenosaires.com</a></span></p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        document.querySelectorAll('.splide-fotografia').forEach(carousel => new Splide( carousel, {
            perPage: 1,
            pagination: false,
            lazyLoad: 'nearby'
        } ).mount());
    } );

    window.addEventListener('build', function (e) {
        let splide = new Splide( '.splide-popup', {
            perPage: 1,
            arrows: true,
            pagination: false,
        } );
        
        splide.mount();
     }, false);
</script>

@endsection