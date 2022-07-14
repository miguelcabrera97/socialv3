<x-app-layout>
    <div class="md:ml-56 lg:ml-56 xl:ml-80 grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3 xl:grid-cols-4 p-10 gap-6">
            
        @foreach ($templates as $template)
            {{-- <div class="{{$template->template_name}} transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-white duration-150 shadow-xl justify-items-center p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h1 class="text-center text-2xl m-1 font-light" >{{$template->template_name}}</h1>
                <img class="rounded-t-lg" src="{{$template->desktop_thumbnail_url}}" alt="">
               <div class="flex ">
                    <a class="m-2  items-center py-2 px-3 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" target="_blank" href="{{$template->preview_url}}">Preview</a>
                    <a target="_blank" class="m-2  items-center py-2 px-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  href="/crear/{{$template->template_id}}">Empieza a Crear</a>
                </div>
            

            </div> --}}

                <!--<div class="rounded-xl flex flex-col bg-white  w-full divide-y divide-gray-300 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-white duration-150 shadow-xl">

                    <div class=" p-2 ">
                        <h1 class="text-center text-2xl m-1 font-light" >{{$template->template_name}}</h1>
                    </div>

                    <div class="pt-2 ">
                        <img class="" src="{{$template->desktop_thumbnail_url}}" alt="">
                    </div>
                   
                    <div class="grid grid-cols-2 gap-4 p-2">
                        <a class="m-2  items-center py-2 px-3 text-sm text-center text-white bg-purple-700 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" target="_blank" href="{{$template->preview_url}}">Vista Previa</a>
                    <a target="_blank" class="m-2  items-center py-2 px-2 text-sm text-center text-white bg-purple-700 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  href="/crear/{{$template->template_id}}">Crear</a>
                    </div>

                </div>
                
                <div class="caja shadow-xl rounded-3xl max-w-lg max-h-full pt-4 pb-4 px-4">
                    <div class="w-full h-100">
                        <img class="" src="{{$template->desktop_thumbnail_url}}" alt="">
                        
                    </div>
                 
                   
                     <h2 class="capitalize font-semibold text-lg mt-3 mb-2 text-gray-900 text-center">{{$template->template_name}}</h2>
                    
                   
                  
                </div>-->
                {{-- CARD --}}
         <div class=" grid grid-cols-1  mt-3 h-4/6 ">
            <div class="flex  flex-col"> {{--  Flex --}}
 
                 {{-- Card Title--}}
                 <div class="  rounded-t-2xl bg-white h-1/6 w-full text-center  "> 
                     <p class="text-sm capitalize my-3">{{$template->template_name}}</p>
                     {{ Auth::user()->email }}
                 </div>
                  {{-- End Card Title--}}
                  
                 <div class="  h-full w-full relative ">
                     {{-- Botones de Creación y preview --}}
                     <div class="  absolute rounded-b-2xl  backdrop-blur-sm bg-black/50 h-full w-full opacity-0 hover:opacity-100 hover:ease-all hover:duration-300 ">
                         <div class="grid grid-cols-1 gap-1 justify-items-center" style="padding-top: 40%">
                            
                            <a target="_blank" class="m-2 w-3/5  items-center p-3 text-md text-center font-bold text-white bg-fuchsia-500 hover:bg-fuchsia-400 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  href="crear/{{$template->template_id}}/{{ Auth::user()->email }}">Empezar a Crear</a>
                            <a class="w-3/5 m-2  items-center p-3 text-md text-center text-white rounded-lg hover:underline-offset-8 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:underline" target="_blank" href="{{$template->preview_url}}">Vista Previa</a>
                                 
                         
                           
                         </div>  
                     </div>
                      {{-- END Botones de Creación y preview --}}
                     
                     {{-- background Image Div--}}
                     <div class="shadow-xl bg-cover bg-center rounded-b-2xl h-full w-full opacity-1 bg-white" >
                         <img class="rounded-t-3xl rounded-b-3xl" src="{{$template->desktop_thumbnail_url}}" alt="Imagen-Fondo" border="0">
                     </div>
                     {{-- END background Image Div--}}
 
                 </div>
            </div>{{-- End Flex --}}
         </div>
          {{--  END CARD --}}
                 
                 
                

                 
        @endforeach
    </div>


</x-app-layout>