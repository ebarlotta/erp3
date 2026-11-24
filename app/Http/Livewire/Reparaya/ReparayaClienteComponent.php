<?php

namespace App\Http\Livewire\Reparaya;

use Livewire\Component;
use App\Models\Reparaya\Solicitud;
use App\Models\Reparaya\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        'fotos.*'              => 'image|mimes:jpeg,png,jpg,webp|max:5120', // 5 MB
        'fotos' => 'nullable|array|max:5', // Máximo 5 fotos
    ];

        // Mensajes de validación personalizados (opcional)
        protected $messages = [
            'fotos.max' => 'Puedes subir un máximo de 5 fotos.',
            'fotos.*.image' => 'Cada archivo debe ser una imagen.',
            'fotos.*.max' => 'Cada imagen no debe pesar más de 2MB.',
        ];

    public $resumen = ['abiertas' => 0,'con_presupuestos' => 0,'finalizadas'   => 0,];
    public $solicitudes = [];
    public $categorias = [];
    
    protected $casts = [
        // ... otros casts
        'fotos' => 'array',
    ];
    
    public function render() {
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

    public function store(Request $request)
    {
        // 1. Validar los datos (incluyendo las imágenes)
        $request->validate([
            'titulo' => 'required|string|max:255',
            'especialidad' => 'required|string',
            'descripcion' => 'required|string',
            'prioridad' => 'required|in:normal,urgente',
            'direccion' => 'nullable|string',
            'presupuesto_estimado' => 'nullable|numeric',
            // Validar imágenes: máximo 5 fotos, máximo 2MB por foto
            'fotos' => 'nullable|array|max:5', 
            'fotos.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        // 2. Procesar las fotos
        $rutasFotos = [];
        
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                // Guarda la foto en storage/app/public/solicitudes
                $ruta = $foto->store('solicitudes', 'public');
                $rutasFotos[] = $ruta;
            }
        }

        // 3. Crear la solicitud en la base de datos
        $solicitud = Solicitud::create([
            'cliente_id' => auth()->id(),
            'titulo' => $request->titulo,
            'especialidad' => $request->especialidad,
            'descripcion' => $request->descripcion,
            'prioridad' => $request->prioridad,
            'direccion' => $request->direccion,
            'fecha_solicitud' => now(),
            'estado' => 'pendiente',
            'zona' => 'Belgrano', // Esto deberías obtenerlo de la dirección o un mapa
            'ciudad' => 'CABA',
            'fotos' => $rutasFotos, // Guardamos el array de rutas (se castea a JSON automáticamente)
        ]);

        return redirect()->route('cliente-dashboard')->with('success', '¡Solicitud publicada con éxito!');
    }
}
