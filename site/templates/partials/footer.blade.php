<footer class="bg-stone-800 py-12 md:py-16">
    <div class="container mx-auto max-w-6xl grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-20">
        <div class="text-white prose">
            {{ $site->description() }}
        </div>
        <div>
            <h3 class="text-white font-bold mb-4">Navegación</h3>
            <ul class="text-white">
                @foreach($site->children()->listed() as $subpage)
                    <li class="mb-2 transition transform hover:translate-x-2">
                        <a class="" href="{{ $subpage->url() }}" class="text-white hover:text-stone-100">
                            {{ $subpage->title() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3 class="text-white font-bold mb-4">Empresas</h3>
            <ul class="text-white">
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
    <div class="text-white text-center px-5 mt-10">
        Todos los derechos reservados © {{{ $site->title() }}} 2022 | <a class="font-bold hover:text-amber-400 transition" href="{{ $site->url() }}/aviso-de-privacidad">Aviso de privacidad</a> | <a class="font-bold hover:text-amber-400 transition" href="{{ $site->url() }}/terminos-y-condiciones">Términos y condiciones</a>
    </div>
</footer>