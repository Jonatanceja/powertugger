@extends('layouts.default')
@section('content')

@foreach($page->children()->listed() as $part)
@include('blocks.' . $part->intendedTemplate(), ['page' => $part])
@endforeach


<section class="py-12 md:py-16 container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
    <x-text.subtitle_light>Distribuimos</x-text.subtitle_light>
    <x-text.h2>Las mejores marcas</x-text.h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-20 items-center">
            @foreach (page('home')->children()->filterBy('slug', 'logos')->first()->logos()->toFiles() as $item)
                <img class="max-h-36 max-w mx-auto" src="{{ $item->url() }}" alt="">
            @endforeach            
        </div>
</section>

@endsection