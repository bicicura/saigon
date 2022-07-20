<div>
    @if ($open)
    <div style="z-index: 9999" class="fixed top-0 px-3.5 lg:px-0 left-0 flex items-center justify-center w-full min-h-screen bg-saigon-black bg-opacity-90 text-saigon-white">
        <div class="lg:max-w-4xl">
            <div class="relative z-50 items-start gap-4 lg:gap-6 lg:flex-col lg:space-y-0 lg:flex splide splide-popup">
                <div class="px-3.5 lg:px-0 flex flex-row-reverse lg:justify-center lg:gap-24 lg:items-center justify-between w-full leading-tight lg:w-full">
                    <div wire:click="close" class="mb-4">
                        <button type="button" class="relative p-4 transition-colors duration-100 ease-in-out focus:outline-none hover:text-gray-500">
                            <div class="absolute block w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                                <span aria-hidden="true" class="block absolute h-0.5 w-6 bg-current transform transition duration-500 ease-in-out rotate-45"></span>
                                <span aria-hidden="true" class="block absolute  h-0.5 w-6 bg-current transform  transition duration-500 ease-in-out -rotate-45"></span>
                            </div>
                        </button>
                    </div>
                    <div>
                        <p class="uppercase saigon-text-500 w-max">{{$CastingSelected['nombre']}}</p>
                        <div class="items-center gap-2 lg:flex">
                            <p class="saigon-text-200 w-max">{{$CastingSelected['director']}} </p>
                             — 
                            <p class="saigon-text-200 w-max">{{$CastingSelected['get_productora']['nombre']}}</p>
                        </div>
                    </div>
                </div>
                
                <div class="splide__arrows">
                    <div class="overflow-hidden splide__track aspect-video">
                        <ul class="splide__list">
                            @foreach ($CastingSelected['get_fotografias'] as $foto)
                            <li class="splide__slide">
                                <div class="w-full h-full mx-auto">
                                    <img class="object-contain object-center max-w-full max-h-full mx-auto shadow-md cursor-grab rounded-2xl" src="/fotos/{{ $foto['img'] }}" alt="">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="flex justify-between w-24 gap-6 mx-auto mt-6">
                        <button
                            class="splide__arrow splide__arrow--prev"
                            type="button"
                            aria-label="Previous slide"
                            aria-controls="splide01-track"
                        >
                    <div class="rotate-180 w-max">
                        <svg class="w-8 h-8" viewBox="0 0 24.99 21.91" class="rotate-180"><path class="fill-saigon-white stroke-saigon-white" d="M0 10.35 12.11 0l1.17 1.5c-4 3.34-8.47 6.65-11.3 8.59l.07.22c3.08-.15 8.4-.26 12.55-.26h10.39v1.87H14.61c-4.15 0-9.47-.15-12.51-.33l-.11.26c2.9 2.02 7.3 5.25 11.3 8.62l-1.25 1.43L0 11.6v-1.25Z"/></svg>
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
                        <svg class="w-8 h-8" viewBox="0 0 24.95 21.91"><path class="fill-saigon-white stroke-saigon-white" d="M24.95 11.52 12.84 21.91l-1.17-1.5c4-3.34 8.48-6.64 11.3-8.59l-.11-.26c-3.05.18-8.37.29-12.51.29H0V9.98h10.35c4.15 0 9.47.15 12.51.33l.11-.26c-2.9-2.02-7.3-5.25-11.3-8.62L12.92 0l12.04 10.31v1.21Z"/></svg>
                    </div>
                    </button>
                    </div>
                </div>
            </div>    
        </div>
        </div>
    @endif
</div>