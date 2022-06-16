<div class="lg:w-full h-fit">
    <div class="flex items-center gap-4 mb-2">
        <label class="ml-auto uppercase cursor-pointer lg:ml-0" for="{{$inputContent['model']}}">{{__($inputContent['label'])}}</label>
        @error($inputContent['model']) <div class="mt-1 text-sm font-bold text-red-500">{{ $message }}</div> @enderror
    </div>
    
    <input 
    wire:model="{{$inputContent['model']}}" 
    {{ isset($attributes['x-mask']) ? 'x-mask=9999/99/99 placeholder=AAAA/MM/DD' : '' }}
    id="{{$inputContent['model']}}" 
    type="text" 
    class="w-full text-right text-white bg-transparent lg:text-left focus:ring-0">
</div>

