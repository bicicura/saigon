@extends('layouts.layout')

@section('title') {{ '— ' . __('Management') }} @endsection

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

<style>

    .splide__arrow {
        background: none!important;
        top: unset!important;
        bottom: -.5rem!important;
        color: black!important;
        width: unset!important;
    }

    @media (min-width: 40em) { 
        .hero-p-w { width: 65%; }
    
        .splide__slide {
            height: calc(100vh - 10rem);
        }

        main {
            height: calc(100vh - 6rem);
        }
    }

    @media(max-width: 800px) {
        
        .splide__arrow { bottom: -4rem!important }
        
    }

    img {
  display: block;
  width: auto;
  height: 90%;
  /* margin: 0 auto; */
}

.splide__arrow--prev {
    left: 0!important
}

.splide__arrow--next {
    right: 0!important
}

</style>

<x-desktop-nav-fixed />

<section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse mt-32 lg:mt-24 lg:flex-row justify-between mb-12 lg:mb-0 saigon-text-300 h-full overflow-y-hidden"
    x-data=" { navOpenFlag: false } "
    @nav-toggled.window="$event.detail.state? navOpenFlag = true : navOpenFlag = false;"
    @keydown.escape.window = "navOpenFlag? navOpenFlag : $refs.backBtn.click() "
>
   <div class="flex flex-col lg:ml-auto lg:h-full lg:grid-cols-3 lg:grid">
    <div class="hidden lg:block"></div>

    <div class="mb-16 splide lg:mb-0">
        <div class="text-white splide__arrows">
            <button
            class="splide__arrow splide__arrow--prev"
            type="button"
            aria-label="Previous slide"
            aria-controls="splide01-track"
          >
          {{-- ← --}}
          <div class="rotate-180 w-max">
            <svg viewBox="0 0 24.99 21.91" class="rotate-180"><path class="fill-saigon-black" d="M0 10.35 12.11 0l1.17 1.5c-4 3.34-8.47 6.65-11.3 8.59l.07.22c3.08-.15 8.4-.26 12.55-.26h10.39v1.87H14.61c-4.15 0-9.47-.15-12.51-.33l-.11.26c2.9 2.02 7.3 5.25 11.3 8.62l-1.25 1.43L0 11.6v-1.25Z"/></svg>
          </div>
          </button>
          <button
          class="splide__arrow splide__arrow--next"
          type="button"
          aria-label="Next slide"
          aria-controls="splide01-track"
        >
        {{-- → --}}
        <div>
            <svg class="w-4 h-4" viewBox="0 0 24.95 21.91"><path class="fill-saigon-black" d="M24.95 11.52 12.84 21.91l-1.17-1.5c4-3.34 8.48-6.64 11.3-8.59l-.11-.26c-3.05.18-8.37.29-12.51.29H0V9.98h10.35c4.15 0 9.47.15 12.51.33l.11-.26c-2.9-2.02-7.3-5.25-11.3-8.62L12.92 0l12.04 10.31v1.21Z"/></svg>
        </div>
        </button>
        </div>
        <div>
            <div class="splide__track rounded-2xl">
                <ul class="splide__list">
                @foreach ($actor->getBook as $item)
                    <li style="" class="w-full h-full splide__slide">
                        <img class="object-cover w-full h-full cursor-grab" data-splide-lazy="/actors/{{$item->img}}" src="/actors/{{$item->img}}"  alt="Fotografía de {{$actor->nombre}}">
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        
    </div>

    <div class="flex flex-col items-end text-right">
        <div class="mb-4 ml-auto">
            <a x-ref="backBtn" href="{{ route('management', app()->getLocale()) }}" class="text-transparent hover:text-saigon-black">
                <svg class="w-4.5 h-4.5 transition-colors duration-150 ease-in cursor-pointer" version="1.1" id="Layer_1" x="0" y="0" viewBox="0 0 24 24" xml:space="preserve"><path fill="currentColor" class="stroke-saigon-black hover:stroke-saigon-white" stroke-miterlimit="10" d="M.5.5h22.45v22.45H.5zM16.91 16.91 6.54 6.54M6.54 16.91 16.91 6.54"/></svg>
            </a>
        </div>
        <p>{{ $actor->nombre }}</p>
        <p>Edad: {{ $actor->getAge() }} años</p>
        <p>Nacionalidad: {{ $actor->nacionalidad }}</p>
        <p>Altura: {{ $actor->altura }} cm</p>
        <p>
            @if ($actor->imdb)
                <a href="{{$actor->imdb}}">IMDB | </a>
            @endif
            @if ($actor->ig)
             <a href="https://www.instagram.com/{{$actor->ig}}">IG | </a>
            @endif
             @if ($actor->cv)
             <a href="{{$actor->cv}}">C.V.</a>
            @endif

        </p>
        <div x-data="{selected:null}">
            <ul>
                <li class="relative">
                    <button type="button" class="ml-auto text-right w-max" @click="selected !== 1 ? selected = 1 : selected = null">
                        <div class="w-full transition-all">
                            <span>Bio</span>
                        </div>
                    </button>
        
                    <div class="relative overflow-hidden text-gray-500 transition-all duration-700 max-h-0" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div style="max-width: 35ch; margin-left: auto;" class="py-2 pr-2 text-right lg:overflow-y-auto h-fit lg:max-h-104 saigon-text-200">
                            {{ $actor->bio }}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <p>Videos</p>

    </div>

   </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        var splide = new Splide( '.splide', {
        pagination: false,
        rewind: true,
        autoHeight: true,
        lazyLoad: true,
        breakpoints: {                
            800: {
            perPage: 1,
            perMove: 1,
            autoWidth: false,
            }
        },
        } );

        splide.mount();
    } );
</script>

<script defer>
    if (window.innerWidth < 800) {
        let setHeroHeight = () => {
            let vh = window.innerHeight;
            let hh = document.querySelector('header').offsetHeight;
            let height = (vh - hh) + 'px';

            let slides = document.querySelectorAll('.splide__slide');
            
            slides.forEach(slide => {
                slide.style.height = `calc(${height} - 3rem)`;
            });
        }
        window.addEventListener('load', setHeroHeight);
    }
</script>

@endsection

