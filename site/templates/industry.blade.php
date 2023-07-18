@extends('layouts.default')
@section('content')


@if ($page->cover()->isNotEmpty())
    <section id="Portada">
        @if ($image = $page->cover()->toFile())
            <div class="bg-cover bg-center md:pt-36 pt-16 pb-8 md:pb-16 relative z-0" style="background-image: url({{ $image->url() }})">
                <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 relative z-20">
                    <x-text.subtitle>{{ $page->parent()->title() }}</x-text.subtitle>
                    <x-text.h1_light>{{ $page->title() }}</x-text.h1_light>
                </div>
                <div class="absolute w-full h-full inset-0 bg-gradient-to-r from-gray-800 to-transparent bg-blend-multiply z-10"></div>    
            </div>
        @endif
    </section>
@else
<section class="relative flex items-center justify-center w-full h-96 md:h-screen overflow-hidden -mt-2 md:-mt-0 -mb-14" id="hero">
    @if ($video = $page->videoTop()->toFile())
        <div class="relative z-30 p-5 text-white rounded-xl container mx-auto text-left space-y-5">
            <x-text.h1_light>{{ $page->title() }}</x-text.h1_light>
            <p class="text-white max-w-2xl md:text-lg tracking-wider" style="text-shadow: 2px 2px 4px #000;">{{ $page->text() }}</p>
        </div>        
        <video class="absolute z-10 w-full md:min-h-full max-w-none" autoplay muted loop playsinline>
            <source src="{{ $video->url() }}" type="video/mp4">
        </video>
    @endif
</section>
@endif


<section class="container mx-auto max-w-6xl py-12 space-y-10 px-5 md:px-0" id="main">
    @if ($image = $page->image_1()->toFile())
        <img class="w-full" src="{{ $image->url() }}" alt="">
    @endif
    <div class="space-y-5">
        <div class="flex space-x-5 items-center">
            @if ($icon = $page->icon()->toFile())
                <img class="h-20" src="{{ $icon->url() }}" alt="">
                <x-text.h2>{{ $page->title() }}</x-text.h2>
            @endif
        </div>
        <div class="prose win-w-full prose-stone min-w-full">
            @kt($page->description())
        </div>
    </div>
</section>
<section class="container mx-auto max-w-6xl py-12 space-y-10 px-5 md:px-0" id="benefits">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        <div class="space-y-5">
            <x-text.h2>Beneficios</x-text.h2>
            <div class="prose win-w-full prose-stone min-w-full">
                @kt($page->benefits())
            </div>
        </div>
        <div>
            @if ($image = $page->image_2()->toFile())
                <img class="w-full" src="{{ $image->crop(600, 400)->url() }}" alt="">
            @endif
        </div>
    </div>
</section>
<section class="container mx-auto max-w-6xl py-12 space-y-10 px-5 md:px-0" id="benefits">
    @if ($page->video_2()->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        <div class="relative w-ful video" style="padding-bottom: 56.25%">
            {!! video($page->video()) !!}
        </div>
        <div class="relative w-ful video" style="padding-bottom: 56.25%">
            {!! video($page->video_2()) !!}
        </div>
    </div>
    <div class="space-y-5">
        <x-text.h2>Como funciona</x-text.h2>
        <div class="prose win-w-full prose-stone min-w-full">
            @kt($page->how())
        </div>
    </div>
    @endif
    @if ($page->video_2()->isEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
            <div class="relative w-ful video" style="padding-bottom: 56.25%">
                {!! video($page->video()) !!}
            </div>
            <div class="space-y-5">
                <x-text.h2>Como funciona</x-text.h2>
                <div class="prose win-w-full prose-stone min-w-full">
                    @kt($page->how())
                </div>
            </div>
        </div> 
    @endif
    <div class="flex justify-center">
        <a href="{{ $site->url() }}#form">
            <x-buttons.primary>Descargar Catálogo</x-buttons.primary>
        </a>
    </div>
</section>
<section>
    <div class="relative">
        <section class="container mx-auto max-w-6xl py-10 md:py-12 space-y-10 px-5 md:px-0 relative z-20" id="related">
            <div class="text-center">
                <x-text.h2>Productos</x-text.h2>
            </div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-10"> 
                    @foreach ($page->related()->toPages() as $product)
                        <a href="{{ $product->url() }}">
                            <div class="space-y-3 wow fadeInUp relative transition transform hover:scale-105">
                                @if ($image = $product->pics()->toFile())
                                    <img class="hover:shadow-md" src="{{ $image->crop(300, 400)->url() }}" alt="">
                                @endif
                                <div class="absolute w-full bottom-0 pt-6 pb-3 px-5 bg-gradient-to-t from-stone-900 to-transparent">
                                    <h3 class="font-bold text-sm text-white">{{ $product->title() }}</h3>
                                    <h4 class="text-amber-400 text-sm">{{ $product->brand()->text() }}</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
        </section>
        <div class="bg-amber-400 z-10 absolute w-full bottom-0 left-0 h-1/2"></div>
    </div>
</section>


@endsection