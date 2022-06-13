<section class="pb-20 space-y-10" x-data=" { deleteModal: @entangle('deleteModal'), perfilNombre: '', perfilId: @entangle('perfilId') } ">
    <div class="max-w-xl mx-auto min-w-lg">
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

    <div class="relative max-w-xl mx-auto min-w-xl">
        <div class="absolute -top-6 -right-8" title="crear nuevo actor">
            <a href="{{ route('dashboard.management-create', app()->getLocale()) }}">
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
                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">NACIONALIDAD</th>
                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">INSTAGRAM</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($actors as $actor)
                <tr class="hover:shadow-md" >
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="">
                                <div class="text-sm font-semibold leading-5 text-gray-900 w-max">
                                    {{$actor->nombre}}
                                </div>
                            </div>
                        </div> 
                    </td>
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900 w-max">
                            {{$actor->nacionalidad}}
                        </div>
                    </td>
                    <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900 w-max">
                            {{$actor->ig}}
                        </div>
                    </td>
                    <td class="flex items-center justify-end gap-6 px-6 py-6">
                        <a href="{{ route('dashboard.management-edit', [app()->getLocale(), $actor->id]) }}" title="Visualizar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6 h-6 fill-indigo-600 hover:fill-indigo-900"><path d="M24 31.5Q27.55 31.5 30.025 29.025Q32.5 26.55 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q20.45 14.5 17.975 16.975Q15.5 19.45 15.5 23Q15.5 26.55 17.975 29.025Q20.45 31.5 24 31.5ZM24 28.6Q21.65 28.6 20.025 26.975Q18.4 25.35 18.4 23Q18.4 20.65 20.025 19.025Q21.65 17.4 24 17.4Q26.35 17.4 27.975 19.025Q29.6 20.65 29.6 23Q29.6 25.35 27.975 26.975Q26.35 28.6 24 28.6ZM24 38Q16.7 38 10.8 33.85Q4.9 29.7 2 23Q4.9 16.3 10.8 12.15Q16.7 8 24 8Q31.3 8 37.2 12.15Q43.1 16.3 46 23Q43.1 29.7 37.2 33.85Q31.3 38 24 38ZM24 23Q24 23 24 23Q24 23 24 23Q24 23 24 23Q24 23 24 23Q24 23 24 23Q24 23 24 23Q24 23 24 23Q24 23 24 23ZM24 35Q30.05 35 35.125 31.725Q40.2 28.45 42.85 23Q40.2 17.55 35.125 14.275Q30.05 11 24 11Q17.95 11 12.875 14.275Q7.8 17.55 5.1 23Q7.8 28.45 12.875 31.725Q17.95 35 24 35Z"/></svg>
                        </a>
                        <div class="cursor-pointer" @click="deleteModal = true; perfilId = {{$actor->id}}, perfilNombre = '{{$actor->nombre}}'" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-600 hover:fill-red-900" height="24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
            </table>
            <div class="mt-8">
                {{ $actors->links() }}
            </div>

            <x-delete-modal />
    </div>
</section>