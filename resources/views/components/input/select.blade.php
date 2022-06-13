<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-5">
    <label for="{{$inputContent['model']}}" class="block text-sm font-semibold leading-5 text-gray-700 sm:mt-px sm:pt-2">
        {{$inputContent['label']}}
    </label>

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="flex max-w-lg rounded-md shadow-sm">
            <select  wire:model="{{$inputContent['model']}}" id="{{$inputContent['model']}}" class="flex-1 block w-full p-2 font-normal transition duration-150 ease-in-out border-0 rounded-none outline-none form-input rounded-r-md sm:text-sm sm:leading-5">
                <option class="p-4" disabled value="">{{$inputContent['placeholder']}}</option>
                @foreach ($inputContent['opciones'] as $opcion)
                <option class="p-4" {{ $opcion['value'] == $inputContent['model']? 'selected' : '' }} value="{{$opcion['value']}}">{{$opcion['text']}}</option>
                @endforeach
            </select>
        </div>

        @error($inputContent['model']) <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
    </div>
</div>