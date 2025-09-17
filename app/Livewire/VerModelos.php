<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\modelos;

class VerModelos extends Component
{
    public $modelos;

    public function render()
    {
        $this->modelos = modelos::all();
        return view('livewire.ver-modelos');
    }
}
