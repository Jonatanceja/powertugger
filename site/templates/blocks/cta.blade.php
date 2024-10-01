<section class="py-16 bg-zinc-800">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
            <div class="relative">
                <div>
                    <div class="">
                        <div class="relative w-full video" style="padding-bottom: 56.25%">
                            {!! video($page->video()) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-5">
                <div class="space-y-5">
                    <x-text.subtitle_light>{{ $page->subtitle() }}</x-text.subtitle_light>
                    <div class="text-3xl md:text-4xl font-bold tracking-wide text-white">{{ $page->headline() }}</div>
                    <div class="prose text-white">{!! $page->text()->kti() !!}</div>
                    <div>
                        <a href="{{ $page->button() }}">
                            <x-buttons.secondary>Ver más...</x-buttons.secondary>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>