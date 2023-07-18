<section class="py-10 md:py-16 md:mb-48" id="intro">
    <div class="relative">
        @if ($image = $page->cover()->toFile())
            <div class="w-full top-0 h-96 bg-cover bg-center z-0 bg-black bg-fixed" style="background-image: url('{{ $image->url() }}')"></div>            
        @endif
        <div class="container max-w-6xl mx-auto bg-white grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center py-10 md:absolute top-40 inset-x-0 p-10 md:p-20 shadow-md">
            <div class="space-y-5">
                <x-text.subtitle_light>{{ $page->subtitle() }}</x-text.subtitle_light>
                <x-text.h2>Nuestras soluciones para la industria</x-text.h2>
                <x-text.body>
                    @kt($page->text())
                </x-text.body>
            </div>
            <div class="relative">
                <div>
                    @if ($image = $page->pic_1()->toFile())
                        <img src="{{ $image->url() }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>