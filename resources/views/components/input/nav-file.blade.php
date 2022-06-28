<div class="relative mt-2 lg:mt-0 lg:w-full" x-data="{ focused: false, validated: '', }" @file-validated.window="$event.detail.type == '{{$inputContent["model"]}}'? validated = $event.detail.type : ''">
    <div class="flex items-center">
        <span class="w-full shadow-sm">
            <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused, 'bg-white text-black' : validated == '{{$inputContent["model"]}}' } " for="{{$inputContent['model']}}" class="flex items-center justify-center gap-1 px-3 py-2 text-white uppercase transition duration-150 ease-in-out border-2 border-white cursor-pointer lg:text-sm lg:py-2 hover:text-gray-300 active:bg-gray-500 active:text-gray-800">
                <span>{{__($inputContent['label'])}}</span>
                <div class="w-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 rotate-180" viewBox="0 0 27 32" xml:space="preserve"><path fill="none" stroke="#F2F2F2" stroke-width="2" stroke-miterlimit="10" d="m26.3 18-13 13L.4 18M13.4 0v31"></path></svg>
                </div>
            </label>
            <input 
            wire:model="{{$inputContent['model']}}"
            @focus="focused = true"
            @blur="focused = false"
            type="file" 
            class="sr-only"
            id="{{$inputContent['model']}}"
            >
        </span>
    </div>
    @error($inputContent['model']) <div class="absolute right-0 mt-1 text-sm font-bold text-red-500 rounded-full lg:right-auto lg:left-0 -bottom-6 w-max">{{ $message }}</div> @enderror
</div>