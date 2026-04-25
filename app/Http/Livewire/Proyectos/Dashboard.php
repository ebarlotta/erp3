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

        $projects = $query->with(['tasks', 'timeEntries'])
            ->orderByDesc('updated_at')
            ->get();

        $stats = [
            'activeProjects' => Project::where('status', 'active')->count(),
            'pendingTasks' => Task::where('status', '!=', 'completed')->count(),
            'hoursThisWeek' => $this->getHoursThisWeek(),
            'completionRate' => $this->getCompletionRate(),
        ];

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

    protected function getHoursThisWeek(): float
    {
        $startOfWeek = now()->startOfWeek();
        return \DB::table('pm_time_entries')
            ->whereNotNull('ended_at')
            ->where('started_at', '>=', $startOfWeek)
            ->selectRaw('SUM(TIMESTAMPDIFF(SECOND, started_at, ended_at)) as total')
            ->value('total') / 3600;
    }

    protected function getCompletionRate(): int
    {
        $total = Task::count();
        if ($total === 0) return 0;

        $completed = Task::where('status', 'completed')->count();
        return round(($completed / $total) * 100);
    }
}
