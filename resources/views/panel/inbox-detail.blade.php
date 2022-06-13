<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Perfil de ') }} {{$interesado->nombre}}
        </h2>
    </x-slot>

    <section class="pt-10 pb-20 space-y-10">
        
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="/dashboard/inbox" class="flex items-center gap-1.5 text-gray-500 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5 fill-gray-500"><path d="M24 40 8 24 24 8 26.1 10.1 13.7 22.5H40V25.5H13.7L26.1 37.9Z"/></svg>
                <span>Volver</span>
            </a>
        </div>

        <div class="w-full max-w-4xl mx-auto space-y-12 bg-white border border-gray-200 sm:p-6 lg:p-8 rounded-xl h-fit">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold leading-7 text-black">Información del Aplicante</h1>
                    <h3 class="tracking-tight text-gray-500">Posted {{$interesado->created_at->diffForhumans()}}.</h3>
                </div>
                <a href="{{$interesado->link}}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-white transition-all bg-indigo-500 rounded-lg hover:bg-indigo-700 hover:shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6 h-6 fill-white"><path d="M22.5 34H14Q9.75 34 6.875 31.125Q4 28.25 4 24Q4 19.75 6.875 16.875Q9.75 14 14 14H22.5V17H14Q11 17 9 19Q7 21 7 24Q7 27 9 29Q11 31 14 31H22.5ZM16.25 25.5V22.5H31.75V25.5ZM25.5 34V31H34Q37 31 39 29Q41 27 41 24Q41 21 39 19Q37 17 34 17H25.5V14H34Q38.25 14 41.125 16.875Q44 19.75 44 24Q44 28.25 41.125 31.125Q38.25 34 34 34Z"/></svg>
                    Link
                </a>
            </div>
            <div class="grid grid-cols-2 gap-12">
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Nombre completo</h3>
                    <p class="text-lg">{{$interesado->nombre}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Email</h3>
                    <p class="text-lg">{{$interesado->email}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Celular</h3>
                    <p class="text-lg">{{$interesado->celular}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Nacionalidad</h3>
                    <p class="text-lg">{{$interesado->nacionalidad}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Dni</h3>
                    <p class="text-lg">{{$interesado->dni}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Cuit</h3>
                    <p class="text-lg">{{$interesado->cuit}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Sexo</h3>
                    <p class="text-lg">{{$interesado->sexo}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Fecha de nacimiento</h3>
                    <p class="text-lg">{{$interesado->date_of_birth}} ({{$interesado->getAge()}}a)</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Altura</h3>
                    <p class="text-lg">{{$interesado->altura}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Remera</h3>
                    <p class="text-lg">{{$interesado->remera}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Pantalón</h3>
                    <p class="text-lg">{{$interesado->pantalon}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Calzado</h3>
                    <p class="text-lg">{{$interesado->calzado}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Skills</h3>
                    <p class="text-lg">{{$interesado->skills}}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Link</h3>
                    <p class="text-lg">{{$interesado->link}}</p>
                </div>
                <div class="col-span-2">
                    <h3 class="mb-3 text-sm font-bold leading-5 tracking-tight text-left text-gray-500">Archivos adjuntos</h3>
                    <div class="grid grid-cols-1 border border-gray-300 divide-y rounded-lg">
                        <div class="p-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6 h-6" ><path d="M23 44Q18.45 44 15.225 40.875Q12 37.75 12 33.2V11.7Q12 8.5 14.275 6.25Q16.55 4 19.75 4Q23 4 25.25 6.25Q27.5 8.5 27.5 11.75V31.45Q27.5 33.35 26.2 34.675Q24.9 36 23 36Q21.1 36 19.8 34.575Q18.5 33.15 18.5 31.2V11.6H20.5V31.35Q20.5 32.45 21.225 33.225Q21.95 34 23 34Q24.05 34 24.775 33.25Q25.5 32.5 25.5 31.45V11.7Q25.5 9.3 23.825 7.65Q22.15 6 19.75 6Q17.35 6 15.675 7.65Q14 9.3 14 11.7V33.3Q14 36.95 16.65 39.475Q19.3 42 23 42Q26.75 42 29.375 39.45Q32 36.9 32 33.2V11.6H34V33.15Q34 37.7 30.775 40.85Q27.55 44 23 44Z"/></svg>
                                    <p>Fotografía de cara</p>
                                </div>
                                @livewire('export-button', ['file' => $interesado->cara])
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6 h-6" ><path d="M23 44Q18.45 44 15.225 40.875Q12 37.75 12 33.2V11.7Q12 8.5 14.275 6.25Q16.55 4 19.75 4Q23 4 25.25 6.25Q27.5 8.5 27.5 11.75V31.45Q27.5 33.35 26.2 34.675Q24.9 36 23 36Q21.1 36 19.8 34.575Q18.5 33.15 18.5 31.2V11.6H20.5V31.35Q20.5 32.45 21.225 33.225Q21.95 34 23 34Q24.05 34 24.775 33.25Q25.5 32.5 25.5 31.45V11.7Q25.5 9.3 23.825 7.65Q22.15 6 19.75 6Q17.35 6 15.675 7.65Q14 9.3 14 11.7V33.3Q14 36.95 16.65 39.475Q19.3 42 23 42Q26.75 42 29.375 39.45Q32 36.9 32 33.2V11.6H34V33.15Q34 37.7 30.775 40.85Q27.55 44 23 44Z"/></svg>
                                    <p>Fotografía de cuerpo</p>
                                </div>
                                @livewire('export-button', ['file' => $interesado->cuerpo])
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-4xl mx-auto space-y-6 bg-white border border-gray-200 sm:p-6 lg:p-8 rounded-xl">
            <h3 class="text-2xl font-bold leading-7 text-black">Vista previa de imágenes</h3>
            <div class="flex justify-between">
                <div class="w-96">
                    <img class="object-cover object-center w-full h-full max-w-full rounded-lg" src="/perfiles/{{$interesado->cara}}" alt="">
                </div>
                <div class="w-96">
                    <img class="object-cover object-center w-full h-full max-w-full rounded-lg" src="/perfiles/{{$interesado->cuerpo}}" alt="">
                </div>
            </div>
        </div>
    </section>
    
</x-app-layout>
