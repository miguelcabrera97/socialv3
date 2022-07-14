<div class="bg-gray-100 flex shadow-sm p-6 sticky top-0">
    <nav class="flex items-center justify-between flex-wrap flex-grow">
        <div class="flex items-center flex-shrink-0">
          <span class="font-semibold text-xl tracking-tight">Social Conecta</span>
        </div>
        <div class="ml-3 relative">
          <x-jet-dropdown align="right" width="48">
              <x-slot name="trigger">
                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                      <button class="flex text-md border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                          <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                      </button>
                  @else
                      <span class="inline-flex rounded-md">
                          <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                              {{ Auth::user()->name }}

                              <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                          </button>
                      </span>
                  @endif
              </x-slot>

              <x-slot name="content">
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                      {{ __('Manage Account') }}
                  </div>

                  <x-jet-dropdown-link href="{{ route('profile.show') }}">
                      {{ __('Profile') }}
                  </x-jet-dropdown-link>

                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                      <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                          {{ __('API Tokens') }}
                      </x-jet-dropdown-link>
                  @endif

                  <div class="border-t border-gray-100"></div>

                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}" x-data>
                      @csrf

                      <x-jet-dropdown-link href="{{ route('logout') }}"
                               @click.prevent="$root.submit();">
                          {{ __('Log Out') }}
                      </x-jet-dropdown-link>
                  </form>
              </x-slot>
          </x-jet-dropdown>
      </div>
        <div class="block md:hidden">
          <button id="boton" class="flex items-center px-3 py-2 border rounded ">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
          </button>
        </div>
        <div id="menu" class="w-full block lg:hidden flex-grow lg:flex lg:items-center lg:w-auto hidden">
          <div class="text-sm lg:flex-grow">
            <a href="{{route('home')}}" class="block mt-4 lg:inline-block lg:mt-0  mr-4">
              Inicio
            </a>
            <a href="{{route('crearsitio')}}" class="block mt-4 lg:inline-block lg:mt-0  mr-4">
              Crear Sitio
            </a>
            <a href="{{ route('profile.show') }}" class="block mt-4 lg:inline-block lg:mt-0 ">
              Perfil
            </a>
          </div>
          
        </div>


        
    </nav>
    
</div>

<script>
    const boton = document.querySelector('#boton');
    const menu = document.querySelector('#menu');

    boton.addEventListener('click', ()=> {
        menu.classList.toggle('hidden')
    } )

</script>