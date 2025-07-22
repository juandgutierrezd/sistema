<div>
    {{-- Be like water. --}}
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{route('dashboard')}}">Inicio</flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{route('propiedades')}}">Listado de Propiedades</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Post</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    
    <br>
    <hr>
    <br>

    <div class="overflow-x-auto">
    <table class="min-w-full bg-black border border-b divide-y divide-gray-300 w-[100%]">
        <thead class="border-b bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Nro</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Tipo</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Dirreccion</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Precio</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Descripcion</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Estado</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Acciones</th>
        </thead>
        <tbody>
            @foreach ($propiedades as $propiedad)
                <tr class="border-2 border-solid ">
                    <td class="py-3 px-4 text-center">{{$propiedad->id}}</td>
                    <td class="py-3 px-4 text-center">{{$propiedad->tipo}}</td>
                    <td class="py-3 px-4 text-center">{{$propiedad->direccion}}</td>
                    <td class="py-3 px-4 text-center">{{$propiedad->precio}}</td>
                    <td class="py-3 px-4 ">{{$propiedad->descripcion}}</td>
                    <td class="py-3 px-4 text-center">{{$propiedad->estado}}</td>
                    <td>

                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $propiedades->links() }}
    </div>
</div>


</div>
