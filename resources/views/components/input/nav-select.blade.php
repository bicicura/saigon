<div class="relative">
    <select wire:model="{{$inputContent['model']}}" class="w-full uppercase bg-transparent border-none border-saigon-white text-saigon-white" name="" id="">
        <option class="" value="" disabled>{{__($inputContent['label'])}}</option>
        @foreach ($inputContent['options'] as $key => $option)
        <option class="text-saigon-black" value="{{$key}}">{{$option}}</option>
        @endforeach
    </select>
    @error($inputContent['model']) <div class="absolute left-0 text-sm font-bold text-red-500 rounded-full -bottom-6 w-max">{{ $message }}</div> @enderror
</div>