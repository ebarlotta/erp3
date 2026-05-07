<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'pm_tasks';

    protected $fillable = [
        'pbi_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'order',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function pbi(): BelongsTo
    {
        return $this->belongsTo(PBI::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function timeEntries(): HasMany
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public static function statuses(): array
    {
        return ['pending', 'in_progress', 'completed'];
    }

    public static function priorities(): array
    {
        return ['low', 'medium', 'high', 'urgent'];
    }
}
