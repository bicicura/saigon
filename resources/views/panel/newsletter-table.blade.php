

<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Listado de Suscriptores') }} ({{$suscriptores->count()}})
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <section class="pb-20 space-y-10">
        
            <div class="relative max-w-lg mx-auto min-w-lg">
                <table class="w-full mx-auto bg-gray-200 divide-y rounded-xl h-fit">
                    <thead>
                      <tr>
                        <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase">Registro</th>
                      </tr>
                      
                    </thead>
                    <tbody class="w-full bg-white divide-y divide-gray-200">
                      @foreach ($suscriptores as $productora)
                        <tr class="w-full hover:shadow-md" >
                            <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="">
                                        <div class="text-sm font-semibold leading-5 text-gray-900 w-max">
                                            {{$productora->email}}
                                        </div>
                                    </div>
                                </div> 
                            </td>
                            <td class="w-4/12 px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="">
                                        <div class="text-sm font-semibold leading-5 text-gray-900 w-max">
                                            {{$productora->created_at->diffForHumans()}}
                                        </div>
                                    </div>
                                </div> 
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="mt-8">
                        {{-- {{ $suscriptores->onEachSide(0)->links() }} --}}
                    </div>
            </div>
        </section>

    </div>
    
</x-app-layout>