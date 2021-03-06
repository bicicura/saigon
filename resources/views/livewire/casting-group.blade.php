<div class="gap-4 mt-4 lg:grid lg:grid-cols-3 casting-group-container" x-data="{ shown: false }">
    @if ($seccion === "Ficción")
        @foreach ($castings as $item)
        <section class="relative pt-4 pb-8 text-right transition duration-200 ease-in border-t-2 opacity-0 border-saigon-black text-saigon-white lg:text-left lg:pb-0 lg:pt-0 lg:border-t-0 casting-article" :class="shown? 'opacity-100 translate-y-0' : 'translate-y-8' " x-intersect.threshold.25="shown = true">
            <div wire:click="$emit('castingClicked', {{$item}})" x-data=" { hover: false } " x-on:mouseover="hover = true;" x-on:mouseleave="hover = false;">
                <div class="hidden gap-2 mb-2 text-saigon-black lg:flex" :class="hover? 'underline' : '' ">
                    <h2 class="saigon-text-100 lg:line-clamp-1">{{$item['nombre']}} <span>— {{$item['director']}}</span> <span> | {{$item->getProductora->nombre}}</span></h2>
                </div>
                <div class="relative flex flex-col justify-between bg-center bg-no-repeat bg-cover cursor-pointer h-104 lg:h-fit lg:aspect-video">
                    <img class="object-cover w-full h-full transition-opacity duration-150 ease-in-out opacity-0 rounded-xl" loading="lazy" src="/fotos/{{$item->getFotografias[0]->img}}" alt="Thumbnail de {{$item['nombre']}}" onload="this.classList.add('opacity-100'); this.classList.remove('opacity-0')">
                    <div class="absolute left-0 right-0 flex flex-col justify-between h-full lg:hidden casting-gradient-mobile">
                        <div class="">
                            <div class="pt-4 pr-4">
                                <h2 class="text-3xl uppercse">{{$item['nombre']}}</h2>
                                <h4 class="">{{$item['director']}} — {{$item->getProductora->nombre}}</h4>
                            </div>
                        </div>
                        <div class="w-12 mt-auto mb-6 ml-auto mr-4 lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 42" xml:space="preserve"><path fill="none" stroke="#F3F3F3" stroke-width="1.3" stroke-miterlimit="10" d="m34.7 20.8-17 9.8L.6 40.4V1.1l17.1 9.8z"/></svg>
                        </div>
                    </div>
                    <div class="absolute inset-0 top-0 bottom-0 left-0 right-0 flex items-center justify-center card-play-button rounded-xl">
                        <div class="flex items-center gap-2 px-3 py-px rounded-full bg-saigon-black w-max h-fit">
                            <svg width="15" height="15" viewBox="0 0 15 15" class="hidden mr-2 lg:block"><g fill="none" fill-rule="evenodd"><path d="M-1-1h18v18H-1z"></path><path class="fill-saigon-white" d="M6 10.875L10.5 7.5 6 4.125v6.75zM7.5 0C3.36 0 0 3.36 0 7.5 0 11.64 3.36 15 7.5 15c4.14 0 7.5-3.36 7.5-7.5C15 3.36 11.64 0 7.5 0zm0 13.5c-3.307 0-6-2.693-6-6s2.693-6 6-6 6 2.693 6 6-2.693 6-6 6z"></path></g></svg>
                            <span>{{__('Explorar')}}</span>
                        </div>
                    </div>
                </div>
            </a>
        </section>
        @endforeach
    @else
        @foreach ($castings as $item)
        <section 
            id="casting-{{$item->id}}"
            class="relative pt-4 pb-8 text-right transition duration-200 ease-in border-t-2 opacity-0 border-saigon-black text-saigon-white lg:text-left lg:pb-0 lg:pt-0 lg:border-t-0 casting-article" 
            :class="shown? 'opacity-100 translate-y-0' : 'translate-y-8' " 
            x-intersect.threshold.25="shown = true"
            {{-- al clikear un casting, se guarda el offset/count del grupo de castings necesario para cuando regrese el user y el id del casting al que se va a tener q scrollear. --}}
            x-on:click="castingCount = $refs.sectionCastingCount.value; scrollToId = 'casting-{{$item->id}}'"
        >
            <a href="{{ route('casting-player', [app()->getLocale(), $item->slug,]) }}" x-data=" { hover: false } " :class="hover? '' : '' " x-on:mouseover="hover = true;" x-on:mouseleave="hover = false;">
                <div class="hidden gap-2 mb-2 text-saigon-black lg:flex" :class="hover? 'underline' : '' ">
                    <h2 class="saigon-text-100 lg:line-clamp-1 ">{{$item['nombre']}} <span>— {{$item['director']}}</span> <span> | {{$item->getProductora->nombre}}</span></h2>
                </div>
                <div class="relative flex flex-col justify-between bg-center bg-no-repeat bg-cover cursor-pointer {{ ( $item->categoria == 'Small' ) ? "h-80" : ( ( $item->categoria == 'Medium' ) ? "h-104" : "h-128") }} lg:h-fit lg:aspect-video">
                    <img class="object-cover w-full h-full transition-opacity duration-150 ease-in-out opacity-0 rounded-xl" loading="lazy" src="/thumbnails/{{$item['thumbnail']}}" alt="Thumbnail de {{$item['nombre']}}" onload="this.classList.add('opacity-100'); this.classList.remove('opacity-0')">
                    <div class="absolute left-0 right-0 flex flex-col justify-between h-full lg:hidden casting-gradient-mobile rounded-xl">
                        <div class="">
                            <div class="pt-4 pr-4">
                                <h2 class="text-3xl uppercase">{{$item['nombre']}}</h2>
                                <h4 class="">{{$item['director']}} — {{$item->getProductora->nombre}}</h4>
                            </div>
                        </div>
                        <div class="w-12 mt-auto mb-6 ml-auto mr-4 lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 42" xml:space="preserve"><path fill="none" stroke="#F3F3F3" stroke-width="1.3" stroke-miterlimit="10" d="m34.7 20.8-17 9.8L.6 40.4V1.1l17.1 9.8z"/></svg>
                        </div>
                    </div>
                    <div class="absolute inset-0 top-0 bottom-0 left-0 right-0 flex items-center justify-center card-play-button">
                        <div class="flex items-center gap-2 px-3 py-px rounded-full bg-saigon-black w-max h-fit">
                            <svg width="15" height="15" viewBox="0 0 15 15" class="hidden mr-2 lg:block"><g fill="none" fill-rule="evenodd"><path d="M-1-1h18v18H-1z"></path><path class="fill-saigon-white" d="M6 10.875L10.5 7.5 6 4.125v6.75zM7.5 0C3.36 0 0 3.36 0 7.5 0 11.64 3.36 15 7.5 15c4.14 0 7.5-3.36 7.5-7.5C15 3.36 11.64 0 7.5 0zm0 13.5c-3.307 0-6-2.693-6-6s2.693-6 6-6 6 2.693 6 6-2.693 6-6 6z"></path></g></svg>
                            <span>{{__('Explorar')}}</span>
                        </div>
                    </div>
                </div>
            </a>
            <input type="hidden" value="casting-offset-{{$offset}}" wire:ignore>
            {{-- aqui almaceno el offset/count del grupo de castings. --}}
            <input x-ref="sectionCastingCount" type="hidden" value="{{$offset}}" wire:ignore>
        </section>
        @endforeach
    @endif
</div>