<?php

namespace App\Http\Livewire\Reparaya;

use Livewire\Component;
use App\Models\Reparaya\Solicitud;
use App\Models\Reparaya\Categorias;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;

class ReparayaClienteComponent extends Component
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

    public $resumen = ['abiertas'      => 0,'con_presupuestos' => 0,'finalizadas'   => 0,];
    public $solicitudes = [];
    public $categorias = [];
    
    public function render()
    {
        $user = Auth::user()->id;

        $this->categorias = \App\Models\Reparaya\Categorias::where('empresa_id', 1)->get();

        $this->solicitudes = Solicitud::with(['categoria'])
            ->where('cliente_id', $user)
            ->latest()
            ->get();

        $this->resumen = [
            'abiertas'      => $this->solicitudes->where('estado', 'abierta')->count(),
            'con_presupuestos' => $this->solicitudes->where('estado', 'con_presupuestos')->count(),
            'finalizadas'   => $this->solicitudes->where('estado', 'finalizada')->count(),
        ];
            // dd($this->resumen);

        return view('livewire.reparaya.reparaya-cliente-component')->extends('layouts.reparaya')->with([
            'solicitudes' => $this->solicitudes,
            'resumen' => $this->resumen,
        ]);
    }

    public function guardar() {
       
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

        // Reset form fields
        $this->reset(['cliente_id', 'categoria_id', 'titulo', 'descripcion', 'direccion', 'localidad', 'urgencia', 'presupuesto_estimado', 'fotos','estado']);

        // Close modal
        $this->dispatchBrowserEvent('close-modal');

        $this->render();
    }
}
