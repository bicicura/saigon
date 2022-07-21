<div class="space-y-20 lg:space-y-10">
    @foreach ($castings as $casting)
        <div class="splide-fotografia splide">
            <div class="flex items-center justify-between mb-2 saigon-text-300 splide__arrows">
                <p wire:click="$emit('castingClicked', {{$casting}})" class="leading-none hover:underline transition cursor-pointer line-clamp-1 py-0.5"><span class="uppercase">{{$casting['nombre']}}</span><span> — {{$casting['director']}}</span><span> | {{$casting->getProductora->nombre}}</span></p>
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
                            <img wire:click="$emit('castingClicked', {{$casting}})" data-splide-lazy="/fotos/{{ $foto->img }}" loading="lazy" class="object-cover object-center w-full h-full cursor-pointer rounded-2xl carusel-img" src="/fotos/{{ $foto->img }}" alt="Fotografía de {{ $casting['nombre'] }} por {{ $casting['director'] }}">
                        </li>
                        @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>