@extends('layouts.default')
@section('content')
<section class="py-16">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 mt-5 md:mt-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20">
            @if ($page->video()->isNotEmpty())
                <div>
                    @if ($video = $page->video())
                        <div class="relative w-full video" style="padding-bottom: 56.25%">
                            {!! video($video) !!}
                        </div>
                    @endif
                </div>  
            @else            
                <div>
                    @if($image = $page->pics()->toFiles()->first())
                        <img class="w-full" src="{{ $image->url() }}" alt=""/>
                    @endif
                </div>
            @endif
            <div class="space-y-5">
                <x-text.h2>{{ $page->title() }}</x-text.h2>
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
                        <a href="{{ $pic->url() }}" data-fancybox="gallery" data-caption="{{ $page->title() }}">
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
        @if ($page->aplication()->isNotEmpty())
        <button @click="activeTab = 'tab1'"
            :class="{ 'bg-gray-300 text-tone-800 w-full border-b-gray-300': activeTab === 'tab1', 'bg-gray-100 text-stone-800 border border-t-gray-200 border-l-gray-200 border-r-gray-200 border-b-gray-100 w-full': activeTab !== 'tab1' }"
            class="px-4 py-2">Aplicaciones</button>
        @endif
        @if ($page->specs()->isNotEmpty())
        <button @click="activeTab = 'tab2'"
            :class="{ 'bg-gray-300 text-stone-800 w-full border-b-gray-100': activeTab === 'tab2', 'bg-gray-100 text-stone-800 border border-t-gray-200 border-l-gray-200 border-r-gray-200 border-b-gray-100 w-full': activeTab !== 'tab2' }"
            class="px-4 py-2">Características y Especificaciones</button>
        @endif
        @if ($page->dimensions()->isNotEmpty())
        <button @click="activeTab = 'tab3'"
            :class="{ 'bg-gray-300 text-stone-800 w-full border-b-gray-100': activeTab === 'tab3', 'bg-gray-100 text-stone-800 border border-t-gray-200 border-l-gray-200 border-r-gray-200 border-b-gray-100 w-full': activeTab !== 'tab3' }"
            class="px-4 py-2">Dimensiones</button>
        @endif
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
        <a href="/catalogo-powertugger.pdf" download>
            <x-buttons.primary>Descargar Catálogo</x-buttons.primary>
        </a>
    </div>
</section>
</div>

@endsection


