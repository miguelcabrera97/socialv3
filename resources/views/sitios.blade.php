<x-app-layout>
    <div class="md:ml-56 lg:ml-56 xl:ml-80 grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3 xl:grid-cols-4 p-10 gap-6">
        
    

        <table class="table-auto">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>ID</th>
                </tr>
            </thead>
            <Tbody>
                
                @foreach ($sitios as $site)
                    <tr>
                        <td>Nombre</td>
                        <td>{{$site->site_name}}</td>
                    </tr>
                @endforeach
            </Tbody>
        </table>
    </div>

</x-app-layout>