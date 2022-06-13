<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <form wire:submit.prevent="{{$type}}">
        <div class="">

            <x-input.select :inputContent="['label' => 'Sección', 'model' => 'seccion', 'placeholder' => 'Seleccione una sección de la web', 'opciones' => [['value' => 'Comerciales', 'text' => 'Comerciales'], ['value' => 'Fotografía', 'text' => 'Castings Fotografía'], ['value' => 'Mini', 'text' => 'Mini'], ['value' => 'Ficción', 'text' => 'Ficción'], ['value' => 'Street Agency', 'text' => 'Street Agency']]]"/>

            <x-input.text-input :inputContent="['label' => 'Nombre', 'model' => 'nombre', 'placeholder' => 'Nombre']"/>

            <x-input.text-input :inputContent="['label' => 'Productora', 'model' => 'productora', 'placeholder' => 'Productora']"/>

            <x-input.text-input :inputContent="['label' => 'Director', 'model' => 'director', 'placeholder' => 'Director/es']"/>

            <x-input.select :inputContent="['label' => 'Categoría', 'model' => 'categoria', 'placeholder' => 'Seleccione una categoría', 'opciones' => [['value' => 's', 'text' => 'Small'], ['value' => 'm', 'text' => 'Medium'], ['value' => 'l', 'text' => 'Large']]]"/>

            @if ($seccion !== 'Castings Fotografía')
                <x-input.text-input :inputContent="['label' => 'Vimeo URL', 'model' => 'video_url', 'placeholder' => 'https://player.vimeo.com/video/694544533?h=42c9936f17']"/>
            @endif
                

            @if ($seccion === 'Fotografía' && $type === 'save')
            <x-input.filepond wire:model="fotografias" id="fotografias" :label="'Fotografías'" data-preview="true" multiple/>
            @elseif ($seccion === 'Fotografía' && $type === 'update')
            
            <x-input.input-w-edit-btn :label="'Fotografías'" :id="$casting->id"  />
            @else
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="photo" class="block text-sm font-semibold leading-5 text-gray-700">
                    Thumbnail
                </label>
                <div class="mt-2 sm:mt-0 sm:col-span-2" x-data="{ focused: false }">
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

                        <span class="ml-5 rounded-md shadow-sm">
                            <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused} " for="newThumbnail" class="px-3 py-2 text-sm font-semibold leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
                                Cambiar
                            </label>
                            <input @focus="focused = true" @blur="focused = false" type="file" class="sr-only" id="newThumbnail" wire:model="newThumbnail">
                            @error('newThumbnail') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                        </span>
                    </div>
                </div>
            </div>
            @endif

        </div>

        <div class="pt-5 mt-5 border-t border-gray-200">
            <div class="flex items-center justify-end space-x-3">
                <span 
                x-data=" { open: false } "
                x-init="
                @this.on('notify-saved', () => {
                    setTimeout(() => { open = false }, 3000)
                    open = true;
                })"
                x-show="open"
                x-transition:enter.duration.300ms
                x-transition:leave.duration.200ms
                style="display: none"
                class="text-gray-500">
                Saved!</span>
                
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button" class="px-4 py-2 text-sm font-bold leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                        Cancelar
                    </button>
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