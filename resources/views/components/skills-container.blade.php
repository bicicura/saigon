<div x-transition.origin.center.right.duration.400ms x-show="open" class="absolute top-0 left-0 w-full h-full bg-saigon-black lg:pt-12 lg:mb-12">
    <div class="h-full" x-data="{ 
        deportes: [
            'Futbol', 'Basket', 'Tenis', 'Hockey', 'Voley', 'Handball', 'Golf', 'Rugby', 'Boxeo', 'Sumo', 
            'Natacion', 'Rollers', 'Patin artistico', 'Patin sobre hielo', 'Skate', 'Longboard', 'Surf', 'Kitesurf', 'Wakeboard', 
            'Snowboard', 'Esqui', 'Equitacion', 'Polo', 'Gimnasia', 'Running', 'Ciclismo', 'Bmx', 'Yoga',
            'Pilates', 'Crossfit', 'Funcional', 'Acrobacia en piso', 'Remo', 'Parkour', 'Esgrima', 'Artes marciales', 'Tiro con arco' 
            ],
            bailes: [
            'Danza', 'Danza aerea', 'Baile profesional', 'Breakdance',
            'Flamenco', 'Hip-hop', 'House', 'Jazz',
            'Locking', 'Pole dance', 'Popping', 'Salsa',
            'Tango', 'Tap', 'Vogue',
            ],
            instrumentos: [
            'Voz', 'Guitarra acustica', 'Guitarra electrica', 'Bajo',
            'Bateria', 'Cajon', 'Piano', 'Organo',
            'Contrabajo', 'Violin', 'Cello', 'Trompeta',
            'Flauta', 'Flauta traversa', 'Tuba', 'Acordeon',
            'Saxo', 'Armonica', 'Ukelele', 'Bongo',
            'Guiro', 'Castañuelas', 'Arpa', 'Bongo',
            ]
        
        }"
            >
        <div class="flex flex-col justify-between h-full lg:w-9/12" style="line-height: 1.36rem;">
            <div class="flex gap-8">
                <div class="w-40">
                    <p>DEPORTES</p>
                </div>
                <div class="grid w-full grid-cols-4 gap-x-8">
                    <div class="flex items-center col-span-4 gap-2">
                        <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" value="deporte" type="checkbox" name="" id="deporte">
                        <label for="deporte" class="uppercase" >No hace deporte</label>
                    </div>
                    <template x-for="deporte in deportes">
                        <div class="flex items-center gap-2">
                            <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" :value="deporte" type="checkbox" name="" :id="deporte">
                            <label :for="deporte" class="uppercase" x-text="deporte"></label>
                        </div>   
                    </template>
                </div>
            </div>
            <div class="flex gap-8">
                <div class="w-40">
                    <p>BAILES</p>
                </div>
                <div class="grid w-full grid-cols-4 gap-x-8">
                    <div class="flex items-center col-span-4 gap-2">
                        <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" value="deporte" type="checkbox" name="" id="deporte">
                        <label for="deporte" class="uppercase" >No Baila</label>
                    </div>
                    <template x-for="baile in bailes">
                        <div class="flex items-center gap-2">
                            <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" :value="baile" type="checkbox" name="" :id="baile">
                            <label :for="baile" class="uppercase" x-text="baile"></label>
                        </div>   
                    </template>
                </div>
            </div>
            <div class="flex gap-8">
                <div class="w-40">
                    <p>MUSICA</p>
                </div>
                <div class="grid w-full grid-cols-4 gap-x-8">
                    <div class="flex items-center col-span-4 gap-2">
                        <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" value="deporte" type="checkbox" name="" id="deporte">
                        <label for="deporte" class="uppercase" >NO PRACTICA MUSICA</label>
                    </div>
                    <template x-for="instrumento in instrumentos">
                        <div class="flex items-center gap-2">
                            <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" :value="instrumento" type="checkbox" name="" :id="instrumento">
                            <label :for="instrumento" class="uppercase" x-text="instrumento"></label>
                        </div>   
                    </template>
                </div>
            </div>
            <button
            x-on:click="open = false"
            type="button"
            class="w-full max-w-xs p-4 py-2 mt-2 ml-auto text-black transition-colors border-2 border-white lg:mt-2 saigon-bg-white lg:text-sm lg:block lg:w-full h-fit hover:bg-transparent hover:text-white">Listo</button>
        </div>
    </div>
</div>