<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <form wire:submit.prevent="{{$type}}">
        <div>
            <x-input.text-input :inputContent="['label' => 'Nombre', 'model' => 'nombre', 'placeholder' => 'Nombre']"/>

            <x-input.text-input x-mask="99/99/9999" :inputContent="['label' => 'Fecha de Nacimiento', 'model' => 'date_of_birth', 'placeholder' => 'AAAA/MM/DD']"/>
                
            <x-input.text-input :inputContent="['label' => 'Nacionalidad', 'model' => 'nacionalidad', 'placeholder' => 'Nacionalidad']"/>

            <x-input.text-input :inputContent="['label' => 'Altura', 'model' => 'altura', 'placeholder' => 'Altura']"/>

            <x-input.text-input :inputContent="['label' => 'Imdb', 'model' => 'imdb', 'placeholder' => 'Imdb']"/>

            <x-input.text-input :inputContent="['label' => 'Instagram', 'model' => 'ig', 'placeholder' => 'Instagram']"/>

            <x-input.text-input :inputContent="['label' => 'C.V.', 'model' => 'cv', 'placeholder' => 'C.V.']"/>

            <x-input.text-input :inputContent="['label' => 'Videos', 'model' => 'videos', 'placeholder' => 'videos']"/>

            <x-input.text-input :inputContent="['label' => 'Bio', 'model' => 'bio', 'placeholder' => 'Bio']"/>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="photo" class="block text-sm font-semibold leading-5 text-gray-700">
                    Avatar
                </label>
                <div class="mt-2 sm:mt-0 sm:col-span-2" x-data="{ focused: false }">
                    <div class="flex items-center">
                        <span class="w-16 h-16 overflow-hidden bg-gray-100 rounded-full">
                            @if ($newThumbnail)
                                <img class="object-cover object-center w-full h-full" src="{{$newThumbnail->temporaryUrl()}}">
                            @elseif ($avatarActual)
                                <img class="object-cover object-center w-full h-full" src="/actors/{{$avatarActual}}">
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

            @if ($type === 'create')
            <x-input.filepond wire:model="book" id="book" :label="'Book'" multiple/>
            @else
            <x-input.input-w-edit-btn :label="'Book'" :id="$actor->id"  />
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
                    <a href="{{ route('dashboard.management', app()->getLocale()) }}" class="px-4 py-2 text-sm font-bold leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
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