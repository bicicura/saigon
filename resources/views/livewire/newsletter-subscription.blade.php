<div class="relative lg:space-y-2 {{ $seccion === "desuscribirse"? "text-right text-saigon-black" : 'text-saigon-white' }}">
    <h4>{{__($title)}}</h4>
    <form wire:submit.prevent="{{$type}}" class="flex items-center mb-3 lg:mb-1.5 border-0 border-b-2 {{ $seccion === "desuscribirse"? "border-saigon-black" : 'border-saigon-white' }} gap-x-2 saigon-font-light">
        <input wire:model.defer="email" class="w-full px-0 bg-transparent border-0 placeholder:text-gray-500 focus:ring-0" type="email" placeholder="info@saigoncasting.com">
        <button type="submit" class="flex-1 w-max">
            <svg viewBox="0 0 48 48" class="w-10 h-10 lg:w-8 fill-white"><path class="{{ $seccion === "desuscribirse"? "fill-saigon-black" : 'fill-saigon-white' }}" d="m28.05 35.9-2.15-2.1 8.4-8.4H8v-3h26.3l-8.45-8.45 2.15-2.1L40.05 23.9Z"/></svg>
        </button>
    </form>
    @error('email') <div class="absolute left-0 mt-3 text-sm font-bold text-red-500 lg:right-auto lg:left-0 lg:mt-0 -bottom-6">{{ $message }}</div> @enderror
</div>