<x-app-layout>
    <div class="md:ml-56 lg:ml-56 xl:ml-80 grid grid-cols-1 p-10">
        
    

        {{-- <table class="table-fixed">
            <thead>
                <tr>
                    <th>Nombre</th>
                    
                    <th>ID</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sitios as $site)
                    <tr>
                        <td>Nombre</td>
                        
                        <td>{{$site->site_name}}</td>
                        
                        <td><a href="/editar/{{Auth::user()->email}}/{{$site->site_name}}">Editar</a>
                            
                        </td>
                        
                        <td>
                            <form action="{{route('resetear')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$site->site_name}}" name="id">
                                <input type="submit" value="Resetear">
                            </form>
                        </td>
                        
                        <td>
                            <a href="/delete/{{$site->site_name}}">Borrar Sitio</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        <div class="rounded-md w-full">
                <div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            id
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Created at
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sitios as $site)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="flex items-center">
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                Sitio
                                                            </p>
                                                        </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{$site->site_name}}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Jan 21, 2020
                                                </p>
                                            </td>
                                            
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <a href="/editar/{{Auth::user()->email}}/{{$site->site_name}}">Editar</a><br><br>
                                                <form action="{{route('resetear')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$site->site_name}}" name="id">
                                                    <input type="submit" value="Resetear">
                                                </form> <br>

                                                <a href="/delete/{{$site->site_name}}">Borrar Sitio</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>

</x-app-layout>