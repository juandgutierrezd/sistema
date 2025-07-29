<?php

namespace App\Livewire;

use App\Models\Inquilino as ModelsInquilino;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Inquilino extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    //campo formulario Creacion
    public $nombres;
    public $email;
    public $telefono;
    public $fecha_nacimiento;
    public $documento_identidad;

    //CAMPO FORMULARIO EDICION
    public $nombresEdit;
    public $emailEdit;
    public $telefonoEdit;
    public $fecha_nacimientoEdit;
    public $documento_identidadEdit;
    //MODALES
    
    public $createModal = false;
    public $showModal = false;
    public $editModal = false;
    public $deleteModal = false;

    //Seleccion id
    public $inquilinoSeleccionado;
    public $inquilinoEditando;
    public $inquilinoEliminando;

    //Reglas de validacion
    public $rules = [
        "nombres"=>'required|string|max:255',
        "email"=>'required|email|max:255|unique:inquilinos,email',
        "telefono"=>'required|string|max:20',
        "fecha_nacimiento"=>"required|date|max:255",
        "documento_identidad"=>"required|string|max:255|unique:inquilinos,documento_identidad",
    ];

    public function resetCreateForm(){
        $this->reset(['nombres','email','telefono','fecha_nacimiento','documento_identidad']);
        $this->resetErrorBag();
    }

     public function openCreateModal(){
         $this->resetCreateForm();
        $this->createModal = true;
    }


    public function save(){
        $this->validate();

        ModelsInquilino::create([
            'nombres'=> $this->nombres,
            'email'=> $this->email,
            'telefono'=> $this->telefono,
            'fecha_nacimiento'=> $this->fecha_nacimiento,
            'documento_identidad'=> $this->documento_identidad,
        ]);

        $this->resetCreateForm();
        Flux::modal('create-inquilino')->close();
        session()->flash('message','Inquilino Agregado.');
    }



    public function render()
    {
        $inquilinos = ModelsInquilino::paginate(10);
        return view('livewire.inquilino',compact('inquilinos'));
    }
}
