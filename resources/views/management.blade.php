@extends('layouts.layout')

@section('title') {{ '— ' . __('Management') }} @endsection

@section('content')

<style>
    @media (min-width: 40em) { .hero-p-w { width: 60%; } }
</style>

<x-desktop-nav-fixed />

<div class="smooth-scroll">
    <section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12 lg:mb-0">
        <div class="z-20 flex flex-col items-end gap-4 mt-32 text-right lg:ml-auto lg:gap-8 lg:mt-16">
            <h1 style="width: min-content;" class="tracking-tight saigon-text-5xl saigon-font-thin saigon-title-line-height">MANAGEMENT</h1>
            <div class="w-full text-xl saigon-p-line-height hero-p-w">
                <p>{{__("Gestionar carreras actorales es un punto de diferencia que está impulsando el crecimiento Saigón.")}}</p>
                <p>{{__("La meta central es propulsar el potencial de talentos exclusivos - con experiencia y nóveles - para que estén disponibles en los roles y proyectos a su medida.")}}</p>
                <br>
                <p>{{__("Brindamos un servicio profesional dirigido a casting directors, productoras y realizadores.")}}</p>
                <br>
                <div class="w-11/12 ml-auto">
                    <p>{{__("Actualizamos el intercambio entre nuestros representados y nuestros clientes para generar una comunicación fluida y una transformación en las formas de trabajo ya establecidas.")}}</p>
                </div>
                <br>
                <div>
                    <p class="uppercase">{{__("Contacto")}}:</p>
                    <p>Julian Krakov |  julian@saigonbuenosaires.com</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="px-3.5 lg:pr-16 lg:pl-10 pt-20 lg:mt-0 pb-8" x-data="{ shown: false }">
        <div class="flex flex-col gap-6 lg:grid lg:grid-cols-4 managment-cards-container">
            @foreach ($actores as $actor)
                <a 
                    x-data="{ hover: false }" 
                    x-on:mouseover="hover = true" 
                    x-on:mouseleave="hover = false" 
                    href="{{ route('management.detail', ['language' => app()->getLocale(), 'id' => $actor->id]) }}" 
                    :class="shown? 'opacity-100 translate-y-0' : 'translate-y-8' " 
                    class="relative transition duration-200 ease-in translate-y-4 opacity-0" 
                    x-intersect.threshold.25="shown = true"
                >
                    <div class="w-full h-104">
                        <img class="object-cover object-top w-full h-full rounded-xl" loading="lazy" src="/actors/{{ $actor->thumbnail }}" alt="Fotografía de {{$actor->nombre}}">
                    </div>
                    <p class="saigon-text-200" :class="hover? 'underline' : ''">{{ $actor->nombre }}</p>
                    <div class="absolute inset-0 top-0 bottom-0 left-0 right-0 flex items-center justify-center card-play-button">
                        <div class="flex items-center gap-1 px-3 py-px rounded-full bg-saigon-black text-saigon-white w-max h-fit">
                            <svg class="hidden w-6 h-6 lg:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            <span>{{__('Ver más')}}</span>
                        </div>
                    </div>
                </a>    
            @endforeach
    </section>
</div>

@endsection