<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use Livewire\WithPagination;

class TimeTracker extends Component
{
    use WithPagination;

    public ?Project $activeProject = null;
    public ?Task $activeTask = null;
    public ?TimeEntry $currentEntry = null;

    public string $selectedProject = '';
    public string $selectedTask = '';

    protected $queryString = ['selectedProject'];

    public function render()
    {
        $projects = Project::where('status', '!=', 'completed')
            ->orderBy('name')
            ->get();

        $tasks = $this->selectedProject 
            ? Project::find($this->selectedProject)?->tasks ?? collect()
            : collect();

        $timeEntries = TimeEntry::with(['project', 'task'])
            ->orderByDesc('started_at')
            ->paginate(20);

        return view('livewire.time-tracker', [
            'projects' => $projects,
            'tasks' => $tasks,
            'timeEntries' => $timeEntries,
            'runningTime' => $this->getRunningTime(),
        ]);
    }

    public function updatedSelectedProject($projectId)
    {
        $this->selectedTask = '';
    }

    public function startTimer()
    {
        if (!$this->selectedProject) return;

        $project = Project::find($this->selectedProject);
        $task = $this->selectedTask ? Task::find($this->selectedTask) : null;

        $this->currentEntry = TimeEntry::start($project, $task);
        $this->activeProject = $project;
        $this->activeTask = $task;
    }

    public function stopTimer()
    {
        if (!$this->currentEntry) return;

        $this->currentEntry->stop();
        $this->currentEntry = null;
        $this->activeProject = null;
        $this->activeTask = null;
    }

    public function getRunningTime(): string
    {
        if (!$this->currentEntry) return '00:00:00';

        return $this->currentEntry->duration_formatted;
    }

    public function deleteEntry(TimeEntry $entry)
    {
        $entry->delete();
    }
}