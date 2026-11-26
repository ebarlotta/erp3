<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\Solicitud;
use App\Models\Reparaya\Presupuesto;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Reparaya\Categorias;

use Livewire\WithFileUploads;

class PresupuestosComponent extends Component
{

    use WithFileUploads;

    public $solicitud;
    public $presupuestos;

    public $titulo = '';
    public $categoria_id = '';
    public $categorias;
    public $descripcion = '';
    public $direccion = '';
    public $localidad = '';
    public $urgencia = '';
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
        'fotos.*'              => 'image|mimes:jpeg,png,jpg,webp|max:5120', // 5 MB
        'fotos' => 'nullable|array|max:5', // Máximo 5 fotos
    ];

        // Mensajes de validación personalizados (opcional)
        protected $messages = [
            'fotos.max' => 'Puedes subir un máximo de 5 fotos.',
            'fotos.*.image' => 'Cada archivo debe ser una imagen.',
            'fotos.*.max' => 'Cada imagen no debe pesar más de 2MB.',
        ];

    public function render(Request $request) {
        $user = Auth::user()->id;
        $this->categorias = \App\Models\Reparaya\Categorias::where('empresa_id', 1)->get();

        if($request->solicitud<>0) {
            $this->solicitud = Solicitud::where('id', $request->solicitud)
                ->where('cliente_id', $user)
                ->first();
                // dd($presupuesto[0]->presupuestos);

            $this->presupuestos = Presupuesto::with('reparador')
            ->where('solicitud_id','=',$request->solicitud)
            ->where('estado','enviado')
            ->orderby('monto','asc')
            ->get();
            // dd($this->presupuestos->first()->reparador);
            // dd($this->presupuestos);
            return view('livewire.reparaya.listado-presupuestos-component')->extends('layouts.reparaya');
        } else {
            return view('livewire.reparaya.presupuestos-component')->extends('layouts.reparaya');
        }
    }

    public function guardar() {
        
        $clienteId = auth()->id();

        $this->validate();
        $solicitud = Solicitud::create([
            'cliente_id'           => $clienteId,
            'categoria_id'         => $this->categoria_id,
            'titulo'               => $this->titulo,
            'descripcion'          => $this->descripcion,
            'direccion'            => $this->direccion,
            'localidad'            => $this->localidad,
            'urgencia'             => $this->urgencia,
            'presupuesto_estimado' => $this->presupuesto_estimado ?: null,
            'estado'               => 'abierta',
        ]);

        if (!empty($this->fotos)) {
            $fecha = now()->format('Y-m-d');

            foreach ($this->fotos as $index => $foto) {
                $extension = $foto->getClientOriginalExtension();
                $numero = $index + 1;
            
                // Formato: id_cliente-año-mes-dia-numero.extension
                $nombreArchivo = "{$clienteId}-{$fecha}-{$numero}.{$extension}";

                // Guarda en /public/reparaya/solicitudes/nombreArchivo
                $path = $foto->storeAs('reparaya/solicitudes', $nombreArchivo, 'public_direct');

                // Guarda el registro en repa_solicitud_fotos
                $solicitud->fotos()->create([
                    'path' => $path, // Guardará: reparaya/solicitudes/15-2026-11-26-1.jpg
                ]);
            }
        }

        session()->flash('success', 'Solicitud publicada correctamente.');

        // Reset form fields
        $this->reset(['categoria_id', 'titulo', 'descripcion', 'direccion', 'localidad', 'urgencia', 'presupuesto_estimado', 'fotos']);

        // Close modal
        // $this->dispatchBrowserEvent('close-modal');

        // $this->render();
    }
}
