<div class="relative">
    <section class="container mx-auto max-w-6xl py-10 md:py-12 space-y-10 px-5 md:px-0 relative z-20" id="related">
        <div class="text-center">
            <x-text.h2>Productos Destacados</x-text.h2>
        </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-10"> 
                @foreach ($page->related()->toPages() as $product)
                    <a href="{{ $product->url() }}">
                        <div class="space-y-3 wow fadeInUp relative transition transform hover:scale-105">
                            @if ($image = $product->pics()->toFile())
                                <img class="hover:shadow-md" src="{{ $image->crop(300, 400)->url() }}" alt="">
                            @endif
                            <div class="absolute w-full bottom-0 pt-6 pb-3 px-5 bg-gradient-to-t from-stone-900 to-transparent">
                                <h3 class="font-bold text-sm text-white">{{ $product->title() }}</h3>
                                <h4 class="text-amber-400 text-sm">{{ $product->brand()->text() }}</h4>
                            </div>
                        </div>
                    </a>
                @endforeach
    </section>
    <div class="bg-amber-400 z-10 absolute w-full bottom-0 left-0 h-1/2"></div>
</div>