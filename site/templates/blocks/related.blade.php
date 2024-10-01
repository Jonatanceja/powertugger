<div class="relative">
    <section class="container mx-auto max-w-6xl py-10 md:py-12 space-y-10 px-5 md:px-0 relative z-20" id="related">
        <div class="text-center space-y-5">
            <x-text.h2>{{ $page->title() }}</x-text.h2>
            <p class="prose">@kt($page->text())</p>
        </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10"> 
                @foreach ($page->related()->toPages() as $product)
                    <a href="{{ $product->url() }}">
                        <div class="space-y-3 wow fadeInUp transform group hover:scale-105 hover:shadow-xl relative transition duration-500">
                            <div class="bg-white h-96 hover:shadow-md flex items-center">
                                @if ($image = $product->pics()->toFile())
                                    <img class="mx-auto w-full" src="{{ $image->url() }}" alt="Producto">
                                @endif
                            </div>
                            <div class="absolute w-full bottom-0 pt-6 pb-3 px-5 bg-gradient-to-t from-stone-900 to-transparent group-hover:hidden transition duration-300">
                                <h3 class="font-bold text-sm text-white">{{ $product->title() }}</h3>
                            </div>
                            <div class="absolute bg-zinc-800/90 w-full h-full -top-3 group-hover:block hidden p-5">
                                <div class="flex h-full items-center text-white">
                                    <div class="space-y-3">
                                        <h3 class="font-bold">{{ $product->title() }}</h3>
                                        <p class="text-sm">{{ $product->description()->excerpt(180) }}</p>
                                        <p class="text-amber-400 text-sm">Conocer más →</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
    </section>
    <div class="bg-amber-400 z-10 absolute w-full bottom-0 left-0 h-1/2"></div>
</div>