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

                <div class="rounded-xl flex flex-col bg-white  w-full divide-y divide-gray-300 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-white duration-150 shadow-xl">

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
                    
                

             
        @endforeach
    </div>


</x-app-layout>