<div class="bg-gray-100 flex shadow-sm p-6 sticky top-0">
    <nav class="flex items-center justify-between flex-wrap flex-grow">
        <div class="flex items-center flex-shrink-0">
          <span class="font-semibold text-xl tracking-tight">Social Conecta</span>
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