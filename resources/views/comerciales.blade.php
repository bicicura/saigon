@extends('layouts.layout')

@section('title') {{ '— ' . 'Comerciales' }} @endsection

@section('content')

<x-desktop-nav-fixed />

<div data-scroll data-scroll-target class="smooth-scroll lg:fixed">
    <section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12 lg:mb-0">

        <div class="z-20 flex flex-col items-end gap-4 mt-32 text-right lg:ml-auto lg:gap-8 lg:mt-16">
            <h1 style="width: min-content;" class="tracking-tight uppercase saigon-text-5xl saigon-font-thin saigon-title-line-height">{{ __('Comerciales') }}</h1>
            
            <div class="w-full saigon-text-400 saigon-p-line-height hero-p-w">
                <p>{{__('Nos posicionamos como líderes en el mercado publicitario local con gran llegada internacional.')}}</p>
                <p>{{__('Desde hace más de una década convertimos en realidad las búsquedas más diversas.')}}</p>
                <p>{{__('Nuestro abordaje es una invitación a descubrir y reclutar talentos con un horizonte inédito en cada producción.')}}</p>
                <br>
                <p>{{__('La publicidad es una fuerza que nos impulsa día a día.')}}  {{__('Ideas y acción son los motores con los que nos movemos.')}}</p>
                <br>
                <br>
                <div>
                    <p class="uppercase">{{__('Contacto')}}:</p>
                    <p><span class="block lg:inline">Andi di Napoli</span><span class="hidden lg:inline lg:mx-1">  |  </span><span class="block lg:inline hover:underline"><a href="mailto:andi@saigonbuenosaires.com">andi@saigonbuenosaires.com</a></span></p>
                    <p><span class="block lg:inline">Javier Daniel</span><span class="hidden lg:inline lg:mx-1">  |  </span><span class="block lg:inline hover:underline"><a href="mailto:javier@saigonbuenosaires.com">javier@saigonbuenosaires.com</a></span></p>
                </div>
            </div>
        
        </div>
    
    </section>

    <section class="px-3.5 lg:pr-16 lg:pl-10 lg:pt-8 lg:mt-0">
        @livewire('casting-list', ['seccion' => $seccion])
    </section>
</div>

@endsection