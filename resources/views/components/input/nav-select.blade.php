<div class="relative">
    <select wire:model="{{$inputContent['model']}}" class="w-full uppercase bg-transparent border-none border-saigon-white text-saigon-white" name="" id="">
        <option class="cursor-pointer" value="" disabled>{{__($inputContent['label'])}}</option>
        @foreach ($talles as $item)
            <option class="cursor-pointer text-saigon-black" value="{{$item->val}}">{{__($item->nombre)}}</option>
        @endforeach
    </select>
    @error($inputContent['model']) <div class="absolute left-0 text-sm font-bold text-red-500 rounded-full -bottom-6 w-max">{{ $message }}</div> @enderror
</div>