<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;
use App\Models\Proyectos\Project;

class ProjectForm extends Component
{
    public ?Project $project = null;

    public string $name = '';
    public string $description = '';
    public string $status = 'planning';
    public string $priority = 'medium';
    public string $color = '#3b82f6';
    public string $start_date = '';
    public string $target_date = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:active,paused,completed,planning',
        'priority' => 'required|in:low,medium,high,urgent',
        'color' => 'required|string|max:7',
        'start_date' => 'nullable|date',
        'target_date' => 'nullable|date|after:start_date',
    ];

    // public function mount(Project $project = null)
    // {

    //     dd($project->id);

    // }
        // if ($project->id) {
        //     $this->project = $project;
        //     $this->name = $project->name;
        //     $this->description = $project->description ?? '';
        //     $this->status = $project->status;
        //     $this->priority = $project->priority;
        //     $this->color = $project->color;
        //     $this->start_date = $project->start_date?->format('Y-m-d') ?? '';
        //     $this->target_date = $project->target_date?->format('Y-m-d') ?? '';
        // } else
        // {
        // dd($project->id);

        // }
    // }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'color' => $this->color,
            'start_date' => $this->start_date ?: null,
            'target_date' => $this->target_date ?: null,
        ];

        if ($this->project) {
            $this->project->update($data);
            $message = 'Proyecto actualizado.';
        } else {
            Project::create($data);
            $message = 'Proyecto creado.';
        }

        session()->flash('message', $message);
        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.proyectos.project-form', [
            'statuses' => Project::statuses(),
            'priorities' => Project::priorities(),
            'colors' => $this->colorPresets(),
        ])->extends('layouts.adminlte');
    }

    public function create() {
        return "echo";
    }

    protected function colorPresets(): array
    {
        return [
            '#3b82f6' => 'Blue',
            '#10b981' => 'Green',
            '#f59e0b' => 'Amber',
            '#ef4444' => 'Red',
            '#8b5cf6' => 'Purple',
            '#ec4899' => 'Pink',
            '#06b6d4' => 'Cyan',
            '#84cc16' => 'Lime',
        ];
    }
}
