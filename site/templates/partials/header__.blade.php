<header class="block fixed w-full z-50 top-0">
    <x-menu.top />
    <nav class="flex items-center py-5 md:py-0 px-5 md:px-0" x-data="{ isOpen: false }"
        @keydown.escape="isOpen = false" :class="{ 'shadow-md md:bg-black bg-white' : isOpen , 'md:bg-black/90 bg-white shadow-sm' : !isOpen}" x-cloak>
        
        <div class="w-screen px-5">
            <div class="flex">
                <!-- Logo etc -->
                <div class="md:hidden items-center w-full mr-6">
                    <a href="{{ $site->url() }}">
                        <img class="w-32 md:w-44" src="/images/logo.svg" alt="Powertugger">
                    </a>
                </div>
                <div class="flex w-full justify-end items-end">
                    <!-- Toggle button (hidden on large screens) -->
                    <button @click="isOpen = !isOpen" type="button" class="block md:hidden px-2 text-stone-800 hover:text-amber-400 focus:outline-none text-2xl" :class="{ 'transition transform-180': isOpen }">
                        <span class="hidden">Menu</span>
                        <i class="lni lni-menu" x-show="!isOpen"></i>
                        <i class="lni lni-close" x-show="isOpen"></i>
                    </button>
                </div>
            </div>

            <!-- Menu -->
            <div class="w-full md:flex md:items-center md:h-auto overflow-y-scroll overflow-x-hidden" :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false" x-show.transition="true">

                <ul class="md:pt-0 list-reset md:flex justify-start md:flex-1 items-start mt-10 md:mt-0 space-y-3 md:space-y-0">
                    @foreach ($site->children()->listed() as $subpage)
                        <div x-data="{ open: false }" class="block">
                            <button @click="open = !open" class="block pl-3 pr-9 text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase relative">
                                @if ($subpage->slug() === 'industrias')
                                    <span class="inline-block text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase text-sm" @click="isOpen = false">{{ $subpage->title() }}</span>
                                    <i class="lni lni-chevron-down" x-show="!open"></i>
                                    <i class="lni lni-chevron-up" x-show="open"></i>
                                @else
                                    <a class="inline-block text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase text-sm" href="{{ $subpage->url() }}" @click="isOpen = false">{{ $subpage->title() }}</a>
                                @endif
                            </button>
                            <!-- Megamenu -->
                            <div x-show="open" @click.away="open = false" class="z-50 w-full md:shadow-md text-stone-800">
                                <div class="md:grid md:grid-cols-4 gap-20 md:absolute md:bg-stone-100 md:inset-x-0 top-32 md:px-10 pb-2 md:py-10">
                                    @if ($subpage->slug() === 'industrias')
                                        <div class="md:block text-sm space-y-2">
                                            <p class="inline-block no-underline uppercase font-bold ml-1 md:ml-0">Industrias</p>
                                            <ul class="space-y-2">
                                                <li><a href="{{ $subpage->url() }}" class="text-stone-800 no-underline hover:text-amber-400 uppercase list-none text-sm ml-2 md:ml-0">{{ $subpage->title() }}</a></li>
                                                @foreach ($subpage->children()->listed() as $subpage)
                                                    <li><a href="{{ $subpage->url() }}" class="text-stone-800 no-underline hover:text-amber-400 uppercase list-none text-sm ml-2 md:ml-0">{{ $subpage->title() }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @foreach ($site->industries()->toPages() as $industry)
                                            <div class="space-y-3">
                                                @if ($image = $industry->image_1()->toFile())
                                                    <a href="{{ $industry->url() }}">
                                                        <img class="w-full" src="{{ $image->crop(600, 400)->url() }}" alt="">
                                                    </a>
                                                    <h4 class="text-2xl text-stone-800">{{ $industry->title() }}</h4>
                                                    <p class="text-stone-800">{{ $industry->short() }}</p>
                                                    <div>
                                                        <a class="text-amber-400 hover:underline" href="{{ $industry->url() }}">
                                                            Ver soluciones <span><i class="lni lni-arrow-right"></i></span>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
                <div class="block md:flex justify-center md:justify-end items-center md:space-x-5 space-y-5 md:space-y-0 py-1 mt-5 md:mt-0">
                    <div class="flex items-center space-x-5 justify-center md:justify-end">
                        <div class="text-amber-400 text-2xl transform transition md:hover:scale-110">
                            <a class="" href="{{ $site->facebook() }}" target="blank"><i class="lni lni-facebook-original"></i></a>
                        </div>
                        <div class="text-amber-400 text-2xl transform transition md:hover:scale-110">
                            <a class="" href="{{ $site->instagram() }}" target="blank"><i class="lni lni-instagram-original"></i></a>
                        </div>
                        <div class="flex md:block justify-center">
                            <a href="/contacto"><x-buttons.primary>Solicita un presupuesto</x-buttons.primary></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
