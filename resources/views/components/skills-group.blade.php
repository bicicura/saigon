<div class="flex flex-col justify-center gap-8 py-5 text-left lg:p-0 lg:flex-row">
    <div class="w-40">
        <p class="uppercase">{{$label}}</p>
    </div>
    <div class="grid w-full grid-cols-2 gap-8 lg:grid-cols-4 lg:gap-0 lg:gap-x-6">
        <div class="flex items-center gap-2 lg:col-span-4">
            <input wire:model="{{$label}}" wire:click="skillClicked('{{$label}}')" class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0 focus:ring-offset-0" value="{{$skillsgroup[0]->val}}" type="checkbox" id="no-{{$label}}">
            <label for="no-{{$label}}" class="uppercase" >{{__($noHace)}}</label>
        </div>
        @foreach ($skillsgroup as $skill)
            <div class="flex items-center gap-2" wire:key="{{ $loop->index }}">
                <input wire:model="{{$inputContent['model']}}" class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0 focus:ring-offset-0" value="{{$skill->val}}" type="checkbox" id="{{$label}}-{{ $loop->index }}">
                <label for="{{$label}}-{{ $loop->index }}" class="uppercase">{{__($skill->nombre)}}</label>
            </div>
        @endforeach
    </div>
</div>