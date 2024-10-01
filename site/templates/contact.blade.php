@extends('layouts.default')
@section('content')
<section id="Portada">
    @if ($image = $page->cover()->toFile())
        <div class="bg-cover bg-center md:pt-36 pt-16 pb-8 md:pb-16 relative z-0" style="background-image: url({{ $image->url() }})">
            <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 relative z-20">
                <x-text.subtitle>{{ $site->title() }}</x-text.subtitle>
                <x-text.h1_light>{{ $page->title() }}</x-text.h1_light>
            </div>
            <div class="absolute w-full h-full inset-0 bg-gradient-to-r from-gray-800 to-transparent bg-blend-multiply z-10"></div>    
        </div>
    @endif
</section>
<section class="py-12 md:py-16 container max-w-6xl mx-auto">
    <div class="bg-stone-800 p-10 space-y-5 max-w-4xl mx-auto">
        <div class="space-y-5 text-center">
            <div class="flex justify-center">
                <x-text.subtitle_light>{{ $site->title() }}</x-text.subtitle_light>
            </div>
            <div class="text-white">
                <x-text.h2>{{ $page->heading() }}</x-text.h2>
            </div>
            <div class="prose text-white mx-auto">
                @kt($page->text())
            </div>
        </div>
        <div class="max-w-3xl mx-auto py-5">
            @include('partials.form')
        </div>
    </div>
</section>
<section class="py-16 bg-gray-100">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        <div class="space-y-5">
            <x-text.subtitle_light>FAQ</x-text.subtitle_light>
            <x-text.h2>Preguntas Frecuentes</x-text.h2>
            <div x-data="{ openTab: null }">
                @foreach ($page->faq()->toStructure() as $index => $item)
                    <div class="space-y-2 flex items-start space-x-5">
                        <div class="space-y-2 flex-grow">
                            <h4 class="font-bold text-stone-800 cursor-pointer flex items-center justify-between" @click="openTab === {{ $index }} ? openTab = null : openTab = {{ $index }}">
                                <span>
                                    {{ $item->question() }}
                                </span>
                                <i class="lni text-xl" :class="{'lni-chevron-down': openTab === {{ $index }}, 'lni-chevron-right': openTab !== {{ $index }}}"></i>
                            </h4>
                            <div x-show="openTab === {{ $index }}" class="overflow-hidden transition-all ease-in-out duration-300">
                                <x-text.body>{{ $item->answer() }}</x-text.body>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="bg-stone-800 p-10 space-y-5">
                <x-text.subtitle_light>Llámanos</x-text.subtitle_light>
                <h3 class="text-white text-xl">¿Necesitas ayuda? Obten una consulta</h3>
                <div>
                    <a href="">
                        <div class="flex space-x-5 items-center text-white">
                            <div class="flex items-center justify-center w-12 h-12 bg-stone-600 text-white rounded-full text-xl">
                                <i class="lni lni-phone"></i>
                            </div>
                            <div class="text-white">
                                Llama ahora<br>
                                <a class="hover:text-amber-400" href="tel:{{ $site->phone() }}">{{ $site->phone() }}</a> ó <a class="hover:text-amber-400" href="tel:{{ $site->phone2() }}">{{ $site->phone2() }}</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>        
    </div>
</section>

@endsection