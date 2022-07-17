
<div class="splide">
    <div class="flex items-center justify-between mb-2 saigon-text-300 splide__arrows">
        <p class="leading-none transition lg:line-clamp-1 lg:hover:line-clamp-none py-0.5"><span class="uppercase">{{$casting['nombre']}}</span><span> — {{$casting['director']}}</span><span> | {{$casting['productora']}}</span></p>
        <div class="flex ml-auto w-max">
            <button style="position: static" class="splide__arrow splide__arrow--prev saigon-font-light">
                <
            </button>
            <button style="position: static" class="splide__arrow splide__arrow--next saigon-font-light">
                >
            </button>
        </div>
    </div>

    <div class="overflow-hidden splide__track aspect-video rounded-2xl">
          <ul class="splide__list">
                @foreach ($casting->getFotografias as $foto)
                <li class="splide__slide">
                    <img data-splide-lazy="/fotos/{{ $foto->img }}" loading="lazy" class="object-cover object-center w-full h-full cursor-grab rounded-2xl carusel-img" src="/fotos/{{ $foto->img }}" alt="Fotografía de {{ $casting['nombre'] }} por {{ $casting['director'] }}">
                </li>
                @endforeach
          </ul>
    </div>
</div>