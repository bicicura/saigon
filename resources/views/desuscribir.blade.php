@extends('layouts.layout')

@section('title') {{ '— ' . 'Comerciales' }} @endsection

@section('content')

<x-desktop-nav-fixed />

<div>
    <section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12 lg:mb-0">

        <div class="z-20 flex flex-col items-end gap-4 mt-32 text-right lg:ml-auto lg:gap-8 lg:mt-16">
            <h1 style="width: min-content;" class="tracking-tight uppercase saigon-text-5xl saigon-font-thin saigon-title-line-height">Newsletter</h1>
            
            <div class="w-full saigon-text-400 saigon-p-line-height hero-p-w">
                <p>{{__('Complete el formulario para darse de baja de nuestro newsletter.')}}</p>
                <br>
                <div class="lg:ml-auto lg:w-5/12">
                    @livewire('newsletter-subscription', ['title' => 'Ingresá tu email:', 'seccion' => 'desuscribirse', 'type' => 'remove'])
                </div>

                <div x-cloak x-data="{ show: false }" @desuscribir.window="show = true" x-show="show">
                    <br>
                    <p class="text-right saigon-font-semibold saigon-text-200">Se ha desuscrito de nuestro newsletter con éxito.</p>
                </div>
            </div>
        
        </div>
    
    </section>
</div>

@endsection