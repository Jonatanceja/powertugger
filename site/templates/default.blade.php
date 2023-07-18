@extends('layouts.default')
@section('content')

<section class="py-12 md:py-16 container mx-auto max-w-6xl ox-5 md:px-0 space-y-5 mt-24">
    <x-text.h1>{{ $page->title() }}</x-text.h1>
    <div class="prose prose-stone min-w-full">
        @kt($page->text())
    </div>
</section>

@endsection
