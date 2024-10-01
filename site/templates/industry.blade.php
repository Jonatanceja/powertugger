@extends('layouts.default')
@section('content')

<section class="overflow-hidden bg-zinc-800 mt-16" id="hero">
    @if ($video = $page->videoTop()->toFile())
        <div class="grid grid-cols-1 pt-6 md:pt-14 md:grid-cols-5 gap-10 md:gap-0 items-center min-h-full">
            <div class="p-5 md:px-10 text-white text-left col-span-2 flex items-center">
                <div class="space-y-5">
                    <img class="w-56" src="/images/Logo-light.svg" alt="Logo">
                    <x-text.h1_light>{{ $page->title() }}</x-text.h1_light>
                    <p class="text-white text-sm md:text-base tracking-wider">{{ $page->text() }}</p>
                </div>
            </div>   
            <div class="col-span-3 relative">
                <video class="z-0 w-full md:h-auto md:max-w-none" autoplay muted loop playsinline>
                    <source src="{{ $video->url() }}" type="video/mp4">
                </video>
            </div> 
        </div>

    @endif
</section>


<section class="container grid grid-cols-1 md:grid-cols-2 gap-10 mx-auto max-w-6xl py-12 px-5 md:px-0 items-center" id="description">
    @if ($image = $page->image_1()->toFile())
        <img class="w-full" src="{{ $image->crop(600, 450)->url() }}" alt="">
    @endif
    <div class="space-y-5">
        <x-text.h2>{{ $page->title() }}</x-text.h2>
        <div class="prose win-w-full prose-stone min-w-full">
            @kt($page->description())
        </div>
    </div>
</section>
<section class="py-12 bg-zinc-800" id="benefits">
    <div class="container mx-auto max-w-6xl px-5 md:px-0 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        <div class="space-y-5 text-white">
            <x-text.h2 class="">Beneficios</x-text.h2>
            <div class="prose win-w-full prose-stone min-w-full text-white prose-li:list-disc marker:text-amber-500">
                @kt($page->benefits())
            </div>
        </div>
        <div>
            @if ($image = $page->image_2()->toFile())
                <img class="w-full" src="{{ $image->crop(600, 450)->url() }}" alt="">
            @endif
        </div>
    </div>
</section>
<section class="container mx-auto max-w-6xl py-12 space-y-10 px-5 md:px-0">
    <div class="space-y-5" id="functions">
        @if ($page->video_3()->isEmpty())
            <x-text.h2>Como funciona</x-text.h2>
            <div class="prose min-w-full prose-stone">
                @kt($page->how())
            </div>            
        @endif
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        @if ($page->video_3()->isNotEmpty())
            <div class="space-y-5" id="functions">
                <x-text.h2>Como funciona</x-text.h2>
                <div class="prose prose-stone">
                    @kt($page->how())
                </div>
            </div>
        @endif
        @if ($page->video()->isNotEmpty())
        <div class="relative w-full video" style="padding-bottom: 56.25%">
            {!! video($page->video()) !!}
        </div>
        @endif

        @if ($page->video_2()->isNotEmpty())
        <div class="relative w-full video" style="padding-bottom: 56.25%">
            {!! video($page->video_2()) !!}
        </div>
        @endif

        @if ($page->video_3()->isNotEmpty())
        <div class="relative w-full video" style="padding-bottom: 56.25%">
            {!! video($page->video_3()) !!}
        </div>
        @endif
    </div>


    <div class="md:flex space-y-5 md:space-y-0 md:space-x-5 md:justify-center bg-zinc-900 py-12 items-center px-5">
        <div class="text-white text-2xl font-bold">
            <h4>Conoce más a fondo todos nuestros productos</h4>
        </div>
        <div>
            <a href="{{ $site->url() }}#form"><x-buttons.primary>Descargar Catálogo</x-buttons.primary></a>
        </div>
    </div>
</section>

<section>
    <div class="relative">
        <section class="container mx-auto max-w-6xl py-10 md:py-12 space-y-10 px-5 md:px-0 relative z-20" id="related">
            <div class="text-center space-y-5">
                <x-text.h2>Nuestra gama de productos de {{ $page->title() }}</x-text.h2>
            </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-10"> 
                    @foreach ($page->related()->toPages() as $product)
                        <a href="{{ $product->url() }}">
                            <div class="space-y-3 wow fadeInUp transform group hover:scale-105 hover:shadow-xl relative transition duration-500">
                                @if ($image = $product->pics()->toFile())
                                    <img class="hover:shadow-md" src="{{ $image->crop(300, 400)->url() }}" alt="">
                                @endif
                                <div class="absolute w-full bottom-0 pt-6 pb-3 px-5 bg-gradient-to-t from-stone-900 to-transparent group-hover:hidden transition duration-300">
                                    <h3 class="font-bold text-sm text-white">{{ $product->title() }}</h3>
                                </div>
                                <div class="absolute bg-zinc-800/90 w-full h-full -top-3 group-hover:block hidden p-3 md:p-5">
                                    <div class="flex h-full items-center text-white">
                                        <div class="space-y-3">
                                            <h3 class="font-bold">{{ $product->title() }}</h3>
                                            <p class="text-sm hidden md:block">{{ $product->description()->excerpt(180) }}</p>
                                            <p class="text-xs block md:hidden">{{ $product->description()->excerpt(100) }}</p>
                                            <p class="text-amber-400 text-sm">Conocer más →</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
        </section>
        <div class="bg-amber-400 z-10 absolute w-full bottom-0 left-0 h-1/3 md:h-1/2"></div>
    </div>
</section>


@endsection