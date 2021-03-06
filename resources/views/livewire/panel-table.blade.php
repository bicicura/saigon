<section class="pb-20 space-y-10" x-data=" { deleteModal: @entangle('deleteModal'), perfilNombre: '', perfilId: @entangle('perfilId') } ">

    {{-- {{dd($castings)}} --}}

    <div class="flex justify-between max-w-xl gap-4 mx-auto min-w-lg">
        {{-- <a href="{{ route('castings.reel', app()->getLocale()) }}" class="inline-flex items-center justify-center gap-1 px-4 py-2 text-sm font-bold leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
            <div class="w-5 h-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-full h-full fill-white hover:fill-indigo-900"xml:space="preserve"><path fill="none" d="M0 0h24v24H0V0z"/><path d="m14.1 9 .9.9L5.9 19H5v-.9L14.1 9m3.6-6c-.3 0-.5.1-.7.3l-1.8 1.8L19 8.9 20.7 7c.4-.4.4-1 0-1.4l-2.3-2.3c-.2-.2-.5-.3-.7-.3zm-3.6 3.2L3 17.3V21h3.8l11-11.1-3.7-3.7z"/></svg>
            </div>
            <span>Reel</span>
        </a> --}}
        <div class="relative w-full">
            <div class="absolute top-0 bottom-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 fill-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule=""
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule=""></path>
                </svg>
            </div>
            <input wire:model="search"
                id="search"
                class="block w-full py-2 pl-12 pr-3 leading-5 placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm"
                placeholder="Buscar por nombre..." type="search">
            </div>
    </div>

    <div class="relative max-w-2xl mx-auto min-w-xl">
        @if (!$reel)
            <div class="absolute -top-6 -right-8" title="crear nuevo casting">
                <a href="{{ route('castings.create', app()->getLocale()) }}">
                    <button type="button" class="flex items-center justify-center w-12 h-12 mb-2 mr-2 text-white transition duration-150 ease-in-out bg-green-700 rounded-full hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 hover:-translate-y-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 24 24"><path fill="#F3F4F6" d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                    </button>
                </a>
            </div>
        @endif
        <table class="w-full mx-auto bg-gray-200 divide-y rounded-xl h-fit">
            <thead>
              <tr>
                <th class="w-4 pl-6 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                      </svg>
                </th>
                <th class="px-6 py-3 text-left w-max">
                    <div class="flex items-center">
                        <button class="text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">NOMBRE</button>
                    </div>
                </th>
                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">Secci??n</th>
                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">Productora</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($castings as $casting)
                <tr class="">
                    <td class="flex items-start justify-center py-8 pl-6">
                        <input wire:click="sticky({{$casting->id}})" {{ $casting->sticky? 'checked' : '' }} type="checkbox" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out rounded-full form-checkbox">
                    </td>
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center gap-2">
                            <div class="">
                                <div class="text-sm font-semibold leading-5 text-gray-900 w-max">
                                    {{$casting->nombre}}
                                </div>
                            </div>
                        </div> 
                    </td>
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        @if ($casting->seccion == 'Ficci??n')
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full w-max" style="background: #dbd9f5; color:#242247">
                        @elseif($casting->seccion == 'Comerciales')
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full w-max" style="background: #E6F5ED; color:#304634">
                        @elseif($casting->seccion == 'Fotograf??a')
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full w-max" style="background: #f2def5; color:#463044">
                        @elseif($casting->seccion == 'Mini')
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full w-max" style="background: #f1e2dd; color:#463530">
                        @elseif($casting->seccion == 'Street Agency')
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full w-max" style="background: #ddddf1; color:#323046">
                        @endif
                            {{$casting->seccion}}
                        </span>
                    </td>
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        <span class="inline-flex text-xs font-semibold leading-5 text-gray-500 rounded-full line-clamp-1">
                            {{$casting->getProductora->nombre}}
                        </span>
                    </td>
                    <td class="flex items-center justify-end gap-6 px-6 py-6">
                        <a href="{{ route('castings.edit', [app()->getLocale(), $casting->id]) }}" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-indigo-600 hover:fill-indigo-900" width="24" height="24" xml:space="preserve"><path fill="none" d="M0 0h24v24H0V0z"/><path d="m14.1 9 .9.9L5.9 19H5v-.9L14.1 9m3.6-6c-.3 0-.5.1-.7.3l-1.8 1.8L19 8.9 20.7 7c.4-.4.4-1 0-1.4l-2.3-2.3c-.2-.2-.5-.3-.7-.3zm-3.6 3.2L3 17.3V21h3.8l11-11.1-3.7-3.7z"/></svg>
                        </a>
                        <div class="cursor-pointer" @click="deleteModal = true; perfilId = {{$casting->id}}, perfilNombre = '{{$casting->nombre}}'" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-600 hover:fill-red-900" height="24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
            </table>
            <div class="mt-8">
                {{ $castings->onEachSide(0)->links() }}
            </div>

            <x-delete-modal />
    </div>
</section>
