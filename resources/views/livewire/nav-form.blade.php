<form wire:submit.prevent="submit" class="w-full pb-12 space-y-6 text-xl text-white saigon-text-200 lg:pb-0 lg:space-y-0 lg:flex lg:justify-between lg:flex-col saigon-font-thin px-7 lg:px-0 lg:mt-12 lg:pr-16 lg:w-full nav-form-height">

    <div class="absolute hidden -top-12 right-16 lg:block">
        <button type="button" class="relative p-6 focus:outline-none" @click="open = false; openForm = false; openBurger = false; $dispatch('close-skills'); $dispatch('skills-close-flag');">
            <span class="sr-only">Cerrar formulario de contacto</span>
            <div class="absolute block w-5 transform -translate-x-full -translate-y-full left-1/2 top-1/2">
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
        <x-input.nav-input-text-legend :inputContent="['label' => 'DNI', 'legend' => '(El número no debe incluír guiones ni puntos. Ej: 302002009)', 'model' => 'dni']" :flag="false" />
        
        <div class="lg:w-full h-fit">
            <div class="relative flex items-center gap-4 mb-2">
                <label class="ml-auto uppercase cursor-pointer lg:ml-0" for="nacionalidad">{{__('Nacionalidad')}}</label>
                @error('nacionalidad') <div class="absolute right-0 mt-1 text-sm font-bold text-red-500 lg:right-auto lg:left-0 lg:mt-0 -bottom-4">{{ $message }}</div> @enderror
            </div>
            <div class="relative">
                <select wire:model="nacionalidad" class="w-full uppercase bg-transparent border-none border-saigon-white text-saigon-white focus:ring-0">
                    <option class="" value="" disabled>{{__('Seleccione una Nacionalidad')}}</option>
                    @foreach ($nacionalidades as $item)
                    <option class="text-saigon-black" value="{{$item->val}}">{{{$item->nombre}}}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        
    </div>
    
    <div class="items-baseline lg:grid lg:grid-cols-3 lg:gap-12" x-data="{ cuitIsEmpty: false }">
        <x-input.nav-input-text-legend :inputContent="['label' => 'CUIT', 'legend' => '(El número no debe incluír guiones ni puntos. Ej: 302002009)', 'model' => 'cuit']" :flag="$cuitCheckbox" />
        <div class="gap-4 pt-3 ml-auto space-x-4 lg:space-x-0 w-max lg:ml-0 lg:pt-0 lg:w-full lg:flex lg:items-center">
            {{-- <x-input.nav-checkbox :inputContent="['label' => 'No poseo', 'model' => 'cuit']" inputType="checkbox" /> --}}

            <div class="flex items-center gap-4">
                <label class="lg:order-last" for="No poseo">{{__("No poseo")}}</label>
                <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0 focus:ring-offset-0" wire:model="cuitCheckbox" value="" type="checkbox" id="No poseo">
            </div>

        </div>
    </div>

    <div class="flex items-center gap-4 lg:w-max">
        <div class="flex items-center justify-between w-full gap-6 pt-2 lg:pt-0 lg:justify-start lg:gap-12">
            <x-input.nav-checkbox :reverse="'flex-row-reverse lg:flex-row'" :inputContent="['label' => 'Femenino', 'model' => 'sexo']" inputType="radio" />
            <x-input.nav-checkbox :reverse="'flex-row-reverse lg:flex-row'" :inputContent="['label' => 'Masculino', 'model' => 'sexo']" inputType="radio" />
            <x-input.nav-checkbox :reverse="'flex-row-reverse lg:flex-row'" :inputContent="['label' => 'Otro', 'model' => 'sexo']" inputType="radio" />
        </div>
        @error('sexo') <div class="w-full text-sm font-bold text-red-500 rounded-full">{{ $message }}</div> @enderror
    </div>

    <div class="space-y-6 lg:grid lg:grid-cols-3 lg:space-y-0 lg:gap-12">
        <x-input.nav-input-text x-mask="99/99/9999" placeholder="YYYY/MM/DD" :inputContent="['label' => 'FECHA DE NACIMIENTO', 'model' => 'nacimiento']" />
        <x-input.nav-input-text :inputContent="['label' => 'Altura', 'model' => 'altura']" />
    </div>
    
    <div class="grid gap-12 lg:gap-12 lg:grid-cols-3 lg:pt-3">
        <div class="flex flex-col gap-6 lg:col-span-2 lg:grid-cols-3 lg:grid">
            
            <x-input.nav-select :inputContent="['label' => 'Talle remera', 'model' => 'remera']" :talles="$talles_remera" />
            <x-input.nav-select :inputContent="['label' => 'Talle pantalon', 'model' => 'pantalon']" :talles="$talles_pantalon" />
            <x-input.nav-select :inputContent="['label' => 'Talle calzado', 'model' => 'calzado']" :talles="$talles_calzado" />
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
                <x-skills-container :sports="$talentos_deportes" :dance="$talentos_dance" :music="$talentos_music" />            
            </div>
        </div>
    </div>

    <div class="grid gap-12 pb-12 transition-opacity duration-150 lg:gap-16 lg:grid-cols-3 lg:pt-3 lg:pb-0" :class="skillsFlag? 'opacity-50 lg:opacity-0 lg:-z-10' : ''">
        <div class="flex flex-col gap-6 lg:col-span-2 lg:grid-cols-3 lg:grid">
            <x-input.nav-file :inputContent="['label' => 'Foto cara', 'model' => 'cara']" />
            <x-input.nav-file :inputContent="['label' => 'Foto cuerpo', 'model' => 'cuerpo']" />
            <button 
            x-bind:disabled="formSubmited || skillsFlag"
            class="flex items-center justify-center w-full p-4 py-2 mt-2 text-black uppercase transition-colors border-2 border-white lg:mt-0 saigon-bg-white lg:text-sm lg:w-full h-fit hover:bg-transparent hover:text-white">
                {{__('Enviar')}}
                <div wire:loading wire:target="submit">
                    <div class="ml-4 la-ball-clip-rotate">
                        <div class="saigon-text-blue"></div>
                    </div>
                </div>
            </button>
        </div>
    </div>
    
</form>