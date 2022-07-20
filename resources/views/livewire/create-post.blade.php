<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <form wire:submit.prevent="{{$type}}">
        <div>

            @if ($type === 'update' && ($seccion === 'Comerciales' || $seccion === 'Mini'))
                <x-input.checkbox :inputContent="['label' => 'Reel', 'model' => 'reel']" />
                @if ($reel)
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-5">
                        <label for="newReelVideo" class="block text-sm font-semibold leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            Reel Video
                        </label>
                    
                        <div class="mt-1 sm:mt-0 sm:col-span-2" x-data="{ focused: false }">
                            <div class="flex items-center max-w-lg gap-4 rounded-md">
                                @if ($reelActual && !$newReelVideo)
                                    <div class="overflow-hidden rounded-lg">
                                        <video class="w-28 aspect-video" class="object-cover object-center w-full h-full" src="/reel/{{$reelActual}}">
                                        <input type="hidden" wire:model="reelActual">
                                    </div>
                                @elseif ($newReelVideo)
                                <div class="overflow-hidden rounded-lg">
                                    <video class="w-28 aspect-video" class="object-cover object-center w-full h-full" src="{{$newReelVideo->temporaryUrl()}}">
                                </div>
                                @endif
                                <span class="rounded-md shadow-sm h-fit">
                                    <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused} " for="newReelVideo" class="px-3 py-2 text-sm font-semibold leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
                                        Cambiar
                                    </label>
                                    <input @focus="focused = true" @blur="focused = false" type="file" class="sr-only" id="newReelVideo" wire:model="newReelVideo">
                                    @error('newReelVideo') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </span>
                                <div wire:loading wire:target="newReelVideo">
                                    <div class="ml-3 la-ball-clip-rotate">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                    
                            @error('newReelVideo') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                        </div>
                    </div>
                @endif
            @endif

            <x-input.select :inputContent="['label' => 'Sección', 'model' => 'seccion', 'placeholder' => 'Seleccione una sección de la web', 'opciones' => [['value' => 'Comerciales', 'text' => 'Comerciales'], ['value' => 'Fotografía', 'text' => 'Fotografía'], ['value' => 'Mini', 'text' => 'Mini'], ['value' => 'Ficción', 'text' => 'Ficción']]]"/>

            <x-input.text-input :inputContent="['label' => 'Nombre', 'model' => 'nombre', 'placeholder' => 'Nombre']"/>

            {{-- <x-input.text-input :inputContent="['label' => 'Productora', 'model' => 'productora', 'placeholder' => 'Productora']"/> --}}

            <x-input.select-productora :inputContent="['label' => 'Productora', 'model' => 'productora_id', 'placeholder' => 'Seleccione una productora']" :productoras="$productoras" />

            <x-input.text-input :inputContent="['label' => 'Director', 'model' => 'director', 'placeholder' => 'Director/es']"/>

            @if ($seccion !== 'Fotografía' && $seccion !== 'Ficción')
            <x-input.select :inputContent="['label' => 'Categoría', 'model' => 'categoria', 'placeholder' => 'Seleccione una categoría', 'opciones' => [['value' => 'Small', 'text' => 'Small'], ['value' => 'Medium', 'text' => 'Medium'], ['value' => 'Large', 'text' => 'Large']]]"/>

            <x-input.text-input :inputContent="['label' => 'Video ID', 'model' => 'video_url', 'placeholder' => '694544533']"/>
            @endif
                

            @if (($seccion === 'Fotografía' || $seccion === 'Ficción') && $type === 'save')
                <x-input.filepond wire:model="fotografias" id="fotografias" :label="'Fotografías'" multiple/>
            @elseif (($seccion === 'Fotografía' || $seccion === 'Ficción') && $type === 'update')
            
            <x-input.input-w-edit-btn :label="'Fotografías'" :id="$casting->id"  />
            @else
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="photo" class="block text-sm font-semibold leading-5 text-gray-700">
                    Thumbnail
                </label>
                <div class="flex gap-8 mt-2 sm:mt-0 sm:col-span-2" x-data="{ focused: false }">
                    <div class="flex flex-col justify-center gap-4">
                        @if ($type === "update")
                        <div class="flex items-center gap-2">
                            <input id="mantenerActual" wire:model="thumbnailProvider" class="ring-0 ring-offset-0 focus:ring-0" type="radio" value="">
                            <label class="text-base cursor-pointer" for="mantenerActual">Mantener actual</label>
                        </div>
                        @endif
                        <div class="flex items-center justify-start gap-2">
                            <input id="vimeoThumbnail" wire:model="thumbnailProvider" class="ring-0 ring-offset-0 focus:ring-0" type="radio" value="vimeo">
                            <label class="text-base cursor-pointer" for="vimeoThumbnail">Usar Vimeo/Youtube</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <input id="customThumbnail" wire:model="thumbnailProvider" class="ring-0 ring-offset-0 focus:ring-0" type="radio" value="custom">
                            <label class="text-base cursor-pointer" for="customThumbnail">Subir uno propio</label>
                        </div>
                    </div>
                    
                        <div class="flex items-center">
                            <span class="w-20 h-20 overflow-hidden bg-gray-100 rounded-xl">
                                @if ($newThumbnail)
                                    <img class="object-cover object-center w-full h-full" src="{{$newThumbnail->temporaryUrl()}}">
                                @elseif ($avatarActual)
                                    <img class="object-cover object-center w-full h-full" src="/thumbnails/{{$avatarActual}}">
                                    <input type="hidden" wire:model="avatarActual">
                                @else
                                    <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                @endif
                            </span>
                        @if ($thumbnailProvider === "custom")
                            <span class="ml-5 rounded-md shadow-sm">
                                <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused} " for="newThumbnail" class="px-3 py-2 text-sm font-semibold leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
                                    Cambiar
                                </label>
                                <input @focus="focused = true" @blur="focused = false" type="file" class="sr-only" id="newThumbnail" wire:model="newThumbnail">
                                @error('newThumbnail') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                            </span>
                            <div wire:loading wire:target="newThumbnail">
                                <div class="ml-3 la-ball-clip-rotate">
                                    <div></div>
                                </div>
                            </div>
                        @endif
                        </div>   
                </div>
            </div>
            @endif

        </div>

        <div class="pt-5 mt-5 border-t border-gray-200">
            <div class="flex items-center justify-end space-x-3">
                <div wire:loading wire:target="{{ $type }}">
                    <div class="la-ball-clip-rotate">
                        <div></div>
                    </div>
                </div>
                
                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('castings', app()->getLocale()) }}" type="button" class="px-4 py-2 text-sm font-bold leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                        Cancelar
                    </a>
                </span>

                <span class="inline-flex ml-3 rounded-md shadow-sm">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-bold leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                        Guardar
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>