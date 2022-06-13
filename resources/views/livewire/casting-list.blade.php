<div class="pb-28">
    
    @for($offset = 0 ; $offset < $count ; $offset += $perPage)
        <livewire:casting-group :perPage="$perPage" :offset="$offset" :seccion="$seccion"  wire:key="casting-group-{{$offset}} "> 
    @endfor

    @if (!$noMoreOffset)
    <div data-scroll data-scroll-speed="1.8" x-data show="$wire.showMoreBtn" class="flex justify-end gap-8 mt-2">
        <button
        wire:click="showMore"
        class="text-black saigon-text-500"
        wire:loading.attr="disabled"
        wire:loading.class="hidden opacity-0"
        wire.target="showMore">
            <svg id="a" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 34.16 34.4"><path d="M14.88 19.04H0v-4h14.88V0h4.4v15.04h14.88v4H19.28V34.4h-4.4V19.04Z" fill="#191818"/></svg>    
        </button>
    
        <div class="flex justify-center mx-auto tex-center" wire:loading wire:target="showMore">
            <div style="color: black;" class="text-center la-ball-scale-multiple la-dark">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    @endif



</div>