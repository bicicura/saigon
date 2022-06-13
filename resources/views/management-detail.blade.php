@extends('layouts.layout')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

<style>
    @media (min-width: 40em) { .hero-p-w { width: 65%; } }

    img {
  display: block;
  width: auto;
  height: 90%;
  /* margin: 0 auto; */
}

main {
    height: calc(100vh - 6rem);
}

.splide__arrow {
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

</style>

<x-desktop-nav-fixed />

<section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse mt-24 lg:flex-row justify-between mb-12 lg:mb-0 saigon-text-300 h-full">

   <div class="grid h-full grid-cols-3 ml-auto">
    <div></div>

    <div class="splide">
        <div class="text-white splide__arrows">
            <button
            class="splide__arrow splide__arrow--prev"
            type="button"
            aria-label="Previous slide"
            aria-controls="splide01-track"
          >
          ←
          </button>
          <button
          class="splide__arrow splide__arrow--next"
          type="button"
          aria-label="Next slide"
          aria-controls="splide01-track"
        >
        →
        </button>
        </div>
        <div>
            <div class="splide__track">
                <ul class="splide__list">
                @foreach ($book as $item)
                    <li style="height: calc(100vh - 9rem);" class="w-full h-full splide__slide">
                        <img class="object-cover w-full h-full cursor-grab rounded-2xl" data-splide-lazy="/actors/{{$item->img}}" src="/actors/{{$item->img}}"  alt="Fotografía de /actors/{{$actor->nombre}}">
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        
    </div>

    {{-- <div>
        <div class="w-full h-full">
            <img class="object-cover object-center w-full text-sm rounded-2xl" src="/actors/{{ $actor->thumbnail }}" alt="Fotografía de {{ $actor->nombre }}">
            <div class="flex justify-between">
                <button>←</button>
                <button>→</button>
            </div>
        </div>
    </div> --}}

    <div class="text-right">
        <p>{{ $actor->nombre }}</p>
        <p>Edad: {{ $actor->getAge() }}</p>
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
                    <button type="button" class="w-full text-right" @click="selected !== 1 ? selected = 1 : selected = null">
                        <div class="w-full transition-all">
                            <span>Bio</span>
                        </div>
                    </button>
        
                    <div class="relative overflow-hidden text-gray-500 transition-all duration-700 max-h-0" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div style="max-width: 35ch; margin-left: auto;" class="py-2 text-right h-fit saigon-text-200">
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

@endsection

