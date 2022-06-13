<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex mt-12">
        <div class="block text-sm font-semibold leading-5 text-gray-700">
            Modificar orden
        </div>
        @if ($imgs->isEmpty())
        <div class="flex items-center justify-center mx-auto w-max">
            <p class="p-2 text-gray-600 bg-white border-2 border-gray-300 rounded-xl"><span>📷❌</span> ¡Aún no hay imágenes cargadas para este Casting!</p>
        </div>
        @else
        <div wire:sortable="updateFotografiasOrder" class="grid items-center grid-cols-3 gap-12 p-6 mx-auto bg-white shadow-md w-max rounded-xl">
             @foreach ($imgs as $img)
                    <div class="flex gap-4" wire:sortable.item="{{$img->id}}" wire:key="task-{{$img->id}}">
                        <div class="relative">
                            <img wire:sortable.handle class="object-cover w-24 h-24 cursor-grab rounded-2xl drop-shadow-xl" src="/{{$directorio}}/{{$img->img}}" alt="">
                            <button class="absolute flex items-center justify-center w-8 h-8 bg-red-500 rounded-full -top-4 -right-4" wire:click="deleteFotografia({{$img->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="rotate-45" width="13" height="14" viewBox="0 0 24 24"><path fill="#fff" d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                            </button> 
                        </div>
                    </div>
                    @endforeach
                </div>
        @endif
            
    </div>
    <div>
        <x-input.filepond wire:model="uploadedImg" id="uploadedImg" :label="'Subir nuevas imágenes'" multiple/>
    </div>
    <div class="mt-6 ml-auto rounded-md shadow-sm w-max">
        <div wire:click="saveImgs" class="px-3 py-2 text-sm font-semibold leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
            Guardar
        </div>
    </div>
</div>
