<header class="block fixed w-full z-50 top-0">
    <x-menu.top />
    <nav class="flex items-center py-5 md:py-0 px-5 md:px-0" x-data="{ isOpen: false }"
        @keydown.escape="isOpen = false" :class="{ 'shadow-md md:bg-black bg-white' : isOpen , 'md:bg-black/90 bg-white shadow-sm' : !isOpen}">
        
        <div class="container mx-auto">
            <div class="flex">
                <!-- Logo etc -->
                <div class="md:hidden items-center w-full mr-6">
                    <a href="{{ $site->url() }}">
                        <img class="w-32 md:w-44" src="/images/logo.svg" alt="Powertugger">
                    </a>
                </div>
                <div class="flex w-full justify-end items-center">
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

                <ul class="md:pt-0 list-reset md:flex justify-start md:flex-1 items-start mt-10 md:mt-0">
                    @foreach ($site->children()->listed() as $subpage)
                        <div x-data="{ open: false }" class="block">
                            <button @click="open = !open" class="block pl-3 pr-9 text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase relative">
                                @if ($subpage->slug() === 'productos')
                                    <span class="inline-block text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase text-sm" @click="isOpen = false">{{ $subpage->title() }}</span>
                                    <i class="lni lni-chevron-down" x-show="!open"></i>
                                    <i class="lni lni-chevron-up" x-show="open"></i>
                                @elseif ($subpage->slug() === 'industrias')
                                    <span class="inline-block text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase text-sm" @click="isOpen = false">{{ $subpage->title() }}</span>
                                    <i class="lni lni-chevron-down" x-show="!open"></i>
                                    <i class="lni lni-chevron-up" x-show="open"></i>
                                @else
                                    <a class="inline-block text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase text-sm" href="{{ $subpage->url() }}" @click="isOpen = false">{{ $subpage->title() }}</a>
                                @endif
                            </button>
                            <!-- Megamenu -->
                            <div x-show="open" @click.away="open = false" class="z-50 w-full md:shadow-md text-stone-800 md:text-white">
                                <div class="md:grid md:grid-cols-4 gap-20 md:absolute md:bg-black/90 md:inset-x-0 md:px-10 pb-2 md:py-10">
                                    @if ($subpage->slug() === 'productos')
                                        <div class="md:block text-sm space-y-2">
                                            <p class="inline-block text-sm no-underline uppercase font-bold ml-1 md:ml-0">Categorías</p>
                                            <x-menu.categories />
                                        </div>
                                        @foreach ($site->products()->toPages() as $product)
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
                                    @elseif ($subpage->slug() === 'industrias')
                                        <div class="md:block text-sm space-y-2">
                                            <p class="inline-block no-underline uppercase font-bold ml-1 md:ml-0">Industrias</p>
                                            <ul class="space-y-2">
                                                <li><a href="{{ $subpage->url() }}" class="text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase list-none text-sm ml-2 md:ml-0">{{ $subpage->title() }}</a></li>
                                                @foreach ($subpage->children()->listed() as $subpage)
                                                    <li><a href="{{ $subpage->url() }}" class="text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase list-none text-sm ml-2 md:ml-0">{{ $subpage->title() }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @foreach ($site->industries()->toPages() as $industry)
                                            <div class="space-y-3">
                                                @if ($image = $industry->image_1()->toFile())
                                                    <a href="{{ $industry->url() }}">
                                                        <img class="w-full" src="{{ $image->crop(600, 400)->url() }}" alt="">
                                                    </a>
                                                    <h4 class="text-2xl text-white">{{ $industry->title() }}</h4>
                                                    <p class="text-white">{{ $industry->short() }}</p>
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
                <div class="block md:flex justify-center md:justify-end items-center md:space-x-5 space-y-5 md:space-y-0 bg-black">
                    <div class="flex items-center space-x-5 justify-center md:justify-end">
                        <div class="text-amber-400 text-2xl transform transition md:hover:scale-110">
                            <a class="" href="{{ $site->facebook() }}" target="blank"><i class="lni lni-facebook-original"></i></a>
                        </div>
                        <div class="text-amber-400 text-2xl transform transition md:hover:scale-110">
                            <a class="" href="{{ $site->instagram() }}" target="blank"><i class="lni lni-instagram-original"></i></a>
                        </div>
                    </div>
                    <div class="flex justify-center md:justify-end">
                        <x-buttons.primary>
                            <a href="/contacto" 
                               onclick="gtag('event', 'conversion', { 'send_to': 'AW-CONVERSION_ID/CONVERSION_LABEL' });">
                                Solicitar un Presupuesto
                            </a>
                        </x-buttons.primary>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
