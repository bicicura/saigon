<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-5">
    <label for="{{$inputContent['model']}}" class="block text-sm font-semibold leading-5 text-gray-700 sm:mt-px sm:pt-2">
        {{$inputContent['label']}}
    </label>

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="flex max-w-lg rounded-md">
            <input wire:model="reel" id="reel" type="checkbox" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-checkbox">
        </div>

        @error($inputContent['model']) <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
    </div>
</div>