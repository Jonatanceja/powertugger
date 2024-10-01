<section class="py-12 md:py-16 bg-stone-800 px-5 md:px-0 space-y-5" id="form">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        <div class="space-y-5">
            <x-text.subtitle_light>{{ $page->heading() }}</x-text.subtitle_light>
            <div class="text-white">
                <x-text.h2>{{ $page->subtitle() }}</x-text.h2>
            </div>
            <div class="prose text-white">
                @kt($page->text())
            </div>
        </div>
        <div>
            @include('partials.form')
        </div>
    </div>
</section>
@if ($image = $page->pic()->toFile())
<div class="bg-cover bg-center h-56 md:h-96" style="background-image: url({{ $image->url() }})"></div>
@endif