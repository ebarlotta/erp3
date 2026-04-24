<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Task;
use Livewire\WithSorting;

class TaskList extends Component
{
    use WithSorting;

    public Project $project;
    public string $newTaskTitle = '';
    public string $filterStatus = '';

    protected $queryString = ['filterStatus'];

    public function render()
    {
        $query = $this->project->tasks();

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        $tasks = $query->orderBy($this->sortBy, $this->sortDirection)->get();

        return view('livewire.task-list', [
            'tasks' => $tasks,
            'statuses' => Task::statuses(),
            'priorities' => Task::priorities(),
        ]);
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