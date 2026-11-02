<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\Solicitud;
use Livewire\Component;
use Livewire\WithPagination;

class SolicitudList extends Component
{
    use WithPagination;

    public $filtroEstado = '';
    public $filtroCategoria = '';
    public $busqueda = '';

    protected $queryString = [
        'filtroEstado'    => ['except' => ''],
        'filtroCategoria' => ['except' => ''],
        'busqueda'        => ['except' => ''],
    ];

    public function updating($field)
    {
        if (in_array($field, ['filtroEstado', 'filtroCategoria', 'busqueda'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $user = auth()->user();

        $query = Solicitud::with(['categoria', 'cliente'])
            ->when($this->filtroEstado, fn ($q) => $q->where('estado', $this->filtroEstado))
            ->when($this->filtroCategoria, fn ($q) => $q->where('categoria_id', $this->filtroCategoria))
            ->when($this->busqueda, fn ($q) => $q->where('titulo', 'like', "%{$this->busqueda}%"));

        // Si es cliente, solo ve sus solicitudes
        if ($user->role === 'cliente') {
            $query->where('cliente_id', $user->id);
        }

        // Si es reparador, ve las abiertas/con presupuestos que no haya presupuestado
        if ($user->role === 'reparador') {
            $query->whereIn('estado', ['abierta', 'con_presupuestos'])
                ->whereDoesntHave('presupuestos', fn ($q) => $q->where('reparador_id', $user->id));
        }

        return view('livewire.reparaya.solicitud-list', [
            'solicitudes' => $query->latest()->paginate(10),
        ]);
    }
}