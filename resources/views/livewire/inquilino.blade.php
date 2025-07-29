<div>
    {{-- Be like water. --}}
      <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{route('dashboard')}}">Inicio</flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{route('inquilinos')}}">Lista de Inquilinos</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <br>
    <hr>
    <br>


    <flux:button variant="primary"  color="blue" wire:click="openCreateModal">Agregar Nuevo Inquilino</flux:button>



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
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Nombres</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Correo</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Telefono</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Fecha Nacimiento</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Documento Identidad</th>
            <th class="py-3 px-4 bg-[#f0f0f0] text-black">Acciones</th>
        </thead>
        <tbody>
           @foreach ($inquilinos as $inquilino)
                <tr class="border-2 border-solid ">
                    <td class="py-3 px-4 text-center">{{$inquilino->id}}</td>
                    <td class="py-3 px-4 text-center">{{$inquilino->nombres}}</td>
                    <td class="py-3 px-4 text-center">{{$inquilino->email}}</td>
                    <td class="py-3 px-4 text-center">{{$inquilino->telefono}}</td>
                    <td class="py-3 px-4 ">{{$inquilino->fecha_nacimiento}}</td>
                    <td class="py-3 px-4 text-center">{{$inquilino->documento_identidad}}</td>
                    <td class="flex ">
                        <flux:button variant="primary" color="teal" wire:click="show({{ $inquilino->id }})">Ver</flux:button>
                        <flux:button variant="primary" color="green" wire:click="edit({{ $inquilino->id }})">Editar</flux:button>
                         <flux:button variant="primary" color="red" wire:click="confirmEliminar({{ $inquilino->id }})">Eliminar</flux:button>
                    </td>
                </tr>                
            @endforeach
        </tbody>
     </table>
     <div class="mt-4">
        {{ $inquilinos->links() }}
     </div>
    </div>

    <flux:modal name="create-inquilino" class="md:w-96" wire:model="createModal">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Agregar Nuevo Inquilino</flux:heading>
            <flux:text class="mt-2">Completas todos los campos.</flux:text>
        </div>

        <form action="" wire:submit.prevent="save"  class="space-y-4">
             <div>
                <flux:label for="nombres">Nombres</flux:label>
                <flux:input type="text" id="nombres" wire:model="nombres"/>
                @error('nombres') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
             
            <div>
                <flux:label for="email">Correo</flux:label>
                <flux:input type="email" id="email" wire:model="email"/>
                @error('email') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div>
                <flux:label for="telefono">Telefono</flux:label>
                <flux:input type="text" id="telefono" wire:model="telefono"/>
                @error('telefono') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="fecha_nacimiento">Fecha de Nacimiento</flux:label>
                <flux:input type="date" id="fecha_nacimiento" wire:model="fecha_nacimiento"/>
                @error('nombres') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <flux:label for="documento_identidad">Documento Indentidad</flux:label>
                <flux:input type="text" id="documento_identidad" wire:model="documento_identidad"/>
                @error('documento_identidad') <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

          <flux:button type="submit" variant="primary">Agregar Inquilino</flux:button>
        </form>

    </div>
    </flux:modal>
</div>
