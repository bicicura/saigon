<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-5 sm:border-t sm:border-gray-200">
    <label for="{{$inputContent['model']}}" class="block text-sm font-semibold leading-5 text-gray-700 sm:mt-px sm:pt-2">
        {{$inputContent['label']}}
    </label>

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="flex max-w-lg rounded-md shadow-sm">
            <textarea class="flex-1 block w-full p-2 font-normal transition duration-150 ease-in-out rounded-none form-input rounded-r-md sm:text-sm sm:leading-5" placeholder="{{$inputContent['placeholder']}}" wire:model.defer="{{$inputContent['model']}}" id="{{$inputContent['model']}}" class="w-full" rows="5"></textarea>
        </div>
        @error($inputContent['model']) <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
    </div>
</div>