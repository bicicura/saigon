<header
    x-data="nav"
    @close-form.window="openForm = false; formSubmited = true; openBurger = false; skillsFlag = false"
    @keydown.escape.window = "open = false; openForm = false; openBurger = false; skillsFlag = false; $dispatch('close-skills')"
    @skills-flag.window="skillsFlag = !skillsFlag"
    class="w-full header-desktop lg:w-max lg:pl-4 pb-3.5 lg:py-8 fixed top-0 left-0 z-40 saigon-transition-color bg-saigon-white lg:flex  lg:min-h-screen" 
    :class="open? 'text-saigon-white' : 'text-saigon-black'">
        <nav id="nav-header" :class="open? 'border-nav-mov' : 'border-saigon-black'" class="pt-3.5 pr-3.5 pl-3.5 lg:pl-0 lg:pt-0 lg:pb-0 lg:pr-4 flex lg:flex-col lg:min-h-full justify-between z-20 lg:border-r saigon-transition-border-color pb-2 lg:border-0">
            <div class="w-logo" id="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 73" xml:space="preserve" class="saigon-logo-animation-mobile"><path class="saigon-transition-fill " :class="open? 'fill-saigon-white' : 'fill-saigon-black'" d="M92.4 17 77.2 1.9c-.4-.4-1.1-.4-1.5 0L62.1 15.5c-.3.3-.9.6-1.5 0L46.4 1.3C45.1.1 43.5 0 43.1 0L1.6.1C.2.1-.5 1.8.5 2.8L54 56.2c.7.7.2 1.8-.7 1.8H28.4c-.9 0-1.4 1.1-.7 1.8L40 72.3c.4.4 1.1.4 1.5 0l14.2-14.2 22.7-23.2c.4-.4.4-1.1 0-1.5l-13-13.2c-.9-.9-.4-1.4.7-1.4h25.6c.9 0 1.4-1.1.7-1.8zM50.5 71.2c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5c.9.1 1.5.7 1.5 1.5zm-.1 0c0-.7-.6-1.3-1.3-1.3-.7 0-1.3.6-1.3 1.3 0 .7.6 1.3 1.3 1.3.7 0 1.3-.6 1.3-1.3zm-1.2.1.5.8h-.2l-.5-.8h-.3v.8h-.2v-1.7h.6c.3 0 .5.2.5.5.1.2-.1.4-.4.4zm-.5-.1h.4c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3h-.4v.6z"/></svg>
            </div>

            <div class="flex flex-col justify-center pt-6 sm:pt-6">
                <div class="relative mx-auto sm:max-w-xl">
                    <nav>
                        <button :class="open? 'text-saigon-white' : 'text-saigon-black'" class="relative w-10 h-10 focus:outline-none" x-on:click="toggleNav; $dispatch('close-skills')" :disabled="buttonDisabled">
                            <span class="sr-only">Abrir menu principal</span>
                            <div class="absolute block w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                                <span aria-hidden="true" class="block absolute h-0.25 w-6 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': openBurger,' -translate-y-1.5': !openBurger }"></span>
                                <span aria-hidden="true" class="block absolute  h-0.25 w-6 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': openBurger } "></span>
                                <span aria-hidden="true" class="block absolute  h-0.25 w-6 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': openBurger, ' translate-y-1.5': !openBurger}"></span>
                            </div>
                        </button>
                    </nav>
                </div>
            </div>

            <div class="flex flex-col items-end justify-between lg:mt-auto">
                <span x-on:click="openForm=true; open=true;" class="mt-auto cursor-pointer texto-vertical" x-text="skillsFlag? 'SKILLS' : 'SUMATE A SAIGÓN'"></span> 
            </div>


            <div class="flex flex-col items-end justify-between lg:mt-auto">
                <div x-on:click="toggleNav">
                    <button class="relative flex items-center ml-auto space-x-2 lg:hidden focus:outline-none">
                        <div class="absolute left-0 right-0 p-6 mx-auto -top-4"></div>
                        <div class="relative flex items-center justify-center w-7">
                        <span x-bind:class="open ? 'translate-y-2 rotate-45' : ''"
                                class="absolute w-full h-px transition transform bg-current"></span>
                        
                        <span x-bind:class="open ? 'translate-y-2 -rotate-45' : 'translate-y-2'"
                                class="absolute w-full h-px transition transform bg-current"></span>
                        </div>
                    </button>
                </div>
                <div class="space-x-3 pointer-events-auto lg:flex lg:text-right lg:flex-col lg:gap-1 lg:space-x-0">
                    <a href="{{ route(Route::currentRouteName(), ['language' => app()->getLocale() === 'es' ? 'en' : 'es', 'id' => isset(Route::current()->parameters['id']) ? Route::current()->parameters['id'] : null]) }}">{{ strtoupper(app()->getLocale() === "es" ? 'eng' : 'esp') }}</a>
                    <a target="_blank" href="https://www.instagram.com/saigonbuenosaires/">IG</a>
                    <a target="_blank" href="https://www.facebook.com/SaigonBuenosAires/">FB</a>
                    <a target="_blank" href="https://twitter.com/saigonBA?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">TW</a>
                    <a target="_blank" href="https://vimeo.com/saigonbuenosaires">VM</a>
                </div>
            </div>
            <div :class="open? 'opacity-0' : 'opacity-100'" class="absolute bottom-0 mx-auto border-b-2 border-saigon-black saigon-transition-opacity lg:hidden" style="width: 93%"></div>
        </nav>
        <div
        style="visibility:hidden"
        id="nav-list"
        :class="open? 'nav-translate-0' : 'nav-translate-out'" 
        class="fixed top-0 left-0 flex flex-col justify-between w-full min-h-screen pb-6 overflow-y-scroll lg:overflow-y-auto saigon-font-thin nav-padding saigon-transition-transform bg-saigon-black lg:gap-2 pt-28 lg:pt-3 lg:pb-0 -z-10 lg:right-0"
        >
            <ul :class="open? 'opacity-100' : 'opacity-0' " class="flex flex-col text-right saigon-transition-opacity saigon-text-2xl lg:text-left children-ul nav-ul">
                <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-color">
                    <p data-active="castings-comerciales" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d castings-c-p" :class="open? 'saigon-translate-0' : ''"><a class="uppercase" href="{{ route('index', app()->getLocale()) }}">{{ __('Comerciales') }}</a></p>
                </li>
                <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity">
                    <p data-active="castings-fotografia" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a class="uppercase" href="{{ route('castings-fotografia', app()->getLocale()) }}">{{ __('Fotografía') }}</a></p>
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
                    <p data-active="street-agency" class="tracking-normal menu-translate-p lg:px-0 px-3.5 text-nav-d" :class="open? 'saigon-translate-0' : ''"><a href="{{ route('street agency', app()->getLocale()) }}" >STREET AGENCY</a></p>
                </li>
                <li :class="openForm? 'goTop' : 'saigon-translate-0 overflow-hidden'" class="relative text-nav-d saigon-transition-transform">
                    <p data-active="sumate-a-saigon" @click="toggleForm;" class="tracking-normal menu-translate-p lg:px-0 px-3.5 cursor-pointer" :class="open? 'saigon-translate-0' : ''"><span>SUMATE A SAIGÓN</span></p>
                    <div :class="openForm? 'opacity-100' : 'opacity-0'" class="absolute left-0 w-full overflow-y-scroll delay-500 text-nav-d lg:overflow-y-hidden z-100 saigon-transition-opacity-delay-300 top-20">
                        <livewire:nav-form />
                    </div>
                </li>
                <li :class="openForm? 'opacity-0 pointer-events-none' : ''" class="overflow-hidden saigon-transition-opacity lg:hidden">
                    <p class="lg:text-8xl  menu-translate-p lg:px-0 px-3.5" :class="open? 'saigon-translate-0' : ''">ENG/ESP</p>
                </li>
            </ul>

            <div :class="openForm? 'opacity-0 pointer-events-none' : 'opacity-100' " class="mt-auto text-right lg:text-left lg:mt-0 saigon-transition-opacity lg:space-y-1 lg:pb-8">
                <p>Bonpland 2362, Palermo, Buenos Aires.</p>
                <p>4776-4070</p>
                <p>info@saigonbuenosaires.com</p>
                <p>saigonbuenosaires.com</p>
            </div>
        </div>
        <x-notification-user />
</header>