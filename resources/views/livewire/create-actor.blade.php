<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <form wire:submit.prevent="{{$type}}">
        <div>
            <x-input.text-input :inputContent="['label' => 'Nombre', 'model' => 'nombre', 'placeholder' => 'Nombre']"/>

            <x-input.text-input x-mask="99/99/9999" :inputContent="['label' => 'Fecha de Nacimiento', 'model' => 'date_of_birth', 'placeholder' => 'AAAA/MM/DD']"/>
                
            <x-input.text-input :inputContent="['label' => 'Nacionalidad', 'model' => 'nacionalidad', 'placeholder' => 'Nacionalidad']"/>

            <x-input.text-input :inputContent="['label' => 'Altura', 'model' => 'altura', 'placeholder' => 'Altura']"/>

            {{-- <x-input.text-input :inputContent="['label' => 'Imdb', 'model' => 'imdb', 'placeholder' => 'Imdb']"/> --}}

            <x-input.text-input :inputContent="['label' => 'Instagram', 'model' => 'ig', 'placeholder' => 'Instagram']"/>

            {{-- <x-input.text-input :inputContent="['label' => 'C.V.', 'model' => 'cv', 'placeholder' => 'C.V.']"/> --}}

            {{-- <x-input.text-input :inputContent="['label' => 'Videos', 'model' => 'videos', 'placeholder' => 'videos']"/> --}}

            <x-input.text-area :inputContent="['label' => 'Bio', 'model' => 'bio', 'placeholder' => 'Bio']"/>

            @if ($type === 'create')
            <x-input.filepond wire:model="book" id="book" :label="'Fotografías'" multiple/>
            @else
            <x-input.input-w-edit-btn :label="'Book'" :id="$actor->id"  />
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