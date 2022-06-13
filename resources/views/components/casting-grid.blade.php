<div class="gap-4 lg:grid lg:grid-cols-3 lg:pb-24">
    @foreach ($castings as $item)
    <section class="pt-4 pb-8 text-right border-t-2 border-black saigon-text-white lg:text-left lg:pb-0 lg:pt-0 lg:border-t-0">
        <div class="hidden gap-2 mb-2 text-black lg:flex">
            <h2 class="saigon-text-200">{{$item['nombre']}} — {{$item['director']}} | {{$item['productora']}}</h2>
        </div>
        {{-- dejamos el aspect video en desktop?? --}}
        <a href="/casting-player/{{$item['id']}}" class="flex flex-col justify-between bg-center bg-no-repeat bg-cover cursor-pointer h-96 lg:h-fit lg:py-28 lg:aspect-video rounded-xl" style="background-image: url('/thumbnails/{{$item['thumbnail']}}')">
            <div class="lg:hidden">
                <div class="pt-4 pr-4">
                    <h2 class="uppercase saigon-text-5xl">{{$item['nombre']}}</h2>
                    <h4 class="mt-2">{{$item['director']}} — {{$item['productora']}}</h4>
                </div>
            </div>
            <div class="w-12 mt-auto mb-6 ml-auto mr-4 lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 42" xml:space="preserve"><path fill="none" stroke="#F3F3F3" stroke-width="1.3" stroke-miterlimit="10" d="m34.7 20.8-17 9.8L.6 40.4V1.1l17.1 9.8z"/></svg>
            </div>
        </a>
    </section> 
    @endforeach
</div>