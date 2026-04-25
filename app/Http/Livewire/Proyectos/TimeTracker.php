<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;
use App\Models\Proyectos\Project;
use App\Models\Proyectos\Task;
use App\Models\Proyectos\TimeEntry;
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

        return view('livewire.proyectos.time-tracker', [
            'projects' => $projects,
            'tasks' => $tasks,
            'timeEntries' => $timeEntries,
            'runningTime' => $this->getRunningTime(),
        ])->extends('layouts.adminlte');
    }

    public function updatedSelectedProject($projectId)
    {
        $this->selectedTask = '';
    }

    public function changeProject($project_id ) {
        $this->selectedProject = $project_id;
    }

    public function changeTask($task_id ) {
        $this->selectedTask = $task_id;
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
