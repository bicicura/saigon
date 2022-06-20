<div class="lg:w-full">
    <div class="relative lg:mb-2 lg:flex lg:justify-between lg:items-baseline">
        <label class="cursor-pointer" for="{{$inputContent['model']}}">{{$inputContent['label']}}</label>
        <span class="hidden w-full text-base text-right lg:text-tiny 3xl:text-base lg:w-max lg:ml-auto lg:text-left lg:inline">{{$inputContent['legend']}}</span>
        @error($inputContent['model']) <div class="absolute left-0 text-sm font-bold text-red-500 rounded-full top-6 w-max">{{ $message }}</div> @enderror
    </div>
    <input type="text" wire:model="{{$inputContent['model']}}" id="{{$inputContent['model']}}" class="w-full text-right text-white bg-transparent border-none lg:text-left focus:ring-0">
    <p class="pt-3 text-lg leading-snug lg:border-t lg:hidden">{{$inputContent['legend']}}</p>
</div>