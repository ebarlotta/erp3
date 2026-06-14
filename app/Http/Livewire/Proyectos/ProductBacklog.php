<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;
use App\Models\Proyectos\Pbi;
use Illuminate\Foundation\Auth\User;
use App\Models\Proyectos\Project;
use Livewire\WithPagination;

// Características Implementadas
// ✅ CRUD completo de PBIs
// ✅ Priorización dinámica - modifica la prioridad directamente desde la tabla
// ✅ Actualización de estado (Pendiente/En Progreso/Completado)
// ✅ Filtrado por tipo de PBI (Feature, Bug, Task, Tech Debt)
// ✅ Story points para estimación
// ✅ Asignación a miembros del equipo
// ✅ Paginación para manejar backlogs grandes
// ✅ Interfaz reactiva sin recargas de página gracias a Livewire

class ProductBacklog extends Component
{
    use WithPagination;
    
    public Project $project;
    public $showModal = false;
    public $editingPBI = null;
    
    // Form properties
    public $title = '';
    public $description = '';
    public $type = 'FEATURE';
    public $priority = 0;
    public $story_points = null;
    public $assigned_to = null;
    public $project_id = null;
    public $pbi_id = null;

    public $urgencia;
    public $valor_negocio;
    public $costo_estimado;
    public $tiempo_limite_dias;
    public $prioridad_automatica;
    
    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'nullable|string',
        'type' => 'required|in:FEATURE,BUG,TASK,TECH_DEBT',
        'priority' => 'required',
        'story_points' => 'nullable|integer|min:1|max:21',
        'assigned_to' => 'nullable|exists:users,id'
    ];
    
    public function render()
    {
        $pbis = Pbi::with('assignee')
            // ->orderBy('prioridad_automatica', 'desc')
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->where('project_id', $this->project->id)
            ->paginate(10);
            
        $users = User::all();

        $stats = Project::getStatusClass();
    
        return view('livewire.proyectos.product-backlog', [
            'pbis' => $pbis,
            'stats' => $stats,
            'statuses' => Project::statuses(),
            'users' => $users
        ])->extends('layouts.proyectos');
    }
    
    public function create($project_id)
    {
        $this->resetForm();
        $this->project_id = $project_id;
        $this->showModal = true;
    }
    
    public function edit(Pbi $pbi)
    {
        $this->editingPBI = $pbi;
        $this->title = $pbi->title;
        $this->description = $pbi->description;
        $this->type = $pbi->type;
        $this->priority = $pbi->priority;
        $this->story_points = $pbi->story_points;
        $this->assigned_to = $pbi->assigned_to;
        $this->project_id = $pbi->project_id;

        // dd($pbi->urgencia);
        $this->urgencia= $pbi->urgencia;
        $this->valor_negocio= $pbi->valor_negocio;
        $this->costo_estimado= $pbi->costo_estimado;
        $this->tiempo_limite_dias= $pbi->tiempo_limite_dias;
        $this->prioridad_automatica= $pbi->prioridad_automatica;

        $this->showModal = true;

    }
    
    public function edit_tasks(Pbi $pbi)
    {
        return redirect()->route('projects.tasks', ['project_id' => $pbi->project_id, 'pbi_id' => $pbi->id]);
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->editingPBI)) {
            $this->editingPBI->update([
                'title' => $this->title,
                'description' => $this->description,
                'type' => $this->type,
                'story_points' => $this->story_points,
                'assigned_to' => $this->assigned_to,
                'project_id' => $this->project_id,
                
                'urgencia' => $this->urgencia,
                'valor_negocio' => $this->valor_negocio,
                'costo_estimado' => $this->costo_estimado,
                'tiempo_limite_dias' => $this->tiempo_limite_dias,
                'prioridad_automatica' => $this->calcularPrioridadAutomatica($this->editingPBI->id), // Recalcula la prioridad automática al guardar
                'priority' => $this->prioridad_automatica, // Actualiza la prioridad manualmente con el valor calculado
                // 'priority' => $this->priority,
            ]);

            session()->flash('message', 'Product Backlog Item actualizado exitosamente.');
        } else {
            $a = Pbi::create([
                'title' => $this->title,
                'description' => $this->description,
                'type' => $this->type,
                'story_points' => $this->story_points,
                'assigned_to' => $this->assigned_to,
                'project_id' => $this->project_id,
                'urgencia' => $this->urgencia,
                'valor_negocio' => $this->valor_negocio,
                'costo_estimado' => $this->costo_estimado,
                'tiempo_limite_dias' => $this->tiempo_limite_dias,
                //  $this->editingPBI ? $this->calcularPrioridadAutomatica($this->editingPBI->id) : 1 // Calcula la prioridad automática al crear
                'priority' => 0,
                'prioridad_automatica' => 0,
            ]);
            $a->update(['priority' => $this->calcularPrioridadAutomatica($a->id)]);
            // $this->updatePriority(Pbi $a, $this->calcularPrioridadAutomatica($tha->id));
            session()->flash('message', 'Product Backlog Item creado exitosamente.');
        }
        
        $this->showModal = false;
        return redirect()->route('projects.product-backlog', ['project' => $this->project_id]);

        // $this->resetForm();
    }
    
    public function updatePriority(Pbi $pbi, $newPriority) { $pbi->update(['priority' => $newPriority]); }    
    public function updateStatus(Pbi $pbi, $status) { $pbi->update(['status' => $status]); }
    public function delete(Pbi $pbi) { $pbi->delete(); session()->flash('message', 'Product Backlog Item eliminado.'); }
    private function resetForm() { $this->reset(['title', 'description', 'type', 'priority', 'story_points', 'assigned_to', 'editingPBI']); $this->resetValidation(); }

    // En app/Livewire/ProductBacklog.php

