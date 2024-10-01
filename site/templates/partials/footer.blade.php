<footer class="bg-stone-800 py-12 md:py-16">
    <div class="container mx-auto md:max-w-6xl grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-20 px-5">
        <div class="space-y-5 col-span-1">
            <img class="w-44 md:w-56" src="/images/Logo-light.svg" alt="">
            <div class="text-white prose">
                {{ $site->description() }}
            </div>
            <div class="block md:flex items-center md:space-x-5 space-y-5 md:space-y-0">
                <div class="flex items-center space-x-5">
                    <div class="text-amber-400 text-2xl transform transition md:hover:scale-110">
                        <a class="" href="{{ $site->facebook() }}" target="blank"><i class="lni lni-facebook-original"></i></a>
                    </div>
                    <div class="text-amber-400 text-2xl transform transition md:hover:scale-110">
                        <a class="" href="{{ $site->instagram() }}" target="blank"><i class="lni lni-instagram-original"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <h3 class="text-white font-bold mb-4">Navegación</h3>
            <ul class="text-white text-sm">
                @foreach($site->children()->listed() as $subpage)
                    <li class="mb-2 transition transform hover:translate-x-2">
                        <a class="" href="{{ $subpage->url() }}" class="text-white hover:text-stone-100">
                            {{ $subpage->title() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-span-1 md:col-span-2">
            <h3 class="text-white font-bold mb-4">Empresas</h3>
            <ul class="text-white text-sm">
                @foreach(page('industrias')->children()->listed() as $subpage)
                    <li class="mb-2 transition transform hover:translate-x-2">
                        <a href="{{ $subpage->url() }}" class="text-white hover:text-stone-100">
                            {{ $subpage->title() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="text-white text-center px-5 mt-10 text-sm">
        Todos los derechos reservados © {{{ $site->title() }}} {{ date("Y") }}  | <a class="font-bold hover:text-amber-400 transition" href="{{ $site->url() }}/aviso-de-privacidad">Aviso de privacidad</a> | <a class="font-bold hover:text-amber-400 transition" href="{{ $site->url() }}/terminos-y-condiciones">Términos y condiciones</a>
    </div>
</footer>