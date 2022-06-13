<div class="relative">
    <select wire:model="{{$inputContent['model']}}" class="w-full text-white bg-transparent border-white border-none" name="" id="">
        <option class="text-black" value="">{{$inputContent['label']}}</option>
        @foreach ($inputContent['options'] as $key => $option)
        <option class="text-black" value="{{$key}}">{{$option}}</option>
        @endforeach
    </select>
    @error($inputContent['model']) <div class="absolute left-0 text-sm font-bold text-red-500 rounded-full -bottom-6 w-max">{{ $message }}</div> @enderror
</div>