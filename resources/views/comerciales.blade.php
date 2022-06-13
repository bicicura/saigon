@extends('layouts.layout')

@section('content')

<style>
    @media (min-width: 40em) { .hero-p-w { width: 45%; } }
</style>

<x-desktop-nav-fixed />

<section class="px-3.5 lg:pr-16 lg:pl-10 flex flex-col-reverse lg:flex-row justify-between mb-12">

    <x-section-hero :title="'CASTINGS COMERCIALES'" :description="'Realizamos servicios de casting para proyectos comerciales nacionales e internacionales. Nuestro estudio esta equipado con varias salas y contamos con un staff altamente capacitado y competente. Tenemos un abordaje integral, mas de diez años de experiencia trabajando con productoras, lo que nos da la excelencia que requiere el mercado publicitario.'" />

</section>

<section class="px-3.5 lg:pr-16 lg:pl-10 pt-20 lg:mt-0">
    <x-casting-grid :castings="$castings"/>
</section>

@endsection