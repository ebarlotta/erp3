<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\Categorias;
use App\Models\Reparaya\Solicitud;
use Livewire\Component;
use Livewire\WithFileUploads;

class SolicitudForm extends Component
{
    use WithFileUploads;

    public $titulo = '';
    public $categoria_id = '';
    public $descripcion = '';
    public $direccion = '';
    public $localidad = '';
    public $urgencia = 'normal';
    public $presupuesto_estimado = '';
    public $fotos = [];

    protected $rules = [
        'titulo'               => 'required|string|max:150',
        'categoria_id'         => 'required|exists:categorias,id',
        'descripcion'          => 'required|string|min:20',
        'direccion'            => 'required|string|max:200',
        'localidad'            => 'required|string|max:100',
        'urgencia'             => 'required|in:normal,urgente,muy_urgente',
        'presupuesto_estimado' => 'nullable|numeric|min:0',
        'fotos.*'              => 'image|max:5120', // 5 MB
    ];

    public function scopeDeReparaya($query)
    {
        return $query->where('empresa_id', 1);
    }

    public function guardar()
    {
        $this->validate();

        $solicitud = Solicitud::create([
            'cliente_id'           => auth()->id(),
            'categoria_id'         => $this->categoria_id,
            'titulo'               => $this->titulo,
            'descripcion'          => $this->descripcion,
            'direccion'            => $this->direccion,
            'localidad'            => $this->localidad,
            'urgencia'             => $this->urgencia,
            'presupuesto_estimado' => $this->presupuesto_estimado ?: null,
            'estado'               => 'abierta',
        ]);

        foreach ($this->fotos as $foto) {
            $path = $foto->store('solicitudes', 'public');
            $solicitud->fotos()->create(['path' => $path]);
        }

        session()->flash('success', 'Solicitud publicada correctamente.');

        return redirect()->route('reparaya.cliente-dashboard');
    }

    public function render()
    {
        return view('livewire.reparaya.solicitud-form', [
            'categorias' => Categorias::activas()->deReparaya()->orderBy('nombrecategoria')->get(),
        ]);
    }
}