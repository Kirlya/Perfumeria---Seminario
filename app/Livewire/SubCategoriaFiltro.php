<?php

namespace App\Livewire;

use Livewire\Component;

class SubCategoriaFiltro extends Component
{
    public $subcategoria;
    public $categoria;
    public $busqueda= '';

    public function mount($categoria,$subcategoria)
    {
        $this->subcategoria = $subcategoria;
        $this->categoria = $categoria;
    }

    public function render()
    {
        return view('livewire.sub-categoria-filtro');
    }
}
