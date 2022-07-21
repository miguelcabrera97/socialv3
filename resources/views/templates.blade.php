<x-app-layout>
    <div class="md:ml-56 lg:ml-56 xl:ml-80 grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3 xl:grid-cols-4 p-10 gap-6">
        @php
        $cont = 0;
         @endphp     
        @foreach ($templates as $template)
            
         
                {{-- CARD --}}
         <div class=" grid grid-cols-1  mt-3 h-4/6" id="template_list">
            <div class="flex  flex-col"> {{--  Flex --}}
 
                 {{-- Card Title--}}
                 
                  {{-- End Card Title--}}
                  
                 <div class="  h-full w-full relative ">
                     {{-- Botones de Creación y preview --}}
                     <div class="  absolute rounded-b-2xl  backdrop-blur-sm bg-black/50 h-full w-full opacity-0 hover:opacity-100 hover:ease-all hover:duration-300 ">
                         <div class="grid grid-cols-1 gap-1 justify-items-center" style="padding-top: 40%">

                           {{-- <input type="submit" class="m-2 w-3/5  items-center p-3 text-md text-center font-bold text-white bg-fuchsia-500 hover:bg-fuchsia-400 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Empezar a crear" onclick="CrearSitio('{{$cont+1}}')" >  --}}
                           
                           <div class="flex items-center justify-center h-full">
                            <button class="py-2 px-4 bg-fuchsia-500 text-white rounded hover:bg-fuchsia-700" onclick="toggleModal({{$template->template_id}})">Empezar a Crear</button>
                          </div>
                           
                           {{-- <a target="_blank" class="m-2 w-3/5  items-center p-3 text-md text-center font-bold text-white bg-fuchsia-500 hover:bg-fuchsia-400 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  href="crears/{{$template->template_id}}/{{Auth::user()->email}}">Empezar a Crear</a>  --}}
                            
                            <a class="w-3/5 m-2  items-center p-3 text-md text-center text-white rounded-lg hover:underline-offset-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:underline" target="_blank" href="{{$template->preview_url}}">Vista Previa</a>
                            {{-- <input type="text" name="{{$template->template_name}}"  id="template{{$cont}}" value="template{{$cont}}"> --}}
                         </div>  
                     </div>
                      {{-- END Botones de Creación y preview --}}
                     
                     {{-- background Image Div--}}
                     <div class=" bg-cover bg-center  h-full w-full opacity-1 bg-white" >
                         <img class="rounded-t-3xl " src="{{$template->desktop_thumbnail_url}}" alt="Imagen-Fondo" border="0">
                     </div>
                     
                     

                     {{-- END background Image Div--}}
                     
                 </div>
                 <div class="rounded-b-2xl bg-white w-full text-center  py-2"> 
                        <p class="text-sm capitalize">{{$template->template_name}}</p>
                       

                        
                </div>
                       
                       
                       
                       
                       

            </div>{{-- End Flex --}}
         </div>
          {{--  END CARD --}}
                 
                 
                
         @php
           $cont = $cont + 1;
         @endphp
                 
        @endforeach
         

    </div>

    <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
        <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />
          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
          <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <label> Nombre del sitio</label>
              <form action="{{route('crear')}}" method="POST">
                @csrf
                 <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" name="nombre" id="nombresite" />
                @error('nombre')
                  <br>
                  <small>{{$message}}</small>
                  <br>
                @enderror
                 <input type="hidden" class="w-full bg-gray-100 p-2 mt-2 mb-3" name="template_id" id="templateid"/>
                 <input type="hidden" class="w-full bg-gray-100 p-2 mt-2 mb-3" name="user" id="emailuser" value="{{Auth::user()->email}}" /> 
                 <button type="button" class="m-2 items-center p-3 text-md text-center font-bold bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancelar</button>
                 <input type="submit" id="CrearSitio" class="m-2  items-center p-3 text-md text-center font-bold text-white bg-fuchsia-500 hover:bg-fuchsia-400 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Crear mi Sitio" >
              </form>
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
              
              
            </div>
          </div>
        </div>
      </div>

  <script>
   function toggleModal(id) {
        document.getElementById('modal').classList.toggle('hidden')
        document.getElementById("templateid").value = id;
    }
  </script>
   

</x-app-layout> 