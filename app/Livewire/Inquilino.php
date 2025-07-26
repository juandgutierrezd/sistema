<?php

namespace App\Livewire;

use App\Models\Inquilino as ModelsInquilino;
use Livewire\Component;
use Livewire\WithPagination;

class Inquilino extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    public function render()
    {
        $inquilinos = ModelsInquilino::paginate(10);
        return view('livewire.inquilino',compact('inquilinos'));
    }
}
