@extends('layouts.default')
@section('content')


@php
    $products = $page->children()->listed();

    $products = match(true) {
    !empty(param('category')) => $products->filterBy('category', param('category'), ','),
    !empty(param('brand')) => $products->filterBy('brand', param('brand'), ','),
    default => $products
};

    $filter = match(true) {
    !empty(param('category')) => param('category'),
    !empty(param('brand')) => param('brand'),
    default => null
};

    $products = $products->paginate(24);
    $pagination = $products->pagination();
@endphp

<section class="mt-24 mb-12 md:mt-40 md:mb-16 min-h-screen">
  <div class="container mx-auto px-5 md:px-0">
      <div class="mb-5 md:mb-10">
          <h2 class="text-xl md:text-3xl font-bold text-stone-700">{{ $page->title() }} @if($filter) <span class="text-base">({{ $filter }})</span> @endif </h2>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-10"> 
          @foreach ($products as $product)
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
          
      </div>
      @if ($pagination->hasPages())
      <nav class="grid grid-cols-2 gap-5 mt-10 pagination">

        <div class="flex justify-start">
            <?php if ($pagination->hasPrevPage()): ?>
            <a class="next" href="<?= $pagination->prevPageURL() ?>"><i class="lni lni-arrow-left"></i> Página anterior</a>
            <?php endif ?>
        </div>
        <div class="flex justify-end">
            <?php if ($pagination->hasNextPage()): ?>
            <a class="prev" href="<?= $pagination->nextPageURL() ?>">Siguiente página <i class="lni lni-arrow-right"></i></a>
            <?php endif ?>
        </div>

      </nav>
      @endif
  </div>
  
</section>

@endsection

