<form class="w-full pb-12 space-y-6 text-xl text-white lg:space-y-10 saigon-font-thin px-7 lg:px-0 lg:w-8/12 lg:mt-16" action="">

    <div class="space-y-6 lg:flex lg:space-y-0 lg:gap-12 lg:w-full">
        <x-input.nav-input-text />
    </div>
    
    <div class="space-y-6 lg:flex lg:space-y-0 lg:gap-12 lg:w-full">
        <div class="border-b lg:w-full">
            <label for="">CELULAR</label>
            <input type="tel" class="w-full text-white bg-transparent border-none">
        </div>
        <div class="lg:w-full lg:border-b">
            <label for="">DNI</label>
            <span class="hidden w-full text-sm text-right lg:text-left lg:inline">(El número de DNI no debe incluír guiones ni puntos. Ej: 302002009)</span>
            <input type="text" class="w-full text-right text-white bg-transparent border-none lg:text-left">
            <p class="pt-3 text-lg leading-snug border-t lg:hidden">(El número de DNI no debe incluír<br>guines ni puntos. Ej: 302002009)</p>
        </div>
    </div>
    
    <div class="lg:flex lg:gap-12">
        <div class="lg:border-b lg:w-full">
            <label for="">CUIT</label>
            <span class="hidden w-full text-sm text-right lg:text-left lg:inline">(El número de DNI no debe incluír guiones ni puntos. Ej: 302002009)</span>
            <input type="text" class="w-full text-right text-white bg-transparent border-none lg:text-left">
            <p class="pt-3 text-lg leading-snug border-t lg:hidden">(El número de CUIT no debe incluír guiones ni puntos. Ej: 302002009)</p>
        </div>
        <div class="gap-4 pt-3 space-x-4 lg:space-x-0 lg:pt-0 lg:w-full lg:flex lg:items-center">
            <label class="lg:order-last" for="">No poseo</label>
            <input class="bg-transparent border-white lg:order-first border-px" type="checkbox" name="" id="">
        </div>
    </div>

    <div class="flex justify-center gap-6 pt-2 lg:justify-start lg:gap-12">
        <div class="flex items-center gap-4">
            <input class="bg-transparent border-white border-px" type="checkbox" name="" id="">
            <label for="">FEMENINO</label>
        </div>
        <div class="flex items-center gap-4">
            <input class="bg-transparent border-white border-px" type="checkbox" name="" id="">
            <label for="">MASCULINO</label>
        </div>
    </div>

    <div class="space-y-6 lg:flex lg:space-y-0 lg:gap-12 lg:w-full">
        <div class="w-full pt-2 border-b lg:pt-0">
            <label for="">FECHA DE NACIMIENTO</label>
            <input type="tel" class="w-full text-white bg-transparent border-none">
        </div>
        <div class="w-full border-b">
            <label for="">ALTURA</label>
            <input type="tel" class="w-full text-white bg-transparent border-none">
        </div>
    </div>
    
    <div class="gap-8 lg:grid lg:grid-cols-3">
        <div class="border-b">
            <select class="w-full bg-transparent border-white border-none" name="" id="">
                <option value="">TALLE REMERA</option>
            </select>
        </div>
        <div class="border-b">
            <select class="w-full bg-transparent border-none" name="" id="">
                <option value="">TALLE REMERA</option>
            </select>
        </div>
        <div class="border-b ">
            <select class="w-full bg-transparent border-none" name="" id="">
                <option value="">TALLE CALZADO</option>
            </select>
        </div>
    </div>

    <div class="gap-8 lg:grid lg:grid-cols-3 lg:pt-6">
        <div class="mt-2 lg:mt-0 lg:w-full" x-data="{ focused: false }">
            <div class="flex items-center">
                <span class="w-full shadow-sm">
                    <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused} " for="newAvatar" class="flex justify-center px-3 py-3 text-white transition duration-150 ease-in-out border border-gray-300 cursor-pointer lg:py-2 hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
                        FOTO CARA
                    </label>
                    <input @focus="focused = true" @blur="focused = false" type="file" class="sr-only" id="newAvatar" wire:model="newAvatar">
                </span>
            </div>
        </div>
        <div class="mt-2 lg:mt-0 lg:w-full" x-data="{ focused: false }">
            <div class="flex items-center">
                <span class="w-full shadow-sm">
                    <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused} " for="newAvatar" class="flex justify-center px-3 py-3 text-white transition duration-150 ease-in-out border border-gray-300 cursor-pointer lg:py-2 hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
                        FOTO CUERPO
                    </label>
                    <input @focus="focused = true" @blur="focused = false" type="file" class="sr-only" id="newAvatar" wire:model="newAvatar">
                </span>
            </div>
        </div>
        <button class="w-full p-4 mt-2 lg:mt-0 saigon-bg-white lg:py-2 saigon-text-blue lg:block lg:w-full">ENVIAR</button>
    </div>

    <div class="space-y-4 text-base lg:space-y-0 saigon-font-thin lg:flex lg:gap-3">
        <div class="lg:flex lg:gap-3">
            <p>¿Tenes un perfil que consideras interesante?</p>
            <p>¿Te gustaría formar parte de nuestra base de datos?</p>
        </div>
        <p>Escribinos un mail a <span>info@saigonbuenosaires.com</span></p>
        <div class="w-7/12 pt-2 ml-auto lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 209 35" xml:space="preserve"><g fill="#F3F3F3"><path d="M26 21.1c-1.1-1-2.5-1.6-4.2-2-1.7-.4-3.9-.8-6.8-1.1-3.2-.4-5.7-.9-7.7-1.4-1.9-.5-3.6-1.4-4.9-2.6-1.4-1.2-2-3-2-5.3 0-3 1.4-5.2 4.1-6.6C7.2.7 10.9 0 15.5 0c4.7 0 8.3.6 10.8 1.9 2.5 1.3 4 3.5 4.5 6.7H26c-.4-2.5-1.5-4.4-3.2-5.6-1.7-1.2-4.2-1.8-7.4-1.8-3.6 0-6.4.6-8.4 1.7C5.2 4 4.2 5.6 4.2 7.7c0 1.6.5 2.9 1.6 3.7 1.1.9 2.4 1.5 4.1 1.9 1.6.4 3.8.7 6.5 1 3.3.4 5.9.8 7.9 1.3s3.7 1.4 5.1 2.7c1.4 1.3 2.1 3.2 2.1 5.7 0 6.2-5.1 9.3-15.2 9.3-4.9 0-8.8-.7-11.5-2.2-2.7-1.5-4.3-3.8-4.8-7h4.8c.5 2.6 1.7 4.6 3.4 6 1.8 1.4 4.5 2 8.1 2 3.6 0 6.4-.6 8.4-1.8 2-1.2 3-2.9 3-5.3 0-1.6-.6-3-1.7-3.9zM60 22.3H42.2l-4.6 10.9h-3.4L50.3.2h4.5l14.9 32.9h-5L60 22.3zm-.7-1.5L50.8 1.6l-8.1 19.2h16.6zM75.2 33.1V.2h4.3v32.9h-4.3zM117.7 29.4c-3.1 2.7-7.5 4-12.9 4-3.9 0-7.2-.7-9.8-2.1-2.7-1.4-4.7-3.3-6-5.8-1.3-2.5-2-5.5-2-8.8 0-3.4.7-6.3 2-8.8 1.3-2.5 3.3-4.5 6-5.8C97.7.7 101 0 104.8 0c4.7 0 8.6 1 11.6 2.9 3.1 1.9 5 4.9 5.8 9h-5c-.7-3.4-2.1-6-4.1-7.9-2-1.9-4.8-2.8-8.3-2.8-4.4 0-7.7 1.4-9.9 4.3s-3.2 6.6-3.2 11.2 1.1 8.3 3.2 11.2c2.2 2.9 5.5 4.3 9.9 4.3 3.9 0 7-1.2 9.1-3.5 2.2-2.3 3.4-5.4 3.8-9.2h-13.9v-1.4h18.8c-.1 4.9-1.8 8.6-4.9 11.3zM136.7 31.3c-2.7-1.4-4.7-3.3-6.1-5.8-1.4-2.5-2.1-5.4-2.1-8.8 0-3.3.7-6.3 2.1-8.8 1.4-2.5 3.4-4.5 6.1-5.8 2.7-1.4 5.9-2.1 9.7-2.1 3.8 0 7 .7 9.7 2.1 2.7 1.4 4.7 3.3 6.1 5.8 1.4 2.5 2.1 5.4 2.1 8.8 0 3.3-.7 6.3-2.1 8.8-1.4 2.5-3.4 4.5-6.1 5.8-2.7 1.4-5.9 2.1-9.7 2.1-3.8 0-7-.7-9.7-2.1zm-.1-25.8c-2.2 2.9-3.3 6.6-3.3 11.2s1.1 8.3 3.2 11.2c2.1 2.9 5.4 4.3 9.7 4.3 4.5 0 7.8-1.4 10-4.3s3.3-6.6 3.3-11.2-1.1-8.3-3.2-11.2c-2.1-2.9-5.4-4.3-9.7-4.3-4.5 0-7.9 1.4-10 4.3zM201.1.2v32.9h-4.9L173.3 3.2v29.9h-1.7V.2h4.9l22.9 29.9V.2h1.7zM207.7 2.3c-.1.3-.4.5-.7.5-.5 0-.8-.4-.8-.9s.4-.8.8-.8c.3 0 .6.2.7.5h.3c-.1-.4-.5-.7-1-.7-.6 0-1.1.5-1.1 1.1 0 .6.5 1.1 1.1 1.1.5 0 .9-.3 1-.8h-.3z"/><path d="M207 .1c-1 0-1.8.8-1.8 1.8s.8 1.8 1.8 1.8 1.8-.8 1.8-1.8S208 .1 207 .1zm0 3.4c-.9 0-1.6-.7-1.6-1.6s.7-1.6 1.6-1.6c.9 0 1.6.7 1.6 1.6s-.7 1.6-1.6 1.6z"/></g></svg>
        </div>
    </div>
</form>