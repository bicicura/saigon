<header
    x-cloak
    x-data="nav"
    x-trap="open"
    @close-form.window="openForm = false; formSubmited = true; openBurger = false; skillsFlag = false;"
    {{-- Nav toggled form es un evento que emite el navegador para saber si esta abierto, si esta abierto previene que al apretar ESC otros componentes lleven acabo un evento --}}
    @keydown.escape.window = "$dispatch('nav-toggled', { state: open }); open = false; openForm = false; openBurger = false; skillsFlag = false; $dispatch('close-skills');"
    @skills-flag.window="skillsFlag = !skillsFlag"
    class="w-full header-desktop lg:w-max lg:pl-4 pb-3.5 lg:py-8 fixed top-0 left-0 z-40 saigon-transition-color bg-saigon-white lg:flex  lg:min-h-screen" 
    :class="open? 'text-saigon-white' : 'text-saigon-black'">

    <nav id="nav-header" :class="{ 'border-nav-mov' : open, 'border-saigon-black' : open == false, 'bg-saigon-black' : skillsFlag || openForm }" class="pt-3.5 pr-3.5 pl-3.5 lg:pl-0 lg:pt-0 lg:pb-0 lg:pr-4 flex lg:flex-col lg:min-h-full justify-between z-20 lg:border-r saigon-transition-border-color pb-2 lg:border-0">
        <a href="{{ route('index', app()->getLocale()) }}" class="w-logo" id="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 73" xml:space="preserve" class="saigon-logo-animation-mobile"><path class="saigon-transition-fill " :class="open? 'fill-saigon-white' : 'fill-saigon-black'" d="M92.4 17 77.2 1.9c-.4-.4-1.1-.4-1.5 0L62.1 15.5c-.3.3-.9.6-1.5 0L46.4 1.3C45.1.1 43.5 0 43.1 0L1.6.1C.2.1-.5 1.8.5 2.8L54 56.2c.7.7.2 1.8-.7 1.8H28.4c-.9 0-1.4 1.1-.7 1.8L40 72.3c.4.4 1.1.4 1.5 0l14.2-14.2 22.7-23.2c.4-.4.4-1.1 0-1.5l-13-13.2c-.9-.9-.4-1.4.7-1.4h25.6c.9 0 1.4-1.1.7-1.8zM50.5 71.2c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5c.9.1 1.5.7 1.5 1.5zm-.1 0c0-.7-.6-1.3-1.3-1.3-.7 0-1.3.6-1.3 1.3 0 .7.6 1.3 1.3 1.3.7 0 1.3-.6 1.3-1.3zm-1.2.1.5.8h-.2l-.5-.8h-.3v.8h-.2v-1.7h.6c.3 0 .5.2.5.5.1.2-.1.4-.4.4zm-.5-.1h.4c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3h-.4v.6z"/></svg>
        </a>

        {{-- Hamburguesa 1 --}}
        <x-nav.fixed-burger />

        {{-- Sumate a Saigon --}}
        <div class="flex-col items-end justify-between hidden md:flex lg:mt-auto">
            <span x-on:click="openForm=true; open=true;" class="mt-auto cursor-pointer texto-vertical" x-text="skillsFlag? 'SKILLS' : 'SUMATE A SAIGÓN'"></span> 
        </div>

        {{-- Hamburguesa 2 --}}
        <div class="flex flex-col items-end justify-between lg:mt-auto">
            <x-nav.mobile-burger />
            <x-nav.social-lang-btn />
        </div>
        <div :class="open? 'opacity-0' : 'opacity-100'" class="absolute bottom-0 mx-auto border-b-2 border-saigon-black saigon-transition-opacity lg:hidden" style="width: 93%"></div>
    </nav>
    <div
    style="visibility:hidden"
    id="nav-list"
    :class="open? 'nav-translate-0' : 'nav-translate-out'" 
    class="fixed top-0 left-0 flex flex-col justify-between w-full min-h-screen pb-6 overflow-y-scroll lg:overflow-y-auto saigon-font-thin nav-padding saigon-transition-transform bg-saigon-black lg:gap-2 pt-28 lg:pt-3 lg:pb-0 -z-10 lg:right-0"
    >
        <x-nav.links />

        <div :class="openForm? 'opacity-0 pointer-events-none' : 'opacity-100' " class="mt-auto text-right lg:text-left lg:mt-0 saigon-transition-opacity lg:space-y-1 lg:pb-8">
            <p>Bonpland 2362, Palermo, Buenos Aires.</p>
            <p>4776-4070</p>
            <p>info@saigonbuenosaires.com</p>
            <p>saigonbuenosaires.com</p>
        </div>
    </div>
    <x-notification-user />
</header>