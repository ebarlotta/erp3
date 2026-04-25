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

    public function timeEntries(): HasMany
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function getTotalHoursAttribute(): float
    {
        return $this->timeEntries()
            ->whereNotNull('ended_at')
            ->selectRaw('SUM(TIMESTAMPDIFF(SECOND, started_at, ended_at)) as total')
            ->value('total') / 3600;
    }

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
}
