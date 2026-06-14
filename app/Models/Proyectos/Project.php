<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'pm_projects';

    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'color',
        'start_date',
        'target_date',
        'user_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'target_date' => 'date',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function pbis(): HasMany
    {
        return $this->hasMany(PBI::class)->orderBy('order');
    }

    public function timeEntries(): HasMany
    {
        return $this->hasMany(TimeEntry::class);
    }

    // public function getTotalHoursAttribute(): float
    // {
    //     return $this->timeEntries()
    //         ->whereNotNull('ended_at')
    //         ->selectRaw('SUM(TIMESTAMPDIFF(SECOND, started_at, ended_at)) as total')
    //         ->value('total') / 3600;
    // }

    public function getActiveTimeEntryAttribute(): ?TimeEntry
    {
        return $this->timeEntries()->whereNull('ended_at')->first();
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public static function priorities(): array
    {
        return ['low', 'medium', 'high', 'urgent'];
    }

    public static function statuses(): array
    {
        return ['active', 'paused', 'completed', 'planning'];
    }

    protected function getStatusClass() {
        $stats = [
            'activeProjects' => Project::where('status', 'active')->count(),
            'pendingTasks' => Task::where('status', '!=', 'completed')->count(),
            'hoursThisWeek' => $this->getHoursThisWeek(),
            'completionRate' => $this->getCompletionRate(),
        ];
        return $stats;
    }
    
    protected function getHoursThisWeek(): float {
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
