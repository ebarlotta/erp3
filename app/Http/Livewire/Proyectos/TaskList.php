<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;
use App\Models\Proyectos\Project;
use App\Models\Proyectos\Task;
// use Livewire\WithSorting;

class TaskList extends Component
{
    // use WithSorting;

    public Project $project;
    public string $newTaskTitle = '';
    public string $filterStatus = '';
    public string $sortBy = 'created_at'; // columna por defecto
     public string $sortDirection = 'desc'; // columna por defecto

    protected $queryString = ['filterStatus'];

    public function render()
    {
        $query = $this->project->tasks();

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        $tasks = $query->orderBy($this->sortBy, $this->sortDirection,'asc')->get();

        return view('livewire.proyectos.task-list', [
            'tasks' => $tasks,
            'statuses' => Task::statuses(),
            'priorities' => Task::priorities(),
        ])->extends('layouts.adminlte');
    }

    public function addTask()
    {
        if (blank($this->newTaskTitle)) return;

        $this->project->tasks()->create([
            'title' => $this->newTaskTitle,
            'status' => 'pending',
            'priority' => 'medium',
            'order' => $this->project->tasks()->max('order') + 1,
        ]);

        $this->newTaskTitle = '';
    }

    public function updateStatus(Task $task, string $status)
    {
        $task->update(['status' => $status]);
    }

    public function updatePriority(Task $task, string $priority)
    {
        $task->update(['priority' => $priority]);
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
    }

    public function reorderTasks(array $order)
    {
        foreach ($order as $index => $taskId) {
            Task::where('id', $taskId)->update(['order' => $index]);
        }
    }
}
