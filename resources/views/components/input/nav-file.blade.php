<div class="mt-2 lg:mt-0 lg:w-full" x-data="{ focused: false, validated: '', }" @file-validated.window="$event.detail.type == '{{$inputContent["model"]}}'? validated = $event.detail.type : ''">
    <div class="flex items-center">
        <span class="w-full shadow-sm">
            <label :class=" {'outline-none border-blue-300 shadow-outline-blue' : focused, 'bg-white text-black' : validated == '{{$inputContent["model"]}}' } " for="{{$inputContent['model']}}" class="flex justify-center px-3 py-2 text-white uppercase transition duration-150 ease-in-out border-2 border-white cursor-pointer lg:text-sm lg:py-2 hover:text-gray-300 active:bg-gray-500 active:text-gray-800">
                {{__($inputContent['label'])}}
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
    @error($inputContent['model']) <div class="mt-1 text-sm font-bold text-red-500 rounded-full w-max">{{ $message }}</div> @enderror
</div>