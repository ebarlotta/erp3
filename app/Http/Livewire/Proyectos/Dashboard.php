<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;
use App\Models\Proyectos\Project;
use App\Models\Proyectos\Task;

class Dashboard extends Component
{
    public string $search = '';
    public string $statusFilter = '';
    public string $priorityFilter = '';

    public function render()
    {
        $query = Project::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        if ($this->priorityFilter) {
            $query->where('priority', $this->priorityFilter);
        }

        // $projects = $query->with(['tasks', 'timeEntries'])
        $projects = $query
            ->orderByDesc('updated_at')
            ->get();

        $stats = Project::getStatusClass();

        return view('livewire.proyectos.dashboard', [
            'projects' => $projects,
            'stats' => $stats,
            'statuses' => Project::statuses(),
            'priorities' => Project::priorities(),
        ])->extends('layouts.proyectos');
    }

    public function getStatusClass($status) {
    return match($status) {
        'active' => 'bg-green-500/20 text-green-400',
        'paused' => 'bg-yellow-500/20 text-yellow-400',
        'completed' => 'bg-slate-500/20 text-slate-400',
        'planning' => 'bg-blue-500/20 text-blue-400',
        default => 'bg-slate-500/20 text-slate-400',
    };
}

    public function getPriorityClass($priority) {
    return match($priority) {
        'urgent' => 'text-red-400',
        'high' => 'text-orange-400',
        'medium' => 'text-blue-400',
        'low' => 'text-slate-400',
        default => 'text-slate-400',
    };
}

}
