<section class="relative flex items-center justify-center h-screen overflow-hidden" id="hero">
    @if ($video = $page->video()->toFile())
        <div class="relative z-30 p-5 text-white rounded-xl container mx-auto text-left space-y-5">
            <x-text.h1_light>{{ $page->heading() }}</x-text.h1_light>
            <p class="text-white max-w-2xl md:text-lg tracking-wider" style="text-shadow: 2px 2px 4px #000;">{{ $page->text() }}</p>
            <div class="md:space-x-5 space-x-2">
                @foreach ($page->buttons()->toStructure() as $button)
                    @if ($button->secondary()->bool())
                        {{-- Componente para botón secundario --}}
                        <a href="{{ $button->link() }}">
                            <x-buttons.secondary>
                                {{ $button->text() }}
                            </x-buttons.secondary>
                        </a>
                    @else
                        {{-- Componente para botón primario --}}
                        <a href="{{ $button->link() }}">
                            <x-buttons.primary>
                                {{ $button->text() }}
                            </x-buttons.primary>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>        
        <video class="absolute z-10 w-auto min-w-full min-h-full max-w-none" autoplay muted loop playsinline>
            <source src="{{ $video->url() }}" type="video/mp4">
        </video>
    @endif
</section>