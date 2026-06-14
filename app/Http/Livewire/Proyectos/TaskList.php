<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyectos\Pbi;
use Livewire\Component;
use App\Models\Proyectos\Project;
use App\Models\Proyectos\Task;
// use Livewire\WithSorting;

class TaskList extends Component
{
    // use WithSorting;

    // public Project $project;
    // public ?Project $pbi = null;

    // public ?Pbi $pbi = null;
    // public ?Pbi $pbi;
    public $pbi;
    public $project_id, $pbi_id;
    public string $newTaskTitle = '';
    public string $filterStatus = '';
    public string $sortBy = 'created_at'; // columna por defecto
    public string $sortDirection = 'desc'; // columna por defecto

    protected $queryString = ['filterStatus'];

    public function render()
    {
        // $query = $this->project->tasks();
        // $this->pbi = Pbi::find($b);
        // $query = Project::query();

        $stats = Project::getStatusClass();
        // dd($a);
        // $stats = [
        //     'activeProjects' => Project::where('status', 'active')->count(),
        //     'pendingTasks' => Task::where('status', '!=', 'completed')->count(),
        //     'hoursThisWeek' => $this->getHoursThisWeek(),
        //     'completionRate' => $this->getCompletionRate(),
        // ];

        if(is_null($this->pbi)) {
            $this->pbi = new Pbi();
        } 

        $this->pbi->id = $this->pbi_id = request('pbi_id');
        $this->pbi->project_id = $this->project_id = request('project_id');

        $query = $this->pbi->tasks();

        // dd($query);
        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        //$tasks = $query->orderBy($this->sortBy, $this->sortDirection,'asc')->get();

        return view('livewire.proyectos.task-list', [
            'tasks' => Task::where('pbi_id', $this->pbi->id)->orderBy('order')->get(),
            //'tasks' => $query,
            'statuses' => Task::statuses(),
            'priorities' => Task::priorities(),
            'stats' => $stats,
        ])->extends('layouts.proyectos');
    }

    public function addTask()
    {
        // if (blank($this->newTaskTitle)) return;
        // $this->project->tasks()->create([
        // dd($this->pbi_id);
        $task = new Task();
        $task->create([
            'title' => $this->newTaskTitle,
            'status' => 'pending',
            'priority' => 'medium',
            'pbi_id' => $this->pbi_id,
            'order' => $task->max('order') + 1,
            // 'order' => $this->project->tasks()->max('order') + 1,
        ]);

        $this->newTaskTitle = '';
    }

    public function updateStatus(Task $task, string $status)
    {
        $task->update(['status' => $status]);
        return redirect()->route('projects.tasks', ['project_id' => $this->project_id, 'pbi_id' =>$this->pbi_id]);
    }

    public function updatePriority(Task $task, string $priority)
    {
        $task->update(['priority' => $priority]);
        return redirect()->route('projects.tasks', ['project_id' => $this->project_id, 'pbi_id' =>$this->pbi_id]);
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
        return redirect()->route('projects.tasks', ['project_id' => $this->project_id, 'pbi_id' =>$this->pbi_id]);
    }

    public function reorderTasks(array $order)
    {
        foreach ($order as $index => $taskId) {
            Task::where('id', $taskId)->update(['order' => $index]);
        }
    }
}
