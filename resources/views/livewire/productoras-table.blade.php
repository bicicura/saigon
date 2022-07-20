<section class="pb-20 space-y-10" x-data=" { deleteModal: @entangle('deleteModal'), perfilNombre: '', perfilId: @entangle('perfilId') } ">
    <div class="max-w-lg mx-auto min-w-lg">
        <div class="relative">
            <div class="absolute top-0 bottom-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model="search"
                id="search"
                class="block w-full py-2 pl-12 pr-3 leading-5 placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm"
                placeholder="Buscar por nombre..." type="search">
        </div>
    </div>

    <div class="relative max-w-lg mx-auto min-w-lg">
        <div class="absolute -top-6 -right-8" title="crear nueva Productora">
            <a href="{{ route('dashboard.productoras-create', app()->getLocale()) }}">
                <button type="button" class="flex items-center justify-center w-12 h-12 mb-2 mr-2 text-white transition duration-150 ease-in-out bg-green-700 rounded-full hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 hover:-translate-y-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 24 24"><path fill="#F3F4F6" d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                </button>
            </a>
        </div>
        <table class="w-full mx-auto bg-gray-200 divide-y rounded-xl h-fit">
            <thead>
              <tr>
                <th class="px-6 py-3 text-left w-max">
                    <div class="flex items-center">
                        <button class="text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">NOMBRE</button>
                    </div>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($productoras as $productora)
                <tr class="hover:shadow-md" >
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="">
                                <div class="text-sm font-semibold leading-5 text-gray-900 w-max">
                                    {{$productora->nombre}}
                                </div>
                            </div>
                        </div> 
                    </td>
                    <td class="flex items-center justify-end gap-6 px-6 py-6">
                        <a href="{{ route('dashboard.productoras-edit', [app()->getLocale(), $productora->id]) }}" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-indigo-600 hover:fill-indigo-900" width="24" height="24" xml:space="preserve"><path fill="none" d="M0 0h24v24H0V0z"/><path d="m14.1 9 .9.9L5.9 19H5v-.9L14.1 9m3.6-6c-.3 0-.5.1-.7.3l-1.8 1.8L19 8.9 20.7 7c.4-.4.4-1 0-1.4l-2.3-2.3c-.2-.2-.5-.3-.7-.3zm-3.6 3.2L3 17.3V21h3.8l11-11.1-3.7-3.7z"/></svg>
                        </a>
                        <div class="cursor-pointer" @click="deleteModal = true; perfilId = {{$productora->id}}, perfilNombre = '{{$productora->nombre}}'" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-600 hover:fill-red-900" height="24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
            </table>
            <div class="mt-8">
                {{ $productoras->onEachSide(0)->links() }}
            </div>

            <x-delete-modal />
    </div>
</section>