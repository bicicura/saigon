@extends('layouts.layout')

@section('content')

<style>
    @media (min-width: 40em) {
        .hero-p-w { width: 77%; }
    }
</style>

<x-desktop-nav-fixed />
{{-- Index Container --}}
<div class="px-3.5 lg:px-8 mt-28 lg:mt-0 {{ $reelFlag? 'space-y-3' : '' }} smooth-scroll lg:fixed" x-data="{ logo: true, reel: false, castings: false }">
    {{-- separador para mobile --}}
    <div class="w-full p-px saigon-bg-black lg:hidden"></div>
    <section id="castings-comerciales" class="pb-6 saigon-bg-white">
        <article class="space-y-6 text-right text-saigon-white lg:text-left lg:flex lg:flex-col-reverse">
            @if ($reelFlag)
              <x-reel-carusel :reels="$Reels" />
            @endif
            {{-- Logo Grande Desktop --}}
            <div class="space-y-4 text-saigon-black lg:space-y-6" x-intersect:enter.threshold.30="logo? '' : logo = true; reel = false; castings = false; $dispatch('indexScrollTo', { vidick: 'top' })">
                <div class="hidden w-logo-hero lg:block header-logo-big {{ !$reelFlag? 'lg:mt-8' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1506 241" xml:space="preserve"><path fill="#191818" d="M187.6 152.1c-8.1-6.9-18.3-11.7-30.4-14.6-12.2-2.9-28.4-5.6-48.8-8.1-22.9-3-41.3-6.2-55.2-9.8-13.9-3.5-25.7-9.8-35.4-18.7C8 91.9 3.1 79.2 3.1 62.7c0-21.8 9.8-37.7 29.4-47.6 19.6-10 46.1-15 79.6-15 33.7 0 59.6 4.6 77.7 13.8s29 25.2 32.7 48.1h-34.4c-3-18.1-10.6-31.5-22.9-40.2-12.2-8.7-30-13.1-53.1-13.1-26.1 0-46.2 4-60.3 12S30.7 40.4 30.7 55.8c0 11.7 3.9 20.7 11.7 27s17.5 10.8 29.2 13.4 27.4 5.1 47.1 7.4c23.6 2.8 42.6 5.9 56.9 9.5 14.3 3.6 26.5 10.1 36.6 19.6s15.1 23.1 15.1 40.7c0 44.9-36.6 67.4-109.7 67.4-35.5 0-63.2-5.3-82.9-15.8C15 214.4 3.4 197.6 0 174.4h34.4c3.7 19 11.9 33.4 24.8 43.2 12.8 9.7 32.3 14.6 58.5 14.6 25.7 0 45.8-4.3 60.3-12.9 14.6-8.6 21.8-21.3 21.8-38 0-12.6-4.1-22.3-12.2-29.2z" id="letraS" class="logo-letra"/><path fill="#191818" d="M395.1 1.9h-32.7L246.6 239.1H271l33-78.5h128.2l34.4 78.5h35.8L395.1 1.9zm-86.7 148.2 58.1-138.5 60.9 138.5h-119z" id="letraA" class="logo-letra"/><path fill="#191818" d="M541.9 1.9h30.9v237.2h-30.9z" id="letraI" class="logo-letra"/><path fill="#191818" d="M848.3 211.9c-22.7 19.3-53.8 28.9-93.2 28.9-28 0-51.6-4.9-71-14.8s-33.9-23.8-43.5-42c-9.6-18.1-14.4-39.3-14.4-63.6s4.8-45.5 14.4-63.6c9.6-18.1 24.1-32.1 43.5-42s43-14.8 71-14.8C789 .1 817 7.1 839 21.1s35.9 35.6 41.6 65h-35.8c-5-24.5-14.9-43.6-29.6-57.1C800.5 15.5 780.5 8.7 755 8.7c-31.9 0-55.6 10.3-71.2 30.9-15.6 20.6-23.4 47.6-23.4 80.8s7.8 60.2 23.4 80.8c15.6 20.6 39.3 30.9 71.2 30.9 28.2 0 50.1-8.4 65.8-25.1s24.8-38.7 27.3-66H747.9v-10.3h135.8c-.9 34.9-12.7 62-35.4 81.2z" id="letraG" class="logo-letra"/><path id="letraO" class="logo-letra" fill="#191818" d="M1169 57.2c-10.1-18.1-24.8-32.1-44.2-42.1-19.3-10-42.6-15-69.6-15s-50.2 5-69.6 15c-19.3 9.9-34.1 24-44.2 42-10.1 18.1-15.1 39.2-15.1 63.3 0 24.1 5 45.2 15.1 63.3 10.1 18.1 24.8 32.1 44.2 42.1 19.4 10 42.6 15 69.6 15.1 27 0 50.2-5 69.6-15 19.4-10 34.1-24 44.2-42.1 10.1-18.1 15.1-39.2 15.1-63.3s-5-45.2-15.1-63.3zm-43 144c-15.8 20.6-39.9 30.9-72.2 30.9-31.4 0-54.7-10.3-70.1-31.1-15.3-20.7-23-47.6-23-80.6 0-33.2 7.9-60.2 23.7-80.8 15.9-20.6 39.9-30.9 72.2-30.9 31.4 0 54.7 10.4 70.1 31.1 15.3 20.7 23 47.6 23 80.6 0 33.2-7.9 60.2-23.7 80.8z"/><path fill="#191818" d="M1449.7 1.9V239h-35.1L1249.5 23.5V239h-12V1.9h35.1l165 215.5V1.9z" id="letraN" class="logo-letra"/><g id="tradeMrk_1_" class="logo-letra" fill="#191818"><path d="M1497.6 16.4c-.5 2.2-2.6 3.8-5 3.8-3.3 0-5.8-2.7-5.8-6.3 0-3.4 2.6-6.1 5.8-6.1 2.4 0 4.5 1.5 5 3.6v.1h1.8v-.2c-.6-3.1-3.5-5.3-6.8-5.3-4.3 0-7.6 3.5-7.6 7.9 0 4.5 3.3 8.1 7.6 8.1 3.4 0 6.3-2.3 6.9-5.5v-.2l-1.9.1z"/><path d="M1492.5.9c-7.2 0-13 5.9-13 13.1s5.8 13.1 13 13.1 13.1-5.9 13.1-13.1S1499.7.9 1492.5.9zm.1 24.5c-6.2 0-11.2-5.1-11.2-11.3s5-11.3 11.2-11.3 11.2 5.1 11.2 11.3-5 11.3-11.2 11.3z"/></g></svg>
                </div>
                <div class="hidden lg:flex lg:items-end lg:justify-between">
                    <div class="lg:w-8/12 comerciales-text-container lg:text-xl lg:mt-2">
                        <p class="opacity-0 intro-p">{{__("En Saigón somos un equipo creativo dedicado al diseño y la producción de casting para proyectos locales e internacionales.")}}</p>
                        <p class="opacity-0 transition-delay-33 intro-p">{{__("Nuestro enfoque se apoya en la dinámica y amplitud de opciones que presentamos en cada proyecto.  Para esto contamos con una base de datos de mas de 100.000 talentos, que nos permite realizar casting integral de ficción, publicidad, gráfica, moda y proyectos especiales.")}}</p>
                        <p class="opacity-0 transition-delay-66 intro-p">{{__("Siempre adaptandonos a los nuevos formatos e incorporando nuevas herramientas de casting remotos y presenciales.")}}</p>
                        <p class="mt-8 opacity-0 transition-delay-99 intro-p-short">{{__("Creemos en el infinito potencial de la innovación.")}} {{__("Somos Saigón.")}}</p>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <div class="relative z-20 pt-12" x-data="{ shown: false }">
        <div id="comerciales" x-ref="comerciales" class="absolute left-0 -top-28"></div>
        <div class="gap-4 pb-24 lg:grid lg:grid-cols-3 casting-group-container" x-intersect:enter.threshold.40="castings? '' : logo = false; reel = false; castings = true; $dispatch('indexScrollTo', { vidick: $refs.comerciales })">
            @foreach ($castings as $item)
                <section class="relative pt-4 pb-8 text-right transition duration-200 ease-in border-t-2 opacity-0 border-saigon-black text-saigon-white lg:text-left lg:pb-0 lg:pt-0 lg:border-t-0 casting-article" :class="shown? 'opacity-100 translate-y-0' : 'translate-y-8' " x-intersect.threshold.25="shown = true">
                    <a href="{{ route('casting-player', [app()->getLocale(), $item->slug,]) }}" x-data=" { hover: false } " :class="hover? '' : '' " x-on:mouseover="hover = true;" x-on:mouseleave="hover = false;">
                        <div class="hidden gap-2 mb-2 text-saigon-black lg:flex" :class="hover? 'underline' : '' ">
                            <h2 class="saigon-text-100 lg:line-clamp-1 ">{{$item['nombre']}} <span>— {{$item['director']}}</span> <span> | {{$item->getProductora->nombre}}</span></h2>
                        </div>
                        <div class="relative flex flex-col justify-between bg-center bg-no-repeat bg-cover cursor-pointer h-104 lg:h-fit lg:aspect-video">
                            <img class="object-cover w-full h-full transition-opacity duration-150 opacity-0 rounded-xl" loading="lazy" src="/thumbnails/{{$item['thumbnail']}}" alt="Thumbnail de {{$item['nombre']}}" onload="this.classList.add('opacity-100'); this.classList.remove('opacity-0')">
                            <div class="absolute left-0 right-0 flex flex-col justify-between h-full lg:hidden casting-gradient-mobile rounded-xl">
                                <div class="">
                                    <div class="pt-4 pr-4">
                                        <h2 class="text-3xl uppercase">{{$item['nombre']}}</h2>
                                        <h4 class="">{{$item['director']}} — {{$item->getProductora->nombre}}</h4>
                                    </div>
                                </div>
                                <div class="w-12 mt-auto mb-6 ml-auto mr-4 lg:hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 42" xml:space="preserve"><path fill="none" stroke="#F3F3F3" stroke-width="1.3" stroke-miterlimit="10" d="m34.7 20.8-17 9.8L.6 40.4V1.1l17.1 9.8z"/></svg>
                                </div>
                            </div>
                            <div class="absolute inset-0 top-0 bottom-0 left-0 right-0 flex items-center justify-center card-play-button">
                                <div class="flex items-center gap-2 px-3 py-px rounded-full bg-saigon-black w-max h-fit">
                                    <svg width="15" height="15" viewBox="0 0 15 15" class="hidden mr-2 lg:block"><g fill="none" fill-rule="evenodd"><path d="M-1-1h18v18H-1z"></path><path class="fill-saigon-white" d="M6 10.875L10.5 7.5 6 4.125v6.75zM7.5 0C3.36 0 0 3.36 0 7.5 0 11.64 3.36 15 7.5 15c4.14 0 7.5-3.36 7.5-7.5C15 3.36 11.64 0 7.5 0zm0 13.5c-3.307 0-6-2.693-6-6s2.693-6 6-6 6 2.693 6 6-2.693 6-6 6z"></path></g></svg>
                                    <span>{{__('Explorar')}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </section>
            @endforeach
        </div>
    </div>
    
</div>

<script defer>
    if (window.innerWidth < 800) {
        let setHeroHeight = () => {
            let vh = window.innerHeight;
            let hh = document.querySelector('header').offsetHeight;
            let height = (vh - hh) + 'px';
            let reel_slides = document.querySelectorAll('.splide__slide');
            
            reel_slides.forEach(slide => {
                slide.style.height = `calc(${height} - 3rem)`; 
            });
        }
        
        window.addEventListener('load', setHeroHeight);
    }
</script>

<script src="/js/intersectionObserver.js?v=14" defer></script>

@endsection