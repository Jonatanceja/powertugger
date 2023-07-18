<section class="px-5 md:px-0 space-y-5 py-12 md:py-16 bg-stone-100">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-10 pt-10 container max-w-6xl mx-auto ">
        <div class="space-y-3">
            <div class="bg-amber-400 text-white flex items-center justify-center w-16 h-16 rounded-full text-2xl">
                <i class="lni lni-rocket"></i>
            </div>
            <h4 class="text-2xl text-stone-800">Misión</h4>
            <x-text.body>{{ $page->mission() }}</x-text.body>
        </div>
        <div class="space-y-3">
            <div class="bg-amber-400 text-white flex items-center justify-center w-16 h-16 rounded-full text-2xl">
                <i class="lni lni-target"></i>
            </div>
            <h4 class="text-2xl text-stone-800">Visión</h4>
            <x-text.body>{{ $page->vision() }}</x-text.body>
        </div>
        <div class="space-y-3">
            <div class="bg-amber-400 text-white flex items-center justify-center w-16 h-16 rounded-full text-2xl">
                <i class="lni lni-cup"></i>
            </div>
            <h4 class="text-2xl text-stone-800">Valores</h4>
            <x-text.body>{{ $page->values() }}</x-text.body>
        </div>
    </div>
</section>