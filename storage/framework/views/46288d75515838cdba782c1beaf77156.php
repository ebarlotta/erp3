<div>

  <body class="text-gray-300 min-h-screen bg-slate-900">
        <!-- Overlay -->
        <div id="overlay" class="overlay" onclick="toggleMenu()"></div>

        <div class="flex">
        
        <?php if (isset($component)) { $__componentOriginal67736e37b9b96579c07189d5b4d96ad4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67736e37b9b96579c07189d5b4d96ad4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.project_header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('project_header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67736e37b9b96579c07189d5b4d96ad4)): ?>
<?php $attributes = $__attributesOriginal67736e37b9b96579c07189d5b4d96ad4; ?>
<?php unset($__attributesOriginal67736e37b9b96579c07189d5b4d96ad4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67736e37b9b96579c07189d5b4d96ad4)): ?>
<?php $component = $__componentOriginal67736e37b9b96579c07189d5b4d96ad4; ?>
<?php unset($__componentOriginal67736e37b9b96579c07189d5b4d96ad4); ?>
<?php endif; ?>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header con botón hamburguesa para MÓVIL -->
                <header class="mobile-header flex items-center justify-between mb-6">
                    <button onclick="toggleMenu()" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-xl font-bold text-white">Dashboard</h1>
                    <div class="w-6"></div>
                </header>

                <!-- Header para ESCRITORIO -->
                <header class="desktop-header flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Dashboard</h2>
                        <p class="text-slate-400 text-sm">Gestiona tus proyectos</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" wire:model.live="search" placeholder="Buscar proyectos..." class="bg-slate-800 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-sm text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 w-64">
                        </div>
                        <select wire:model.live="statusFilter" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-blue-500">
                            <option value="">Todos los estados</option>
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>"><?php echo e(ucfirst($status)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <a href="<?php echo e(route('projects.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Nuevo Proyecto
                        </a>
                        <a href="<?php echo e(route('projects.time')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Cronómetros
                        </a>
                    </div>
                </header>

        <!-- Stats -->
        <?php if (isset($component)) { $__componentOriginalf02dab0b323f6633f73989896f44c3b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf02dab0b323f6633f73989896f44c3b5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.project-stats','data' => ['stats' => $stats]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('project-stats'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf02dab0b323f6633f73989896f44c3b5)): ?>
<?php $attributes = $__attributesOriginalf02dab0b323f6633f73989896f44c3b5; ?>
<?php unset($__attributesOriginalf02dab0b323f6633f73989896f44c3b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf02dab0b323f6633f73989896f44c3b5)): ?>
<?php $component = $__componentOriginalf02dab0b323f6633f73989896f44c3b5; ?>
<?php unset($__componentOriginalf02dab0b323f6633f73989896f44c3b5); ?>
<?php endif; ?>
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Tasks List</h1>
            <div>
            <select wire:model.live="filterStatus" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white">
                <option value="">Todas</option>
                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>"><?php echo e(ucfirst($status)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
                <a href="<?php echo e(route('projects.product-backlog', $project_id)); ?>">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Volver</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Add Task -->
    <div class="bg-slate-800 rounded-xl p-4 border border-slate-700 mb-6">
        <form wire:submit="addTask" class="flex gap-3">
            <input
                type="text"
                wire:model="newTaskTitle"
                placeholder="Nueva tarea..."
                class="flex-1 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white placeholder-slate-400 focus:outline-none focus:border-blue-500"
            >
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Agregar
            </button>
        </form>
    </div>

    <!-- Tasks List -->
    <div class="space-y-2">
        <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-slate-800 rounded-lg p-4 border border-slate-700 flex items-center gap-4">
                <!-- Checkbox -->
                <button
                    wire:click="updateStatus(<?php echo e($task->id); ?>, '<?php echo e($task->status === 'completed' ? 'pending' : 'completed'); ?>')" class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors <?php echo e($task->status === 'completed' ? 'bg-green-500 border-green-500' : 'border-slate-600 hover:border-slate-400'); ?>">
                    <?php if($task->status === 'completed'): ?>
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    <?php endif; ?>
                </button>

                <!-- Title -->
                <div class="flex-1">
                    <span class="<?php echo e($task->status === 'completed' ? 'text-slate-500 line-through' : 'text-white'); ?>">
                        <?php echo e($task->title); ?>

                    </span>
                </div>

                
                <div class="flex-1">
                    <span class="<?php echo e($task->status === 'completed' ? 'text-slate-500 line-through' : 'text-white'); ?>">
                        <?php echo e($task->status); ?>

                    </span>
                </div>

                <!-- Priority -->
                <select  wire:change="updatePriority(<?php echo e($task->id); ?>, $event.target.value)" class="bg-slate-900 border border-slate-700 rounded px-2 py-1 text-xs text-white">
                    <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($priority); ?>" <?php echo e($task->priority === $priority ? 'selected' : ''); ?>>
                            <?php echo e(ucfirst($priority)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <!-- Due Date -->
                <?php if($task->due_date): ?>
                    <span class="text-xs text-slate-400"><?php echo e($task->due_date->format('d/m')); ?></span>
                <?php endif; ?>

                <!-- Delete -->
                <button wire:click="deleteTask(<?php echo e($task->id); ?>)" class="text-slate-500 hover:text-red-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-8 text-slate-400">
                No hay tareas todavía.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/proyectos/task-list.blade.php ENDPATH**/ ?>