<section class="py-12 md:py-16 container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
    <x-text.subtitle_light>Testimonios</x-text.subtitle_light>
    <x-text.h2>Lo que nuestros clientes opinan</x-text.h2>
    <x-modules.swiper>
        @foreach ($page->testimonials()->toStructure() as $item)
            <div class="swiper-slide bg-stone-100 shadow-md p-10">
                <div class="space-y-5">
                    <div class="grid grid-cols-5 gap-5 py-5">
                        <div class="col-span-4 flex space-x-3 items-center">
                            @if ($image = $item->pic()->toFile())
                                <img class="w-12 rounded-full" src="{{ $image->crop(100, 100)->url() }}" alt="">                                
                            @endif
                            <div>
                                <x-text.h3>{{ $item->name() }}</x-text.h3>
                                <p class="text-xs">{{ $item->position() }}</p>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-300 flex items-center justify-center rounded-full text-xl">
                                <i class="lni lni-quotation"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-5">
                    <x-text.body>
                        @kt($item->text())
                    </x-text.body>
                    <div class="flex space-x-3 text-amber-400 text-xl">
                        <i class="lni lni-star-fill"></i>
                        <i class="lni lni-star-fill"></i>
                        <i class="lni lni-star-fill"></i>
                        <i class="lni lni-star-fill"></i>
                        <i class="lni lni-star-fill"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </x-modules.swiper>
</section>