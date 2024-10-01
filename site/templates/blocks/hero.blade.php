<section class="overflow-hidden bg-zinc-800 mt-16" id="hero">
    @if ($video = $page->video()->toFile())
        <div class="grid grid-cols-1 pt-6 md:pt-14 md:grid-cols-5 gap-10 md:gap-0 items-center">
            <div class="p-5 md:px-10 text-white text-left col-span-2 flex items-center">
                <div class="space-y-5">
                    <img class="w-56" src="/images/Logo-light.svg" alt="Logo">
                    <x-text.h1_light>{{ $page->heading() }}</x-text.h1_light>
                    <p class="text-white text-sm md:text-base tracking-wider">{{ $page->text() }}</p>
                    <div class="md:space-x-5 space-y-5 md:space-y-0 space-x-0 block md:flex">
                        @foreach ($page->buttons()->toStructure() as $button)
                            @if ($button->secondary()->bool())
                                {{-- Componente para botón secundario --}}
                                <div>
                                    <a href="{{ $button->link() }}">
                                        <x-buttons.secondary>
                                            {{ $button->text() }}
                                        </x-buttons.secondary>
                                    </a>
                                </div>
                            @else
                                {{-- Componente para botón primario --}}
                                <div>
                                    <a href="{{ $button->link() }}">
                                        <x-buttons.primary>
                                            {{ $button->text() }}
                                        </x-buttons.primary>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>   
            <div class="col-span-3 relative">
                <video class="z-0 w-full md:h-auto md:max-w-none" autoplay muted loop playsinline>
                    <source src="{{ $video->url() }}" type="video/mp4">
                </video>
            </div> 
        </div>

    @endif
</section>