@extends('layouts.default')
@section('content')
<section id="Portada">
    @if ($image = $page->cover()->toFile())
        <div class="bg-cover bg-center md:pt-36 pt-16 pb-8 md:pb-16 relative z-0" style="background-image: url({{ $image->url() }})">
            <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 relative z-20">
                <x-text.subtitle>{{ $page->title() }}</x-text.subtitle>
                <x-text.h1_light>{{ $page->headline() }}</x-text.h1_light>
            </div>
            <div class="absolute w-full h-full inset-0 bg-gradient-to-r from-gray-800 to-transparent bg-blend-multiply z-10"></div>    
        </div>
    @endif
</section>
<section class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 py-16">
    <div class="text-center space-y-5 flex justify-center">
        <x-text.subtitle_light>{{ $page->title() }}</x-text.subtitle_light>
    </div>
    <div class="text-center max-w-xl mx-auto">
        <x-text.h2>Nuestras soluciones para la industria</x-text.h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-10 pt-10">
        @foreach ($page->children()->listed() as $industry)
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
</section>
<section class="py-16 bg-gray-100">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
        <div class="text-center space-y-5">
            <div class="flex justify-center">
                <x-text.subtitle_light>{{ $page->subtitle() }}</x-text.subtitle_light>
            </div>
            <x-text.h2>{{ $page->headline() }}</x-text.h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
            <div class="relative">
                <div>
                    @if ($image = $page->image_1()->toFile())
                        <img src="{{ $image->url() }}" alt="">
                    @endif
                </div>
            </div>
            <div class="space-y-5">
                @foreach ($page->blurb()->toStructure() as $item)
                    <div class="space-y-2 flex items-start space-x-5">
                        @if ($icon = $item->icon()->toFile())
                        <img class="h-14" src="{{ $icon->url() }}" alt="">
                        <div class="space-y-2">
                            <h4 class="text-2xl text-stone-800">{{ $item->heading() }}</h4>
                            <x-text.body>{{ $item->text() }}</x-text.body>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection