<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VerUsuario extends Component
{
    public $usuario;

    public function mount(){
        $this->usuario = Auth::user();
        //dd($this->usuario);
    }

    public function render()
    {
        return view('livewire.ver-usuario');
    }
}
