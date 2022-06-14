@extends('layouts.layout')

@section('content')

<style>
    @media (min-width: 40em) { .hero-p-w { width: 60%; } }
</style>

<x-desktop-nav-fixed />

<div class="smooth-scroll">
    <section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12 lg:mb-0">t
        <div class="z-20 flex flex-col items-end gap-4 mt-32 text-right lg:ml-auto lg:gap-8 lg:mt-16">
            <h1 style="width: min-content;" class="tracking-tight saigon-text-5xl saigon-font-thin saigon-title-line-height">MANAGMENT</h1>
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
                    <p>{{__("Contacto")}}:</p>
                    <p>Julian Krakov |  julian@saigonbuenosaires.com</p>
                </div>
            </div>
        </div>
    
    </section>
    
    <section class="px-3.5 lg:pr-16 lg:pl-10 pt-20 lg:mt-0 pb-8">
        <div class="grid grid-cols-4 gap-6">
            @foreach ($actores as $actor)
            <a href="{{ route('management.detail', ['language' => app()->getLocale(), 'id' => $actor->id]) }}">
                <div style="height: 26rem" class="w-full">
                    <img class="object-cover object-top w-full h-full rounded-xl" loading="lazy" src="/actors/{{ $actor->thumbnail }}" alt="Fotografía de {{$actor->nombre}}">
                </div>
                <p class="saigon-text-200">{{ $actor->nombre }}</p>
            </a>    
            @endforeach
    </section>
</div>

@endsection