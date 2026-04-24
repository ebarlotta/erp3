# Project Manager Module

Módulo Laravel/Livewire standalone para gestión de múltiples proyectos.

## Estructura Actual

```
project-manager-module/
├── SPEC.md              # Especificación
├── mockup.html          # Mockup visual ✓
├── README.md            # Este archivo
├── app/
│   ├── Http/
│   │   └── Livewire/
│   │       ├── Dashboard.php       ✓
│   │       ├── ProjectList.php     ✓
│   │       ├── ProjectForm.php     ✓
│   │       ├── TaskList.php        ✓
│   │       ├── TimeTracker.php     ✓
│   │       └── FocusWidget.php     ✓
│   └── Models/
│       ├── Project.php             ✓
│       ├── Task.php                ✓
│       └── TimeEntry.php           ✓
├── database/
│   └── migrations/
│       └── 2026_04_23_000001_create_projects_tables.php  ✓
├── resources/
│   └── views/
│       └── livewire/
│           ├── dashboard.blade.php           (pendiente)
│           ├── project-list.blade.php        (pendiente)
│           ├── project-form.blade.php         (pendiente)
│           ├── task-list.blade.php            (pendiente)
│           ├── time-tracker.blade.php         (pendiente)
│           └── focus-widget.blade.php         (pendiente)
└── routes/
    └── web.php                        (pendiente)
```

## Estado

- ✅ Migration (3 tablas)
- ✅ Modelos (Project, Task, TimeEntry)
- ✅ Livewire Components (6 componentes)
- ⏳ Blade Views (6 vistas)
- ⏳ Rutas

## Siguiente

¿Querés que continúe con las vistas Blade? Son straightforward porqueFollow del mockup visual que ya tenemos.

## Instalación

1. Copiar `app/Models/Project.php`, `Task.php`, `TimeEntry.php` a `app/Models/`
2. Copiar `app/Http/Livewire/*.php` a `app/Http/Livewire/`
3. Ejecutar migración
4. Agregar rutas en `routes/web.php`
5. Crear las vistas Blade

## Rutas

```php
Route::prefix('projects')->group(function () {
    Route::get('/', \App\Http\Livewire\Dashboard::class)->name('projects.index');
    Route::get('/create', \App\Http\Livewire\ProjectForm::class)->name('projects.create');
    Route::get('/{project}/edit', \App\Http\Livewire\ProjectForm::class)->name('projects.edit');
    Route::get('/{project}/tasks', \App\Http\Livewire\TaskList::class)->name('projects.tasks');
    Route::get('/time', \App\Http\Livewire\TimeTracker::class)->name('projects.time');
});
```