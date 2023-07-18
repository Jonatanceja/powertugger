<section id="Portada">
    @if ($image = $page->cover()->toFile())
        <div class="bg-cover bg-center md:pt-36 pt-16 pb-8 md:pb-16 relative z-0" style="background-image: url({{ $image->url() }})">
            <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 relative z-20">
                <x-text.subtitle>{{ $page->parent()->title() }}</x-text.subtitle>
                <x-text.h1_light>Acerca de Powertugger</x-text.h1_light>
            </div>
            <div class="absolute w-full h-full inset-0 bg-gradient-to-r from-gray-800 to-transparent bg-blend-multiply z-10"></div>    
        </div>
    @endif
</section>