@extends('layouts.default')
@section('content')

@php
    // Obtener todas las categorías únicas de los productos
    $categories = $page->children()->pluck('category', ',', true);

    // Obtener los productos listados
    $products = $page->children()->listed();

    // Aplicar el filtro de categoría si existe
    if ($category = param('category')) {
        $products = $products->filterBy('category', $category, ',');
    }

    // Paginar los productos
    $products = $products->paginate(24);
    $pagination = $products->pagination();
@endphp

<section class="mt-24 mb-12 md:mt-40 md:mb-16 min-h-screen">
    <div class="container mx-auto px-5 md:px-0">
        <div class="mb-5 md:mb-10">
            <h2 class="text-xl md:text-3xl font-bold text-stone-700">{{ $page->title() }} 
                @if($category) 
                    <span class="text-base">({{ str_replace('-', ' ', $category) }})</span>
                @endif 
            </h2>
        </div>

        <!-- Productos filtrados -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-10"> 
            @foreach ($products as $product)
                <a href="{{ $product->url() }}">
                    <div class="space-y-3 wow fadeInUp relative transition transform hover:scale-105">
                        <div class="bg-white h-96 shadow-sm hover:shadow-md flex items-center">
                            @if ($image = $product->pics()->toFile())
                                <img class="mx-auto w-full" src="{{ $image->url() }}" alt="Producto">
                            @endif
                        </div>
                        <div class="absolute w-full bottom-0 pt-6 pb-3 px-5 bg-gradient-to-t from-stone-900 to-transparent">
                            <h3 class="font-bold text-sm text-white">{{ $product->title() }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Paginación -->
        @if ($pagination->hasPages())
            <nav class="grid grid-cols-2 gap-5 mt-10 pagination">
                <div class="flex justify-start">
                    @if ($pagination->hasPrevPage())
                        <a class="next" href="{{ $pagination->prevPageURL() }}"><i class="lni lni-arrow-left"></i> Página anterior</a>
                    @endif
                </div>
                <div class="flex justify-end">
                    @if ($pagination->hasNextPage())
                        <a class="prev" href="{{ $pagination->nextPageURL() }}">Siguiente página <i class="lni lni-arrow-right"></i></a>
                    @endif
                </div>
            </nav>
        @endif
    </div>
</section>

@endsection
