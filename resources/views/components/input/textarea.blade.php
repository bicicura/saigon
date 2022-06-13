<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-5">
    <label for="{{$inputContent['model']}}" class="block text-sm font-semibold leading-5 text-gray-700 sm:mt-px sm:py-2">
        {{$inputContent['label']}}
    </label>

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="max-w-lg flex rounded-md shadow-sm">
            <textarea wire:model="{{$inputContent['model']}}" id="{{$inputContent['model']}}" rows="3" class="form-textarea block w-full font-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
        </div>
        @error($inputContent['model']) <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
        <p class="mt-2 text-sm text-gray-500">Un breve párrafo sobre el model.</p>
    </div>
</div>