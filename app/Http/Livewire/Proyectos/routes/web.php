<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ProjectList;
use App\Http\Livewire\ProjectForm;
use App\Http\Livewire\TaskList;
use App\Http\Livewire\TimeTracker;
use App\Http\Livewire\FocusWidget;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| Project Manager Routes
|--------------------------------------------------------------------------
|
| Agregar estas rutas en routes/web.php de tu aplicación Laravel
|
*/

Route::prefix('projects')->name('projects.')->group(function () {
    // Dashboard
    Route::get('/', Dashboard::class)->name('index');
    
    // Project CRUD
    Route::get('/create', ProjectForm::class)->name('create');
    Route::get('/{project}/edit', ProjectForm::class)->name('edit');
    
    // Tasks
    Route::get('/{project}/tasks', TaskList::class)->name('tasks');
    
    // Time Tracker
    Route::get('/time', TimeTracker::class)->name('time');
});

/*
|--------------------------------------------------------------------------
| Focus Widget Route (para embedding)
|--------------------------------------------------------------------------
|
| Puedes incluir el widget de Focus en cualquier página
|
*/

Route::get('/projects/focus-widget', FocusWidget::class)->name('projects.focus-widget');

/*
|--------------------------------------------------------------------------
| Uso del Focus Widget en otras páginas
|--------------------------------------------------------------------------
|
| En cualquier vista Blade, puedes usar:
|
|   @livewire(\App\Http\Livewire\FocusWidget::class)
|
| O incluir el componente:
|
|   <livewire:focus-widget />
|
*/