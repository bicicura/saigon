<div x-transition.origin.center.right.duration.400ms x-show="open" class="absolute top-0 left-0 w-full h-full bg-saigon-black lg:pt-12 lg:mb-12">
    <div class="h-full">
        <div class="flex flex-col justify-between h-full lg:w-9/12" style="line-height: 1.36rem;">
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

            <div class="grid grid-cols-3 border-2 border-saigon-black">
                <div></div>
                <div></div>
                <div>
                    <button
                    x-on:click="open = false"
                    type="button"
                    class="w-full max-w-xs p-4 py-2 mt-2 text-black transition-colors border-2 border-white lg:mt-2 saigon-bg-white lg:text-sm lg:block lg:w-full h-fit hover:bg-transparent hover:text-white">Listo</button>
                </div>
            </div>
        </div>
    </div>
</div>