<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\TimeEntry;

class FocusWidget extends Component
{
    public ?Project $focusProject = null;
    public ?TimeEntry $activeTimer = null;

    protected $listeners = ['setFocusProject', 'stopFocusTimer'];

    public function mount()
    {
        $this->loadActiveProject();
    }

    public function render()
    {
        return view('livewire.focus-widget');
    }

    public function loadActiveProject()
    {
        $this->focusProject = Project::where('status', 'active')
            ->orderByDesc('updated_at')
            ->first();

        if ($this->focusProject) {
            $this->activeTimer = $this->focusProject->active_time_entry;
        }
    }

    public function setFocusProject(Project $project)
    {
        $this->focusProject = $project;
        $this->activeTimer = $project->active_time_entry;
    }

    public function startTimer()
    {
        if (!$this->focusProject) return;

        $this->activeTimer = TimeEntry::start($this->focusProject);
    }

    public function stopTimer()
    {
        if (!$this->activeTimer) return;

        $this->activeTimer->stop();
        $this->activeTimer = null;
    }

    public function stopFocusTimer()
    {
        $this->stopTimer();
    }

    public function getRunningTime(): string
    {
        if (!$this->activeTimer) return '00:00:00';

        return $this->activeTimer->duration_formatted;
    }

    public function getIsTimerRunning(): bool
    {
        return $this->activeTimer !== null;
    }
}