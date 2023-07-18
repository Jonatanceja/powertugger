<section class="py-12 md:py-16 bg-stone-800 px-5 md:px-0 space-y-5" id="form">
    <div class="container max-w-6xl mx-auto px-5 md:px-0 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">
        <div class="space-y-5">
            <x-text.subtitle_light>{{ $page->heading() }}</x-text.subtitle_light>
            <div class="text-white">
                <x-text.h2>{{ $page->subtitle() }}</x-text.h2>
            </div>
            <div class="prose text-white">
                @kt($page->text())
            </div>
        </div>
        <div>
            <form class="" method="POST" action="/home">
                <div class="block md:flex md:space-x-5">
                    <div class="mb-4 w-full">
                        <label class="block text-stone-200 text-sm font-bold mb-2" for="nombre">
                          Nombre
                        </label>
                        <input class="w-full border border-stone-200 py-2 px-3 text-stone-200 leading-tight focus:outline-none focus:border-stone-600 bg-transparent" id="nombre" name="nombre" type="text" placeholder="Nombre">
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block text-stone-200 text-sm font-bold mb-2" for="correo">
                          Correo electrónico
                        </label>
                        <input class="w-full border border-stone-200 py-2 px-3 text-stone-200 leading-tight focus:outline-none focus:border-stone-600 bg-transparent" id="correo" name="correo" type="email" placeholder="Correo electrónico">
                    </div>
                </div>
                <div class="block md:flex md:space-x-5">
                    <div class="mb-4 w-full">
                        <label class="block text-stone-200 text-sm font-bold mb-2" for="telefono">
                          Teléfono
                        </label>
                        <input class="w-full border border-stone-200 py-2 px-3 text-stone-200 leading-tight focus:outline-none focus:border-stone-600 bg-transparent" id="telefono" name="telefono" type="text" placeholder="Teléfono">
                      </div>
                      <div class="mb-6 w-full">
                        <label class="block text-stone-200 text-sm font-bold mb-2" for="empresa">
                          Empresa
                        </label>
                        <input class="w-full border border-stone-200 py-2 px-3 text-stone-200 leading-tight focus:outline-none focus:border-stone-600 bg-transparent" id="empresa" name="empresa" type="text" placeholder="Empresa">
                      </div>
                      
                </div>
                <div class="block md:flex md:space-x-5">
                  <div class="mb-4 w-full">
                      <label class="block text-stone-200 text-sm font-bold mb-2">Producto de interés</label>
                      <div class="relative">
                          <select class="block appearance-none w-full border border-stone-200 py-2 px-3 text-stone-200 leading-tight focus:outline-none focus:border-stone-600 bg-transparent">
                              <option disabled selected>Selecciona un producto</option>
                              <option value="CartCaddy">CartCaddy</option>
                              <option value="TrailerCaddy">TrailerCaddy</option>
                              <option value="TruckCaddy">TruckCaddy</option>
                              <option value="AircraftCaddy">AircraftCaddy</option>
                              <option value="RailCaddy">RailCaddy</option>
                              <option value="WagonCaddy">WagonCaddy</option>
                              <option value="TowFleXX">TowFleXX</option>
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-stone-600">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                  <path d="M0 0h20v20H0z" fill="none"/>
                                  <path d="M7 10l5 5 5-5z"/>
                              </svg>
                          </div>
                      </div>
                  </div>
                  <div class="mb-6 w-full">
                      <label class="block text-stone-200 text-sm font-bold mb-2">Aplicación de uso</label>
                      <div class="relative">
                          <select class="block appearance-none w-full border border-stone-200 py-2 px-3 text-stone-200 leading-tight focus:outline-none focus:border-stone-600 bg-transparent">
                              <option disabled selected>Selecciona una aplicación</option>
                              <option value="Trailer">Trailer</option>
                              <option value="Automovil">Automovil</option>
                              <option value="Aviones">Aviones</option>
                              <option value="Industrial">Industrial</option>
                              <option value="Hospitalario">Hospitalario</option>
                              <option value="Trenes">Trenes</option>
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-stone-600">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                  <path d="M0 0h20v20H0z" fill="none"/>
                                  <path d="M7 10l5 5 5-5z"/>
                              </svg>
                          </div>
                      </div>
                  </div>
              </div>
              
              
                <div class="flex items-center">
                  <x-buttons.primary type="submit">Enviar</x-buttons.primary>
                </div>
              </form>
        </div>
    </div>
</section>
@if ($image = $page->pic()->toFile())
<div class="bg-cover bg-center h-56 md:h-96" style="background-image: url({{ $image->url() }})"></div>
@endif