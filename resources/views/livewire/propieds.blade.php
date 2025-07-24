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


    <flux:button variant="primary"  color="blue" wire:click="openCreateModal">Crear Nuevo Campo</flux:button>



@if (session('message'))
    <div class="mt-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        <strong class="font-bold">Exito!</strong>
        <span class="block sm:inline">{{session('message')}}</span>
    </div>
@endif

<br>
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
                    <td class="flex ">
                        <flux:button variant="primary" color="teal" wire:click="show({{ $propiedad->id }})">Ver</flux:button>
                        <flux:button variant="primary" color="green" wire:click="edit({{ $propiedad->id }})">Editar</flux:button>
                         <flux:button variant="primary" color="red" wire:click="delete({{ $propiedad->id }})">Eliminar</flux:button>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $propiedades->links() }}
    </div>
</div>

<flux:modal name="create-propiedad" class="md:w-96" wire:model="createModal">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Creacion de Propiedad</flux:heading>
            <flux:text class="mt-2">Llene todos los campos requeridos.</flux:text>
        </div>

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <flux:label for="tipo"> Tipo de Propiedad</flux:label>
                <flux:input type="text" id="tipo" wire:model="tipo"/>
                @error('tipo') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="direccion">Direccion</flux:label>
                <flux:input type="text" id="direccion" wire:model="direccion"/>
                @error('direccion') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="precio">Precio</flux:label>
                <flux:input type="number" id="precio" wire:model="precio"/>
                @error('precio') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="descripcion">Descripcion</flux:label>
                <flux:textarea id="descripcion" wire:model="descripcion" 
                
                />
                @error('descripcion') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="estado">Estado</flux:label>
                <flux:select id="estado" wire:model="estado">
                    <option value="">Seleccione un estado</option>
                    <option value="disponible">Disponible</option>
                    <option value="mantenimiento">Mantenimiento</option>
                    <option value="alquilado">Alquilado</option>
                </flux:select>
                @error('estado') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <flux:modal.close>
                    <flux:button type="button" variant="danger" class="mx-2">Cerrar</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="primary">Crear Propiedad</flux:button>
            </div>
        </form>
    </div>
</flux:modal>

<flux:modal name="editar-propiedad" class="md:w-96" wire:model="editModal">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Editar Propiedad</flux:heading>
            <flux:text class="mt-2">Llene todos los campos requeridos.</flux:text>
        </div>

        <form wire:submit.prevent="update" class="space-y-4">
            <div>
                <flux:label for="tipo"> Tipo de Propiedad</flux:label>
                <flux:input type="text" id="tipo" wire:model="tipoEdit"/>
                @error('tipo') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="direccion">Direccion</flux:label>
                <flux:input type="text" id="direccion" wire:model="direccionEdit"/>
                @error('direccion') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="precio">Precio</flux:label>
                <flux:input type="number" id="precio" wire:model="precioEdit"/>
                @error('precio') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="descripcion">Descripcion</flux:label>
                <flux:textarea id="descripcion" wire:model="descripcionEdit" 
                
                />
                @error('descripcion') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="estado">Estado</flux:label>
                <flux:select id="estado" wire:model="estadoEdit">
                    <option value="">Seleccione un estado</option>
                    <option value="disponible">Disponible</option>
                    <option value="mantenimiento">Mantenimiento</option>
                    <option value="alquilado">Alquilado</option>
                </flux:select>
                @error('estado') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <flux:modal.close name="editar-propiedad">
                    <flux:button type="button" variant="danger" class="mx-2">Cerrar</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="primary">Actualizar Propiedad </flux:button>
            </div>
        </form>
    </div>
</flux:modal>



<flux:modal name="show-propiedad" class="md:w-96" wire:model="showModal">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Detalles de la Propiedad</flux:heading>
        </div>
        @if ($propiedadSeleccionada)
             <div class="space-y-4">
            <div>
                <flux:label for="tipo"> Tipo de Propiedad</flux:label>
                <flux:text>{{$propiedadSeleccionada->tipo}}</flux:text>
            </div>
            <div>
                <flux:label for="direccion">Direccion</flux:label>
                <flux:text>{{$propiedadSeleccionada->direccion}}</flux:text>
            </div>
            <div>
                <flux:label for="precio">Precio</flux:label>
                <flux:text>{{$propiedadSeleccionada->precio}}</flux:text>
            </div>
            <div>
                <flux:label for="descripcion">Descripcion</flux:label>
                <flux:text>{{$propiedadSeleccionada->descripcion}}</flux:text>
            </div>
            <div>
                <flux:label for="estado">Estado</flux:label>
                <flux:text>{{$propiedadSeleccionada->estado}}</flux:text>
            </div>
            <div class="flex justify-end">
                <flux:modal.close name="show-propiedad">
                    <flux:button type="button" variant="danger" class="mx-2">Cerrar</flux:button>
                </flux:modal.close>

            </div>
        </div>
        @endif
       
    </div>
</flux:modal>

</div>
