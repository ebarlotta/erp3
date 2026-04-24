<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = '';

    protected $queryString = ['search', 'statusFilter'];

    public function render()
    {
        $query = Project::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $projects = $query->withCount(['tasks', 'timeEntries'])
            ->withSum('timeEntries', \DB::raw('TIMESTAMPDIFF(SECOND, started_at, ended_at)'))
            ->orderByDesc('updated_at')
            ->paginate(12);

        return view('livewire.project-list', [
            'projects' => $projects,
            'statuses' => Project::statuses(),
        ]);
    }

    public function delete(Project $project)
    {
        $project->delete();
        session()->flash('message', 'Proyecto eliminado.');
    }
}