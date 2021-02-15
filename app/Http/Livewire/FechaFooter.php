<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FechaFooter extends Component
{
    public $fecha ;
    public function render()
    {

        $this->fecha = date("Y");

        
        return view('livewire.fecha-footer',[
            'fecha' => $this->fecha,
        ]);
    }
}
