<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Task;

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

        return view('livewire.dashboard', [
            'projects' => $projects,
            'stats' => $stats,
            'statuses' => Project::statuses(),
            'priorities' => Project::priorities(),
        ]);
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