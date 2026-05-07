<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeEntry extends Model
{
    protected $table = 'pm_time_entries';

    protected $fillable = [
        'pbi_id',
        'task_id',
        'started_at',
        'ended_at',
        'notes',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function pbi(): BelongsTo
    {
        return $this->belongsTo(PBI::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function getDurationInSecondsAttribute(): int
    {
        if (!$this->ended_at) {
            return now()->diffInSeconds($this->started_at);
        }
        return $this->ended_at->diffInSeconds($this->started_at);
    }

    public function getDurationFormattedAttribute(): string
    {
        $seconds = $this->duration_in_seconds;
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $secs = $seconds % 60;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $secs);
    }

    public static function start(PBI $pbi, ?Task $task = null): self
    {
        // Stop any running timer first
        self::whereNull('ended_at')->where('pbi_id', $pbi->id)->each(function ($entry) {
            $entry->update(['ended_at' => now()]);
        });

        return self::create([
            'pbi_id' => $pbi->id,
            'task_id' => $task?->id,
            'started_at' => now(),
        ]);
    }

    public function stop(): self
    {
        $this->update(['ended_at' => now()]);
        return $this;
    }
}
