<div class="max-w-3xl px-4 py-6 mx-auto sm:px-6 lg:px-8">
    <form wire:submit.prevent="{{$type}}">
        <div>
            <x-input.text-input :inputContent="['label' => 'Nombre', 'model' => 'nombre', 'placeholder' => 'Nombre']"/>
            
        </div>

        <div class="pt-5 mt-5 border-t border-gray-200">
            <div class="flex items-center justify-end space-x-3">
                <div wire:loading wire:target="{{ $type }}">
                    <div class="la-ball-clip-rotate">
                        <div></div>
                    </div>
                </div>

                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('dashboard.productoras', app()->getLocale()) }}" class="px-4 py-2 text-sm font-bold leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
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

    @if ($type === "update")
        <div class="mt-8 border-t border-gray-200">
            <p class="mt-8 mb-4">Listado de Castings de la productora: <span class="font-bold">{{$nombre}}</span> ({{$castings->count()}})</p>
            <ul class="flex flex-col list-disc list-inside divide-y-2 justify-baseline w-max">
                @if ($castings->count() === 0)
                    <p class="italic">Ups! No hay Castings cargados para esta Productora.</p>
                @else
                    @foreach ($castings as $casting)
                    <li class="py-2 hover:underline">
                        <a href="{{ route('castings.edit', [app()->getLocale(), $casting->id]) }}">
                            <span>{{ $casting->nombre }}</span>
                            —
                            <span>{{ $casting->director }}</span>
                        </a>
                    </li>
                    @endforeach
                @endif
            </ul>
        </div>
    @endif    
</div>