<x-app-layout>
    <div class="md:ml-56 lg:ml-56 xl:ml-80 grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3 xl:grid-cols-4 p-10 gap-6">
        
    

        <table class="table-auto">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                    <th>ID</th>
                    <th></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <Tbody>
                
                @foreach ($sitios as $site)
                    <tr>
                        <td>Nombre</td>
                        <td></td>
                        <td>{{$site->site_name}}</td>
                        <td></td>
                        <td><a href="/editar/{{Auth::user()->email}}/{{$site->site_name}}">Editar</a>
                            {{-- <form action="{{route('editar')}}" method="POST">
                                <input type="hidden" name="id" value="{{$site->site_name}}">
                                <input type="hidden" name="cuenta" value="{{Auth::user()->email}}" >
                                <input type="hidden" name="target" value="EDITOR">
                                <input type="submit" value="Editar">
                            </form>  --}}

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
            </Tbody>
        </table>
    </div>

</x-app-layout>