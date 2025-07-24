<?php

namespace App\Livewire;

use App\Models\Propiedad;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Propieds extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    //campos del formulario creacion
    public $tipo;
    public $direccion;
    public $precio;
    public $descripcion;
    public $estado= 'disponible';

    //campos formulario registro
    public $tipoEdit;
    public $direccionEdit;
    public $precioEdit;
    public $descripcionEdit;
    public $estadoEdit;

    //control modales
    public $createModal=false;
    public $showModal=false;
    public $editModal=false;
    public $propiedadSeleccionada;
    public $propiedadEditando;

    //reglas de validacion
    protected $rules = [
        "tipo"=> 'required|string|max:255',
        'direccion'=> 'required|string|max:255',
        'precio'=> 'required|numeric|min:0',
        'descripcion'=> 'required|string|max:1000',
        'estado'=>'required|in:disponible,alquilado,mantenimiento'   
    ];

    //Resetear los campos del formulario
    public function resetCreateForm(){
        $this->reset(['tipo','direccion','precio','descripcion','estado']);
        $this->resetErrorBag();
    }
     public function resetEditForm(){
        $this->reset(['tipoEdit','direccionEdit','precioEdit','descripcionEdit','estadoEdit','propiedadEditando']);
        $this->resetErrorBag();
    }

     public function openCreateModal(){
        $this->resetCreateForm();
        //Flux::modal('crear-propiedad')->open();
        $this->createModal = true;
    }

    //Guardar la Propiedad
    public function save(){
        $this->validate();

        Propiedad::create([
            'tipo' => $this->tipo,
            'direccion'=> $this->direccion,
            'precio'=> $this->precio,
            'descripcion'=> $this->descripcion,
            'estado'=> $this->estado,
        ]);

        $this->resetCreateForm();
        Flux::modal('create-propiedad')->close();
        session()->flash('message','Propiedad Creada.');
    }

    public function edit($id){
        $this->propiedadEditando = Propiedad::find($id);
        $this->tipoEdit = $this->propiedadEditando->tipo;
        $this->direccionEdit = $this->propiedadEditando->direccion;
        $this->precioEdit = $this->propiedadEditando->precio;
        $this->descripcionEdit= $this->propiedadEditando->descripcion;
        $this->estadoEdit = $this->propiedadEditando->estado;



        $this->editModal = true;
    }

    public function update(){
        $this->validate([
        "tipoEdit"=> 'required|string|max:255',
        'direccionEdit'=> 'required|string|max:255',
        'precioEdit'=> 'required|numeric|min:0',
        'descripcionEdit'=> 'required|string|max:1000',
        'estadoEdit'=>'required|in:disponible,alquilado,mantenimiento'   
    ]);

    $this->propiedadEditando->update([
        
        'tipo'=> $this->tipoEdit,
        'direccion'=> $this->direccionEdit,
        'precio'=> $this->precioEdit,
        'descripcion'=> $this->descripcionEdit,
        'estado'=> $this->estadoEdit,   
    ]);

    $this->resetEditForm();
    Flux::modal('edit-propiedad')->close();
    $this->editModal = false;
    session()->flash('message',"Propiedad Actualizada");   
    }
  

    public function show($id){
        $this->propiedadSeleccionada = Propiedad::find($id);
        $this->showModal = true;
    }

    public function render()
    {
        $propiedades = Propiedad::paginate(10);
        return view('livewire.propieds',compact('propiedades'));
    }
}
