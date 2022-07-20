<div class="space-x-3 pointer-events-auto lg:flex lg:text-right lg:flex-col lg:gap-1 lg:space-x-0">
    <a href="{{ route(Route::currentRouteName(), [
        'language' => app()->getLocale() === 'es' ? 'en' : 'es', 
        'id' => isset(Route::current()->parameters['id']) ? Route::current()->parameters['id'] : null,
        'slug' => isset(Route::current()->parameters['slug']) ? Route::current()->parameters['slug'] : null,
        ]) }}">{{ strtoupper(app()->getLocale() === "es" ? 'eng' : 'esp') }}</a>
    <a target="_blank" href="https://www.instagram.com/saigonbuenosaires/">IG</a>
    <a target="_blank" href="https://www.facebook.com/SaigonBuenosAires/">FB</a>
    <a target="_blank" href="https://twitter.com/saigonBA">TW</a>
    <a target="_blank" href="https://vimeo.com/saigonbuenosaires">VM</a>
</div>