<style>
    video {
        object-fit: cover;
        object-position: center;
    }

    @media (min-width: 40em) {
            .splide-height-desktop {
            height: 80vh;
            max-height:80vh;
        }

        .splide-height-desktop video {
            height: 80vh;
            max-height:80vh;
        }
    }
</style>

<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        splide = new Splide( '#splide', {
            type   : 'loop',
            arrows: true,
            pagination: false,
            breakpoints: {
                800: {
                    arrows: false,
                },
            },
            video: {
                hideControls: true,
                disableOverlayUI: true,
                mute: true,
                autoplay: true,
                playerOptions: {
                    htmlVideo: {
                        muted: true,
                        playsInline: true,
                        autoplay: true,
                        },
                } 
            },
        });

        splide.on( 'video:ended', function() {
            splide.go( '>' );
        } );

        splide.mount({ Intersection, Video });      
    } );
</script>
  
<div class="relative bg-center bg-no-repeat bg-cover saigon-bg-hero rounded-xl lg:mt-16 lg:pt-12" x-intersect:enter.half="reel? '' : logo = false; reel = true; castings = false; $dispatch('indexScrollTo', { vidick: $refs.reel })">
    <div class="splide" id="splide">
        <div class="splide__arrows" style="height: 100%">
            <button class="splide__arrow splide__arrow--prev" style="height: 100%; border-radius: 0; left:0; width: 20rem; background: transparent; cursor: url('./imgs/izq.png'), auto;	">
                {{-- go back --}}
            </button>
            <button class="splide__arrow splide__arrow--next" style="height: 100%; border-radius: 0; right:0; width: 20rem; background: transparent; cursor: url('./imgs/der.png'), auto;	">
                {{-- go next --}}
            </button>
        </div>
        <div id="reel" x-ref="reel" class="absolute left-0 -top-24"></div>
        <div class="splide__track rounded-xl">
            <ul class="splide__list">
                @foreach ($reels as $item)
                    <li class="splide__slide splide-height-desktop" x-data=" { click: false } " x-on:click="window.location.href = '/es/player/{{ $item->slug }}'" data-splide-html-video="/reel/{{ $item->reel_video }}" style="cursor: pointer;" >
                        <img class="object-cover w-full h-full" src="/thumbnails/{{ $item->thumbnail }}">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

{{-- <style>
    video {
        object-fit: cover;
        object-position: center
    }
</style>

<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        splide = new Splide( '#splide', {
            type   : 'loop',
            arrows: true,
            pagination: false,
            breakpoints: {
                800: {
                    arrows: false,
                },
            },
            video: {
                disableOverlayUI: true,
                hideControls: true,
                mute: true,
                autoplay: true,
                playerOptions: {
            htmlVideo: {
                muted: true,
                playsInline: true,
                autoplay: true,
            },
            },
            
  }
        });

        splide.on( 'video:ended', function() {
            splide.go( '>' );
        } );
        splide.mount({ Intersection, Video });

      
    } );
  </script> --}}