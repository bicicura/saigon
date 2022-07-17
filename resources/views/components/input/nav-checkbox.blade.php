<div class="flex items-center gap-4 {{$attributes['reverse']}}">
    <label class="lg:order-last" for="{{$inputContent['label']}}">{{__($inputContent['label'])}}</label>
    <input class="bg-transparent border-white cursor-pointer lg:order-first border-px focus:ring-0 focus:ring-offset-0" wire:model="{{$inputContent['model']}}" value="{{$inputContent['label']}}" type="{{$inputType}}" id="{{$inputContent['label']}}">
</div>