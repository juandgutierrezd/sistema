<?php

namespace App\Livewire;

use App\Models\Propiedad;
use Livewire\Component;
use Livewire\WithPagination;

class Propieds extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    public function render()
    {
        $propiedades = Propiedad::paginate(10);
        return view('livewire.propieds',compact('propiedades'));
    }
}
