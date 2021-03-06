@extends('layouts.layout')

@section('title') {{ '— ' . __('Street Agency') }} @endsection

@section('content')

<style>
    @media (min-width: 40em) { 
        .st-video-container {
            height: calc(100vh - 10rem); 
            aspect-radio: 9 / 16;
        }
        .hero-p-w { width: 43rem; }
    }
</style>

<x-desktop-nav-fixed />

<section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12 lg:mb-0 mt-32 lg:mt-28">

    <div class="mt-20 lg:mt-4 st-video-container">
        <video class="object-cover w-full h-full max-w-full rounded-lg" src="/street.mp4"  muted playsinline autoplay loop></video>
    </div>

    <div class="z-20 flex gap-4">
        <div class="z-20 flex flex-col gap-4 text-right lg:ml-auto lg:gap-8">
            <h1 class="tracking-tight uppercase saigon-text-5xl saigon-font-thin saigon-title-line-height">STREET AGENCY</h1>
            <div class="items-end w-full ml-auto saigon-text-300 saigon-p-line-height hero-p-w">
                <p>{{__("Street Agency es nuestra agencia de casting callejero con foco en la diversidad.")}}</p>
                <br>
                <p>{{__("Buscamos gente de todas las edades, etnias, nacionalidades, culturas, géneros y trasfondos. Nos interesan los perfiles más llamativos y expresivos: caras, cuerpos y habilidades distintas. Pero sobre todo buscamos gente real en su hábitat, porque en la calle siempre hay talentos ocultos, interesantes y desconocidos. Nos dedicamos a encontrar ese potencial y ser el puente entre ellos y las marcas que se abren al cambio.")}}</p>
                <br>
                <p>{{__("Estamos convencidos de que la comunicación es mucho más efectiva cuando participan personas auténticas y reales.")}}</p>
                <br>
                <div>
                    <p class="uppercase">{{__('Contacto')}}:</p>
                    <p><span class="block lg:inline">Josefina Cúneo</span><span class="hidden lg:inline lg:mx-1">  |  </span><span class="block lg:inline hover:underline"><a href="mailto:jose@streetagency.xyz">jose@streetagency.xyz</a></span></p>
                </div>
            </div>
        </div>
    </div>

</section>

<script defer>
    if (window.innerWidth < 800) {
        let setHeroHeight = () => {
            let vh = window.innerHeight;
            let hh = document.querySelector('header').offsetHeight;
            let height = (vh - hh) + 'px';
            let hero = document.querySelector('.st-video-container');
            
            hero.style.height = `calc(${height} - 3rem)`;
        }

        window.addEventListener('load', setHeroHeight);
    }
</script>

@endsection