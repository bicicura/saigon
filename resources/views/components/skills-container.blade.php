<div x-transition.origin.center.right.duration.400ms x-show="open" class="static w-full lg:top-0 lg:left-0 lg:h-full lg:absolute bg-saigon-black lg:pt-12">
    <div class="lg:h-full">
        <div class="flex flex-col justify-between lg:h-full lg:w-9/12" style="line-height: 1.36rem;">
            <x-skills-group 
                class="saigon-text-200"
                :inputContent="['model' => 'skills.deportes']"
                :label="'deportes'"
                :noHace="'No hace deportes'"
                :skillsGroup="[
                'Futbol', 'Basket', 'Tenis', 'Hockey', 'Voley', 'Handball', 'Golf', 'Rugby', 'Boxeo', 'Sumo', 
                'Natacion', 'Rollers', 'Patin artistico', 'Patin sobre hielo', 'Skate', 'Longboard', 'Surf', 'Kitesurf', 'Wakeboard', 
                'Snowboard', 'Esqui', 'Equitacion', 'Polo', 'Gimnasia', 'Running', 'Ciclismo', 'Bmx', 'Yoga',
                'Pilates', 'Crossfit', 'Funcional', 'Acrobacia en piso', 'Remo', 'Parkour', 'Esgrima', 'Artes marciales', 'Tiro con arco' 
            ]" />
            
            <x-skills-group 
            :inputContent="['model' => 'skills.bailes']"
            :label="'bailes'"
            :noHace="'No baila'"
            :skillsGroup="[
                        'Danza', 'Danza aerea', 'Baile profesional', 'Breakdance',
                        'Flamenco', 'Hip-hop', 'House', 'Jazz',
                        'Locking', 'Pole dance', 'Popping', 'Salsa',
                        'Tango', 'Tap', 'Vogue',
                        ]"
            />

            <x-skills-group 
            :inputContent="['model' => 'skills.musica']"
            :label="'musica'"
            :noHace="'No practica musica'"
            :skillsGroup="[
                        'Voz', 'Guitarra acustica', 'Guitarra electrica', 'Bajo',
                        'Bateria', 'Cajon', 'Piano', 'Organo',
                        'Contrabajo', 'Violin', 'Cello', 'Trompeta',
                        'Flauta', 'Flauta traversa', 'Tuba', 'Acordeon',
                        'Saxo', 'Armonica', 'Ukelele', 'Bongo',
                        'Güiro', 'Castañuelas', 'Arpa',
                        ]"
            />

            <div class="flex justify-center border-2 lg:grid-cols-3 lg:grid border-saigon-black">
                <div class="hidden lg:block"></div>
                <div class="hidden lg:block"></div>
                <div class="w-full pb-8 lg:px-0 lg:pb-0">
                    <button
                    x-on:click="$dispatch('skills-flag'); open = false"
                    type="button"
                    class="w-full p-4 py-4 mt-3 text-black transition-colors border-2 border-white lg:py-2 lg:max-w-xs lg:mt-2 saigon-bg-white lg:text-sm lg:block lg:w-full h-fit hover:bg-transparent hover:text-white">Listo</button>
                </div>
            </div>
        </div>
    </div>
</div>