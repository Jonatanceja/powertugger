<section class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 py-16">
    <div class="text-center space-y-5 flex justify-center">
        <x-text.subtitle_light>{{ $page->title() }}</x-text.subtitle_light>
    </div>
    <div class="text-center max-w-xl mx-auto">
        <x-text.h2>Nuestras soluciones para la industria</x-text.h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-10 pt-10">
        @foreach ($page->related()->toPages() as $industry)
            <div class="space-y-3">
                @if ($image = $industry->image_1()->toFile())
                    <a href="{{ $industry->url() }}">
                        <img class="w-full" src="{{ $image->crop(600, 400)->url() }}" alt="">
                    </a>
                    <h4 class="text-2xl text-stone-800">{{ $industry->title() }}</h4>
                    <x-text.body>{{ $industry->short() }}</x-text.body>
                    <div>
                        <a class="text-amber-400 hover:underline" href="{{ $industry->url() }}">
                            Ver soluciones <span><i class="lni lni-arrow-right"></i></span>
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="flex pt-8 justify-center">
        <x-buttons.secondary>
            <a href="/industrias">Ver más industrias</a>
        </x-buttons.secondary>
    </div>
</section>