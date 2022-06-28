<ul :class="open? 'opacity-100' : 'opacity-0' " class="flex flex-col text-right saigon-transition-opacity saigon-text-2xl lg:text-left children-ul nav-ul">
    <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-color">
        <p data-active="castings-comerciales" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d castings-c-p" :class="open? 'saigon-translate-0' : ''"><a class="uppercase" href="{{ route('index', app()->getLocale()) . '#comerciales' }}">{{ __('Comerciales') }}</a></p>
    </li>
    <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity">
        <p data-active="fotografia" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a class="uppercase" href="{{ route('castings-fotografia', app()->getLocale()) }}">{{ __('Fotografía') }}</a></p>
    </li>
    <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity">
        <p data-active="mini" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a href="{{ route('mini', app()->getLocale()) }}">MINI</a></p>
    </li>
    <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity">
        <p data-active="ficcion" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a class="uppercase" href="{{ route('ficcion', app()->getLocale()) }}">{{ __('Ficción') }}</a></p>
    </li>
    <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity">
        <p data-active="management" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a href="{{ route('management', app()->getLocale()) }}">MANAGEMENT</a></p>
    </li>
    <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity">
        <p data-active="street-agency" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a href="{{ route('street-agency', app()->getLocale()) }}" >STREET AGENCY</a></p>
    </li>
    <li :class="openForm? 'goTop' : 'saigon-translate-0 overflow-hidden'" class="relative text-nav-d saigon-transition-transform">
        <p data-active="sumate-a-saigon" @click="toggleForm;" class="tracking-normal menu-translate-p lg:px-0 px-3.5 cursor-pointer w-max ml-auto lg:ml-0 uppercase" :class="open? 'saigon-translate-0' : ''"><span>{{ __('Sumate a Saigón') }}</span></p>
        <div :class="openForm? 'opacity-100' : 'opacity-0'" class="absolute left-0 w-full pt-6 delay-500 lg:pt-0 text-nav-d z-100 saigon-transition-opacity-delay-300 top-12 lg:top-20">
            <livewire:nav-form />
        </div>
    </li>
    {{-- <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity lg:hidden">
        <p class="lg:text-8xl  menu-translate-p lg:px-0 px-3.5" :class="open? 'saigon-translate-0' : ''">ENG/ESP</p>
    </li> --}}
</ul>