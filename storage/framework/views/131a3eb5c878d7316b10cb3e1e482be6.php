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
            <main class="flex-1 p-4 md:p-8">
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
                        <a href="<?php echo e(route('proyectos.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Nuevo Proyecto
                        </a>
                        <a href="<?php echo e(route('proyectos.time')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
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

                <!-- Projects Grid -->
                <h3 class="text-base md:text-lg font-semibold text-white mb-4">Tus Proyectos</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('projects.product-backlog', $project->id)); ?>" class="project-card bg-slate-800 rounded-xl p-4 md:p-6 border border-slate-700 cursor-pointer hover:border-slate-600">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-lg flex items-center justify-center" style="background-color: <?php echo e($project->color); ?>20">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" style="color: <?php echo e($project->color); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white text-sm md:text-base"><?php echo e($project->name); ?></h4>
                                        <p class="text-xs text-slate-400"><?php echo e($project->tasks_count); ?> tareas</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full font-medium <?php echo e($this->getStatusClass($project->status)); ?>">
                                    <?php echo e(ucfirst($project->status)); ?>

                                </span>
                            </div>

                            <?php if($project->description): ?>
                                <p class="text-xs md:text-sm text-slate-400 mb-4 line-clamp-2"><?php echo e($project->description); ?></p>
                            <?php endif; ?>

                            <div class="flex items-center justify-between text-xs md:text-sm">
                                <div class="flex items-center gap-4">
                                    <span class="text-slate-400">
                                        <span class="<?php echo e($this->getPriorityClass($project->priority)); ?>">●</span>
                                        <?php echo e(ucfirst($project->priority)); ?>

                                    </span>
                                </div>
                                <span class="text-slate-500"><?php echo e(number_format($project->total_hours ?? 0, 1)); ?>h</span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-400">No hay proyectos todavía.</p>
                            <a href="<?php echo e(route('proyectos.create')); ?>" class="text-blue-400 hover:underline">Crear el primero</a>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
        
    </body>
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/proyectos/dashboard.blade.php ENDPATH**/ ?>