public function calcularPrioridadAutomatica($pbiId)
{
    $pbi = Pbi::find($pbiId);
    
    // Datos de ejemplo (deberías obtenerlos de tu contexto)
    $urgencia = $pbi->urgencia ?? 5; // Campo adicional en DB
    $valorNegocio = $pbi->valor_negocio ?? 5;
    $costoEstimado = $pbi->story_points ?? 5; // Usando story points como costo
    $tiempoLimite = $pbi->tiempo_limite_dias ?? 30;
    
    // Velocidad del equipo (promedio de últimos 3 sprints)
    $velocidadEquipo = $this->obtenerVelocidadEquipo();
    
    // dd($urgencia . ' - ' . $valorNegocio . ' - ' . $costoEstimado . ' - ' . $tiempoLimite . ' - ' . $velocidadEquipo);
    $prioridad = $this->formulaPrioridad(
        $urgencia, 
        $valorNegocio, 
        $costoEstimado, 
        $tiempoLimite, 
        $velocidadEquipo
    );

    // dd($prioridad);
    $this->prioridad_automatica = $prioridad;
    return $prioridad;
    // $pbi->update(['priority' => $prioridad]);
}

private function formulaPrioridad($urgencia, $valorNegocio, $costoEstimado, $tiempoLimite, $velocidadEquipo)
{
    // Urgencia: 40% del peso
    $urgenciaScore = $urgencia;
    // $urgenciaScore = $urgencia * 4;
    // dd($urgenciaScore*0.4);
    // Costo eficiente: 25% del peso  
    $costoScore = min(10, (($valorNegocio * 0.4) / ($costoEstimado * 0.6)) );
    // $costoScore = min(10, (($valorNegocio * 0.4) / ($costoEstimado * 0.6)) * 2.5);
    // dd($costoScore);
    // Tiempo-valor: 35% del peso
    if ($tiempoLimite > 0) {
        $capacidadSprints = $velocidadEquipo * ($tiempoLimite / 14);
        $factorTiempo = ($capacidadSprints < $costoEstimado) ? 1.5 : 1.0;
    } else {
        $factorTiempo = 0.7;
    }
    // dd($factorTiempo);
    
    $tiempoScore = max(1, min(10, ($valorNegocio * $factorTiempo) - ($costoEstimado * 0.3)));
    
    // dd($tiempoScore);

    // Cálculo final
    $prioridad = ($urgenciaScore*0.4) + ($costoScore*0.25) + ($tiempoScore * 0.35);
    // $prioridad = ($urgenciaScore * 0.4) + ($costoScore * 2.5) + ($tiempoScore * 3.5);
    
    //  dd($prioridad);

    return min(100, max(0, $prioridad));
}
// Tabla de Decisión Rápida
// Para facilitar la priorización manual, puedes usar esta matriz:

// Urgencia	Costo       Bajo (1-3)	        Costo Medio (4-6)	        Costo Alto (7-10)
// Alta (7-10)	        Prioridad 1 (hacer ya)	        Prioridad 2 (planificar)	        Prioridad 3 (evaluar alternativa)
// Media (4-6)	        Prioridad 2 (siguiente sprint)  Prioridad 3 (backlog)       Prioridad 4 (depriorizar)
// Baja (1-3)	Prioridad 3 (cuando haya tiempo)	Prioridad 4 (no crítico)	Prioridad 5 (descartar/pospuesto)

/**
 * Calcula la velocidad promedio del equipo basada en los últimos sprints
 * @return float Velocidad en story points por sprint
 */
private function obtenerVelocidadEquipo()
{
    // Opción A: Si tienes un modelo Sprint o History
    if (class_exists(\App\Models\Sprint::class)) {
        $ultimosSprints = \App\Models\Sprint::where('estado', 'COMPLETED')
            ->latest()
            ->take(3)
            ->get();
        
        if ($ultimosSprints->count() > 0) {
            $velocidadPromedio = $ultimosSprints->avg('story_points_completados');
            return $velocidadPromedio > 0 ? $velocidadPromedio : 10; // Valor por defecto
        }
    }
    
    // Opción B: Calcular basado en PBIs completados en los últimos 30 días
    $treintaDiasAtras = now()->subDays(30);
    $pbisCompletados = Pbi::where('status', 'DONE')
        ->where('updated_at', '>=', $treintaDiasAtras)
        ->get();
    
    if ($pbisCompletados->count() > 0) {
        // Asumiendo 2 sprints en 30 días (cada sprint de 2 semanas)
        $totalStoryPoints = $pbisCompletados->sum('story_points');
        $velocidadPorSprint = $totalStoryPoints / 2; // Dividir entre número de sprints
        return max(1, round($velocidadPorSprint, 2));
    }
    
    // Opción C: Valor por defecto si no hay datos históricos
    return 10; // Velocidad base de 10 story points por sprint
}
}
