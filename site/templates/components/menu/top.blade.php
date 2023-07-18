@php
    $site = site();
@endphp

<div class="bg-white py-3 hidden md:block">
    <div class="container mx-auto px-5 md:px-0 grid grid-cols-5 items-center">
        <div>
            <div class="items-center w-1/2 text-white mr-6 block">
                <a href="{{ $site->url() }}">
                <img class="w-44" src="/images/logo.svg" alt="Powertugger">
                </a>
            </div>
        </div>
        <div class="flex space-x-5 items-center">
            <div class="flex items-center justify-center w-12 h-12 bg-amber-400 text-white rounded-full text-xl">
                <i class="lni lni-timer"></i>
            </div>
            <div class="text-xs text-stone-800">
                Horarios de atención:<br>
                {{ $site->schedule() }}
            </div>
        </div>
        <a href="mailto:{{ $site->email() }}">
            <div class="flex space-x-5 items-center">
                <div class="flex items-center justify-center w-12 h-12 bg-amber-400 text-white rounded-full text-xl">
                    <i class="lni lni-envelope"></i>
                </div>
                <div class="text-xs text-stone-800">
                    Email<br>
                    {{ $site->email() }}
                </div> 
            </div>
        </a>
        <a href="tel:{{ $site->phone() }}">
            <div class="flex space-x-5 items-center">
                <div class="flex items-center justify-center w-12 h-12 bg-amber-400 text-white rounded-full text-xl">
                    <i class="lni lni-phone"></i>
                </div>
                <div class="text-xs text-stone-800">
                    Contáctanos<br>
                    {{ $site->phone() }}
                </div>
            </div>
        </a>
        <a href="tel:{{ $site->phone2() }}">
            <div class="flex space-x-5 items-center">
                <div class="flex items-center justify-center w-12 h-12 bg-amber-400 text-white rounded-full text-xl">
                    <i class="lni lni-phone"></i>
                </div>
                <div class="text-xs text-stone-800">
                    Contáctanos<br>
                    {{ $site->phone2() }}
                </div>
            </div>
        </a>
    </div>
</div>