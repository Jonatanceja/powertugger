<section class="py-12 md:py-16 container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
    <x-text.subtitle_light>{{ $page->title() }}</x-text.subtitle_light>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 md:gap-20 items-center">
            @foreach ($page->logos()->toFiles() as $items)
                <a href="{{ $items->link() }}" target="blank">
                    <img class="max-h-36 max-w mx-auto" src="{{ $items->url() }}" alt="{{ $items->alt() }}">
                </a>
            @endforeach            
        </div>
</section>