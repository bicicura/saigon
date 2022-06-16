<div class="flex gap-8">
    <div class="w-40">
        <p class="uppercase">{{$label}}</p>
    </div>
    <div class="grid w-full grid-cols-4 gap-x-8">
        <div class="flex items-center col-span-4 gap-2">
            <input wire:model="{{$label}}" wire:click="skillClicked('{{$label}}')" class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" value="no-{{$label}}" type="checkbox" id="no-{{$label}}">
            <label for="no-{{$label}}" class="uppercase" >{{__($noHace)}}</label>
        </div>
        @foreach ($skillsGroup as $skill)
            <div class="flex items-center gap-2" wire:key="{{ $loop->index }}">
                <input wire:model="{{$inputContent['model']}}" class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0" value="{{$skill}}" type="checkbox" id="{{$label}}-{{ $loop->index }}">
                <label for="{{$label}}-{{ $loop->index }}" class="uppercase">{{__($skill)}}</label>
            </div>
        @endforeach
    </div>
</div>