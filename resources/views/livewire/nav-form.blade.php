<form wire:submit.prevent="submit" class="w-full pb-12 space-y-6 text-xl text-white saigon-text-200 lg:pb-0 lg:space-y-0 lg:flex lg:justify-between lg:flex-col saigon-font-thin px-7 lg:px-0 lg:mt-12 lg:pr-16 lg:w-full nav-form-height">

    <div class="absolute hidden -top-12 right-24 lg:block">
        <button type="button" class="relative p-4 focus:outline-none" @click="toggleForm">
            <span class="sr-only">Cerrar formulario de contacto</span>
            <div class="absolute block w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                <span aria-hidden="true" class="block absolute h-0.5 w-12 bg-current transform transition duration-500 ease-in-out rotate-45"></span>
                <span aria-hidden="true" class="block absolute  h-0.5 w-12 bg-current transform  transition duration-500 ease-in-out -rotate-45"></span>
            </div>
        </button>
    </div>

    <div class="space-y-6 lg:grid lg:grid-cols-3 lg:space-y-0 lg:gap-12 lg:w-full">
        <x-input.nav-input-text :inputContent="['label' => 'Nombre y Apellido', 'model' => 'nombre' ]" />
        <x-input.nav-input-text :inputContent="['label' => 'Email', 'model' => 'email', 'model' => 'email']" />
    </div>
    
    <div class="space-y-6 lg:grid lg:grid-cols-3 lg:space-y-0 lg:gap-12 lg:w-full">
        <x-input.nav-input-text :inputContent="['label' => 'Celular', 'model' => 'celular']" />
        <x-input.nav-input-text-legend :inputContent="['label' => 'DNI', 'legend' => '(El número no debe incluír guiones ni puntos. Ej: 302002009)', 'model' => 'dni']" />
        <x-input.nav-input-text :inputContent="['label' => 'Nacionalidad', 'model' => 'nacionalidad']" />
    </div>
    
    <div class="items-baseline lg:grid lg:grid-cols-3 lg:gap-12" x-data="{ cuitIsEmpty: false }">
        <x-input.nav-input-text-legend :inputContent="['label' => 'CUIT', 'legend' => '(El número no debe incluír guiones ni puntos. Ej: 302002009)', 'model' => 'cuit']" />
        <div class="gap-4 pt-3 ml-auto space-x-4 lg:space-x-0 w-max lg:ml-0 lg:pt-0 lg:w-full lg:flex lg:items-center">
            <x-input.nav-checkbox :inputContent="['label' => 'No poseo', 'model' => 'cuit']" />
        </div>
    </div>

    <div class="flex items-center gap-4 lg:w-max">
        <div class="flex items-center justify-between w-full gap-6 pt-2 lg:pt-0 lg:justify-start lg:gap-12">
            <x-input.nav-checkbox :reverse="'flex-row-reverse lg:flex-row'" :inputContent="['label' => 'Femenino', 'model' => 'sexo']" />
            <x-input.nav-checkbox :reverse="'flex-row-reverse lg:flex-row'" :inputContent="['label' => 'Masculino', 'model' => 'sexo']" />
            <x-input.nav-checkbox :reverse="'flex-row-reverse lg:flex-row'" :inputContent="['label' => 'Otro', 'model' => 'sexo']" />
        </div>
        @error('sexo') <div class="w-full text-sm font-bold text-red-500 rounded-full">{{ $message }}</div> @enderror
    </div>

    <div class="space-y-6 lg:grid lg:grid-cols-3 lg:space-y-0 lg:gap-12">
        <x-input.nav-input-text x-mask="99/99/9999" placeholder="MM/DD/YYYY" :inputContent="['label' => 'FECHA DE NACIMIENTO', 'model' => 'nacimiento']" />
        <x-input.nav-input-text :inputContent="['label' => 'Altura', 'model' => 'altura']" />
    </div>
    
    <div class="grid gap-12 lg:gap-12 lg:grid-cols-3 lg:pt-3">
        <div class="flex flex-col gap-6 lg:col-span-2 lg:grid-cols-3 lg:grid">
            <x-input.nav-select :inputContent="['label' => 'Talle remera', 'model' => 'remera', 'options' => ['Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large', ]]" />
            <x-input.nav-select :inputContent="['label' => 'Talle pantalon', 'model' => 'pantalon', 'options' => ['Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large', ]]" />
            <x-input.nav-select :inputContent="['label' => 'Talle calzado', 'model' => 'calzado', 'options' => ['Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large', ]]" />
        </div>
    </div>
    
    <div class="grid gap-12 lg:gap-12 lg:grid-cols-3">
        <div class="flex gap-6 lg:col-span-2 lg:grid-cols-3 lg:grid">
            <div class="hidden lg:block"></div>
            <div class="hidden lg:block"></div>
            <div class="w-full h-fit" x-data=" { open: false, } " @close-skills.window="open = false">
                <button
                @click="$dispatch('skills-flag'); open = !open;"
                type="button"
                class="w-full text-left text-white bg-transparent bg-right bg-no-repeat border-b border-white saigon-text-100 skills-container">SKILLS</button>
                <x-skills-container />            
            </div>
        </div>
    </div>

    {{-- <div class="grid gap-12 lg:gap-12 lg:grid-cols-3 lg:pt-3">
        <div class="grid grid-cols-3 col-span-2 gap-12">
            <div class="col-span-2">
                <x-input.nav-input-text :inputContent="['label' => 'Skills', 'model' => 'skills' ]" />
            </div>
            <x-input.nav-input-text-legend :inputContent="['label' => 'Link', 'legend' => '(Reel/presentación)', 'model' => 'link']" />
        </div>
    </div> --}}

    <div class="grid gap-12 pb-12 transition-opacity duration-150 lg:gap-16 lg:grid-cols-3 lg:pt-3 lg:pb-0" :class="skillsFlag? 'opacity-50 lg:opacity-0 lg:-z-10' : ''">
        <div class="flex flex-col gap-6 lg:col-span-2 lg:grid-cols-3 lg:grid">
            <x-input.nav-file :inputContent="['label' => 'Foto cara', 'model' => 'cara']" />
            <x-input.nav-file :inputContent="['label' => 'Foto cuerpo', 'model' => 'cuerpo']" />
            <button 
            x-bind:disabled="formSubmited || skillsFlag"
            class="w-full p-4 py-2 mt-2 text-black uppercase transition-colors border-2 border-white lg:mt-0 saigon-bg-white lg:text-sm lg:block lg:w-full h-fit hover:bg-transparent hover:text-white">{{__('Enviar')}}</button>
        </div>
    </div>
    
    {{-- <div class="mt-3 space-y-4 text-sm lg:space-y-0 lg:grid-cols-3 saigon-font-thin lg:grid lg:gap-8 lg:w-8/12">
        <div class="lg:flex lg:gap-3">
            <p>¿Tenes un perfil que consideras interesante?</p>
            <p class="block lg:hidden">¿Te gustaría formar parte de nuestra base de datos?</p>
        </div>
        <p class="hidden lg:block">¿Te gustaría formar parte de nuestra base de datos?</p>
        <p>Escribinos un mail a <a href="mailto:info@saigonbuenosaires.com">info@saigonbuenosaires.com</a></p>
        <div class="w-7/12 pt-2 ml-auto lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 209 35" xml:space="preserve"><g fill="#F3F3F3"><path d="M26 21.1c-1.1-1-2.5-1.6-4.2-2-1.7-.4-3.9-.8-6.8-1.1-3.2-.4-5.7-.9-7.7-1.4-1.9-.5-3.6-1.4-4.9-2.6-1.4-1.2-2-3-2-5.3 0-3 1.4-5.2 4.1-6.6C7.2.7 10.9 0 15.5 0c4.7 0 8.3.6 10.8 1.9 2.5 1.3 4 3.5 4.5 6.7H26c-.4-2.5-1.5-4.4-3.2-5.6-1.7-1.2-4.2-1.8-7.4-1.8-3.6 0-6.4.6-8.4 1.7C5.2 4 4.2 5.6 4.2 7.7c0 1.6.5 2.9 1.6 3.7 1.1.9 2.4 1.5 4.1 1.9 1.6.4 3.8.7 6.5 1 3.3.4 5.9.8 7.9 1.3s3.7 1.4 5.1 2.7c1.4 1.3 2.1 3.2 2.1 5.7 0 6.2-5.1 9.3-15.2 9.3-4.9 0-8.8-.7-11.5-2.2-2.7-1.5-4.3-3.8-4.8-7h4.8c.5 2.6 1.7 4.6 3.4 6 1.8 1.4 4.5 2 8.1 2 3.6 0 6.4-.6 8.4-1.8 2-1.2 3-2.9 3-5.3 0-1.6-.6-3-1.7-3.9zM60 22.3H42.2l-4.6 10.9h-3.4L50.3.2h4.5l14.9 32.9h-5L60 22.3zm-.7-1.5L50.8 1.6l-8.1 19.2h16.6zM75.2 33.1V.2h4.3v32.9h-4.3zM117.7 29.4c-3.1 2.7-7.5 4-12.9 4-3.9 0-7.2-.7-9.8-2.1-2.7-1.4-4.7-3.3-6-5.8-1.3-2.5-2-5.5-2-8.8 0-3.4.7-6.3 2-8.8 1.3-2.5 3.3-4.5 6-5.8C97.7.7 101 0 104.8 0c4.7 0 8.6 1 11.6 2.9 3.1 1.9 5 4.9 5.8 9h-5c-.7-3.4-2.1-6-4.1-7.9-2-1.9-4.8-2.8-8.3-2.8-4.4 0-7.7 1.4-9.9 4.3s-3.2 6.6-3.2 11.2 1.1 8.3 3.2 11.2c2.2 2.9 5.5 4.3 9.9 4.3 3.9 0 7-1.2 9.1-3.5 2.2-2.3 3.4-5.4 3.8-9.2h-13.9v-1.4h18.8c-.1 4.9-1.8 8.6-4.9 11.3zM136.7 31.3c-2.7-1.4-4.7-3.3-6.1-5.8-1.4-2.5-2.1-5.4-2.1-8.8 0-3.3.7-6.3 2.1-8.8 1.4-2.5 3.4-4.5 6.1-5.8 2.7-1.4 5.9-2.1 9.7-2.1 3.8 0 7 .7 9.7 2.1 2.7 1.4 4.7 3.3 6.1 5.8 1.4 2.5 2.1 5.4 2.1 8.8 0 3.3-.7 6.3-2.1 8.8-1.4 2.5-3.4 4.5-6.1 5.8-2.7 1.4-5.9 2.1-9.7 2.1-3.8 0-7-.7-9.7-2.1zm-.1-25.8c-2.2 2.9-3.3 6.6-3.3 11.2s1.1 8.3 3.2 11.2c2.1 2.9 5.4 4.3 9.7 4.3 4.5 0 7.8-1.4 10-4.3s3.3-6.6 3.3-11.2-1.1-8.3-3.2-11.2c-2.1-2.9-5.4-4.3-9.7-4.3-4.5 0-7.9 1.4-10 4.3zM201.1.2v32.9h-4.9L173.3 3.2v29.9h-1.7V.2h4.9l22.9 29.9V.2h1.7zM207.7 2.3c-.1.3-.4.5-.7.5-.5 0-.8-.4-.8-.9s.4-.8.8-.8c.3 0 .6.2.7.5h.3c-.1-.4-.5-.7-1-.7-.6 0-1.1.5-1.1 1.1 0 .6.5 1.1 1.1 1.1.5 0 .9-.3 1-.8h-.3z"/><path d="M207 .1c-1 0-1.8.8-1.8 1.8s.8 1.8 1.8 1.8 1.8-.8 1.8-1.8S208 .1 207 .1zm0 3.4c-.9 0-1.6-.7-1.6-1.6s.7-1.6 1.6-1.6c.9 0 1.6.7 1.6 1.6s-.7 1.6-1.6 1.6z"/></g></svg>
        </div>
    </div> --}}
</form>