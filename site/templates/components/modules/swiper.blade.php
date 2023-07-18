<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      {{ $slot }}
    </div>
    <div class="swiper-pagination"></div>
</div>


@once
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          // Configuración para dispositivos móviles
          640: {
            slidesPerView: 2,
          },
        },
      });
    </script>    
    @endpush
@endonce
@once
    @push('styles')
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    @endpush
@endonce
