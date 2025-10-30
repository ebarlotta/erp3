<?php

namespace App\Http\Livewire\Promociones;

use Livewire\Component;

class PromocionesComponent extends Component
{
    public $rubro;

    public function mount($rubro = null)
    {
        $this->rubro = $rubro;
    }

    public function render()
    {
        return view('livewire.promociones.inicial')->extends('layouts.sinadminlte');
        // return view('livewire.promociones.promociones-component')->extends('layouts.sinadminlte');
        // return view('livewire.promociones.promociones-component5')->extends('layouts.sinadminlte');
    }

}
