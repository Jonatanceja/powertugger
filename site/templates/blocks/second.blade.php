<section class="py-16">
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
                    <x-text.h2>{{ $page->headline() }}</x-text.h2>
                    <x-text.body>{!! $page->text()->kti() !!}</x-text.body>
                </div>
            </div>
        </div>
    </div>
</section>