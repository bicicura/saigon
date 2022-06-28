<div class="justify-center hidden pt-6 lex-col sm:pt-6 md:flex">
    <div class="relative mx-auto sm:max-w-xl">
        <nav>
            <button :class="open? 'text-saigon-white' : 'text-saigon-black'" class="relative w-10 h-10 focus:outline-none" x-on:click="toggleNav; $dispatch('close-skills')" :disabled="buttonDisabled">
                <span class="sr-only">Abrir menu principal</span>
                <div class="absolute block w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                    <span aria-hidden="true" class="block absolute h-0.25 w-7 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': openBurger,' -translate-y-1.5': !openBurger }"></span>
                    <span aria-hidden="true" class="block absolute  h-0.25 w-7 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': openBurger } "></span>
                    <span aria-hidden="true" class="block absolute  h-0.25 w-7 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': openBurger, ' translate-y-1.5': !openBurger}"></span>
                </div>
            </button>
        </nav>
    </div>
</div>