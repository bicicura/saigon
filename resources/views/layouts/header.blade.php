<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="casting, servicio de casting, productora, publicidad, produccion de publicidades, casting publicidad, representante de actores, management, advertisting, casting services">
    <meta name="description" content="Hacemos casting. Representamos actores. Producimos ideas.">
    <title>{{ config('app.name', 'Saigón') }}  @yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css?v=14') }}">
    <link rel="stylesheet" href="https://use.typekit.net/lkn8zik.css">
    <link rel="stylesheet" href="{{ asset('css/loader.css?v=14') }}">
    <link rel="stylesheet" href="/css/estilos.css?v=14">
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    
    <!-- Scripts -->
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/app.js?v=14') }}" defer></script>
    <script src="/js/nav.js?v=14"></script>

    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>

</head>
<body id="body" class="saigon-bg-white saigon-text-base-mobile text-saigon-black">
    <x-nav />