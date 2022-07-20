<div class="pb-28" 
     x-data=" { castingCount: $persist(0).using(sessionStorage), scrollToFlag: $persist(false).using(sessionStorage), scrollToId: $persist(0).using(sessionStorage) } " 
     {{-- evento que emite Livewire para indicar que ya se scroleo para abajo, y cuando se refreshee no hace falta volverlo a hacer, a menos que la flag sea true. --}}
     @scroll-flag-false.window="scrollToFlag = false;"
     x-init="flag = scrollToId";
>
    <div wire:model="scrollToId" x-init="scrollToFlag? $dispatch('input', scrollToId) : '';"></div>
    {{-- aca arranca la secuencia de bajar al fondo. Chequeando la data del Storage y seteandola igual al Count de castings que trae la 1era vez. --}}
    <div wire:model="scrolledCastingCount" x-init="scrollToFlag? $dispatch('input', castingCount) : ''; scrollToFlag? scrollToFlag = false : ''"></div>    
    @for($offset = 0 ; $offset < $count ; $offset += $perPage)
        <livewire:casting-group :perPage="$perPage" :offset="$offset" :seccion="$seccion"  wire:key="casting-group-{{$offset}} "> 
    @endfor


    @if (!$noMoreOffset)
        <div data-scroll data-scroll-speed="1.8" x-data class="flex justify-end gap-8 mt-2">
            <button
            wire:click="showMore"
            class="text-black saigon-text-500"
            wire:loading.attr="disabled"
            wire:loading.class="hidden opacity-0"
            wire.target="showMore">
                <svg id="a" xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 34.16 34.4"><path d="M14.88 19.04H0v-4h14.88V0h4.4v15.04h14.88v4H19.28V34.4h-4.4V19.04Z" fill="fill-saigon-black"/></svg>    
            </button>
        
            <div class="flex justify-center ml-auto tex-center" wire:loading wire:target="showMore">
                <div style="color: black;" class="text-center la-ball-scale-multiple la-dark">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    @endif
</div>