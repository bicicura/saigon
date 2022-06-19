@extends('layouts.layout')

@section('title') {{ '— ' . 'Mini' }} @endsection

@section('content')

<style>
    @media (min-width: 40em) { .hero-p-w { width: 60%; } }
</style>

<x-desktop-nav-fixed />

<div class="smooth-scroll">
    <section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12 lg:mb-0">

        <div class="z-20 flex flex-col items-end gap-4 mt-32 text-right lg:ml-auto lg:gap-8 lg:mt-16">
            <h1 style="width: min-content;" class="tracking-tight saigon-text-5xl saigon-font-thin saigon-title-line-height">MINI</h1>
            <div class="w-full saigon-text-300 saigon-p-line-height hero-p-w">
                <p>{{__("Esta sección dedicada a los niños y adolescentes es la más desafiante en términos de resultados y descubrimientos que vivimos en cada nueva búsqueda.")}}</p>
                <br>
                <p>{{__("Un espacio de juego donde el talento y el carisma se despliegan sin miramientos.")}}</p>
                <br>
                <p>{{__("Para nosotros es importante que los niños y los padres se sientan cómodos, por eso contamos con baby wranglers especializado para cada proyecto.")}}</p>
                <br>
                <br>
                <div>
                    <p class="uppercase">{{__("Contacto")}}:</p>
                    <p>Melanie Semhan |  mini@saigonbuenosaires.com</p>
                </div>
            </div>
        </div>
    
    </section>
    
    <section class="px-3.5 lg:pr-16 lg:pl-10 pt-20 lg:pt-8 lg:mt-0">
        @livewire('casting-list', ['seccion' => $seccion])
    </section>
</div>

@endsection