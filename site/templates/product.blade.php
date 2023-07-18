@extends('layouts.default')
@section('content')



<section id="Portada">
    @if ($image = $page->pics()->toFile())
        <div class="bg-cover bg-center md:pt-36 pt-16 pb-8 md:pb-16 relative z-0" style="background-image: url({{ $image->url() }})">
            <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 relative z-20">
                <x-text.subtitle>{{ $page->category() }}</x-text.subtitle>
                <x-text.h1_light>{{ $page->title() }}</x-text.h1_light>
            </div>
            <div class="absolute w-full h-full inset-0 bg-gradient-to-r from-gray-800 to-transparent bg-blend-multiply z-10"></div>    
        </div>
    @endif
</section>
<section class="py-16">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
            <div class="space-y-5">
                <div class="relative w-ful video" style="padding-bottom: 56.25%">
                    {!! video($page->video()) !!}
                </div>
            </div>
            <div class="space-y-5">
                <x-text.h3>{{ $page->title() }}</x-text.h3>
                <div class="prose prose-stone">
                    @kt($page->description())
                </div>
                <x-buttons.primary href="{{ $site->whatsapp() }}" target="_blank">Consultar Costos</x-buttons.primary>
            </div>
        </div>
        <div class="pt-8">
            <x-modules.fancybox>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-10">
                    @foreach($page->pics()->toFiles() as $pic)
                    <div>
                        <a href="{{ $pic->url() }}" data-fancybox="gallery" data-caption="Caption #1">
                            <img class="w-full" src="{{ $pic->crop(600, 400)->url() }}" alt=""/>
                        </a>
                    </div>
                    @endforeach
                </div>
            </x-modules.fancybox>            
        </div>
    </div>
</section>
<section class="py-12 container mx-auto max-w-6xl px-5 md:px-0" x-data="{ activeTab: 'tab1' }">
    <div class="block md:flex">
        <button @click="activeTab = 'tab1'"
            :class="{ 'bg-gray-300 text-tone-800 w-full border-b-gray-300': activeTab === 'tab1', 'bg-gray-100 text-stone-800 border border-t-gray-200 border-l-gray-200 border-r-gray-200 border-b-gray-100 w-full': activeTab !== 'tab1' }"
            class="px-4 py-2">Aplicaciones</button>
        <button @click="activeTab = 'tab2'"
            :class="{ 'bg-gray-300 text-stone-800 w-full border-b-gray-100': activeTab === 'tab2', 'bg-gray-100 text-stone-800 border border-t-gray-200 border-l-gray-200 border-r-gray-200 border-b-gray-100 w-full': activeTab !== 'tab2' }"
            class="px-4 py-2">Características y Especificaciones</button>
        <button @click="activeTab = 'tab3'"
            :class="{ 'bg-gray-300 text-stone-800 w-full border-b-gray-100': activeTab === 'tab3', 'bg-gray-100 text-stone-800 border border-t-gray-200 border-l-gray-200 border-r-gray-200 border-b-gray-100 w-full': activeTab !== 'tab3' }"
            class="px-4 py-2">Dimensiones</button>
    </div>

    <div x-cloak x-show="activeTab === 'tab1'" class="p-6 bg-white border border-gray-200">
        <h2>Aplicaciones</h2>
        <p>@kt($page->aplication())</p>
    </div>

    <div x-cloak x-show="activeTab === 'tab2'" class="p-6 bg-white border border-gray-200">
        <h2>Características y Especificaciones</h2>
        <p>@kt($page->specs())</p>
    </div>

    <div x-cloak x-show="activeTab === 'tab3'" class="p-6 bg-white border border-gray-200">
        <h2>Dimensiones</h2>
        <p>@kt($page->dimensions())</p>
    </div>

    <div class="flex justify-center pt-12">
        <x-buttons.primary href="#">Descargar Catálogo</x-buttons.primary>
    </div>
</section>
<div class="relative">
    <section class="container mx-auto max-w-6xl py-10 md:py-12 space-y-10 px-5 md:px-0 relative z-20" id="related">
        <div class="text-center">
            <x-text.h2>Productos Relacionados</x-text.h2>
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
@endsection


