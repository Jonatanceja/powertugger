<section class="py-10" id="intro">
    <div class="relative">
        <div class="container max-w-6xl mx-auto bg-neutral-50 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center py-10 p-10 md:p-20 shadow-md">
            <div class="space-y-5">
                <x-text.subtitle_light>{{ $page->subtitle() }}</x-text.subtitle_light>
                <x-text.h2>{{ $page->heading() }}</x-text.h2>
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