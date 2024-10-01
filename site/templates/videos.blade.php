@extends('layouts.default')
@section('content')

<section class="py-16 mt-24">
    @foreach ($page->children()->listed() as $subpage)
    <div class="container max-w-6xl mx-auto px-5 md:px-0 space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
            <div class="relative w-full video" style="padding-bottom: 56.25%">
                    {!! video($subpage->videos()) !!}
            </div>
            <div class="space-y-5">
                <div class="space-y-5">
                    <x-text.h2>{{ $subpage->title() }}</x-text.h2>
                    <x-text.body>{!! $subpage->description()->kti() !!}</x-text.body>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

@endsection
