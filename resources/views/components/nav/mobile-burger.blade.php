<div x-on:click="toggleNav">
    <button class="relative flex items-center ml-auto space-x-2 lg:hidden focus:outline-none">
        <div class="absolute left-0 right-0 p-6 mx-auto -top-4"></div>
        <div class="relative flex items-center justify-center w-7">
        <span x-bind:class="open ? 'translate-y-2 rotate-45' : ''" class="absolute w-full transition transform bg-current" style="height: 1.5px">
        </span>
        
        <span x-bind:class="open ? 'translate-y-2 -rotate-45' : 'translate-y-2'" class="absolute w-full transition transform bg-current" style="height: 1.5px">
        </span>
        </div>
    </button>
</div>