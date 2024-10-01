@extends('layouts.default')
@section('content')

<section class="min-h-screen container max-w-6xl mx-auto py-10 md:py-20 space-y-5">
    <div class="mt-24 font-bold font-2xl md:text-3xl"><h1>{{ $page->heading() }}</h1></div>
    <x-text.body>{!! $page->text()->kt() !!}</x-text.body>
    @if ($file = $page->download()->toFile())
    <a href="{{ $file->url() }}" download=""><x-buttons.primary>Descargar Catálogo</x-buttons.primary></a>
    @endif
    
</section>

@endsection