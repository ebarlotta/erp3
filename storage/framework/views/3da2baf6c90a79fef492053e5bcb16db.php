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
            <h1 class="text-2xl font-bold text-white">Product Backlog</h1>
            <div>
            <button wire:click="create(<?php echo e($project->id); ?>)" class="bg-blue-500 text-white px-4 py-2 rounded ">
                + Nuevo Product Backlog Item
            </button>
            <a href="<?php echo e(route('projects.index')); ?>">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Volver
                </button>
            </a>
            </div>
        </div>

        <!-- Flash Message -->
        <?php if(session()->has('message')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>

        <!-- Tabla de PBIs -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">Prioridad</th>
                        <th class="px-6 py-3 text-left">Título</th>
                        <th class="px-6 py-3 text-left">Tipo</th>
                        <th class="px-6 py-3 text-left">Estado</th>
                        <th class="px-6 py-3 text-left">Story Points</th>
                        <th class="px-6 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pbis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pbi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="px-6 py-4">
                            <input type="text" wire:change="updatePriority(<?php echo e($pbi->id); ?>, $event.target.value)" value="<?php echo e($pbi->priority); ?>" class="w-20 border rounded px-2 py-1">
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium"><?php echo e($pbi->title); ?></div>
                            <div class="text-sm text-gray-500"><?php echo e(Str::limit($pbi->description, 50)); ?></div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-sm 
                                <?php if($pbi->type == 'FEATURE'): ?> bg-blue-100 text-blue-800
                                <?php elseif($pbi->type == 'BUG'): ?> bg-red-100 text-red-800
                                <?php elseif($pbi->type == 'TASK'): ?> bg-green-100 text-green-800
                                <?php else: ?> bg-gray-100 text-gray-800
                                <?php endif; ?>">
                                <?php echo e($pbi->type); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <select wire:change="updateStatus(<?php echo e($pbi->id); ?>, $event.target.value)"
                                    class="border rounded px-2 py-1">
                                <option value="PENDING" <?php echo e($pbi->status == 'PENDING' ? 'selected' : ''); ?>>
                                    Pendiente
                                </option>
                                <option value="IN_PROGRESS" <?php echo e($pbi->status == 'IN_PROGRESS' ? 'selected' : ''); ?>>
                                    En Progreso
                                </option>
                                <option value="DONE" <?php echo e($pbi->status == 'DONE' ? 'selected' : ''); ?>>
                                    Completado
                                </option>
                            </select>
                        </td>
                        <td class="px-6 py-4"><?php echo e($pbi->story_points ?? '-'); ?></td>
                        <td class="px-6 py-4">
                            <button wire:click="edit(<?php echo e($pbi->id); ?>)" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                Editar
                            </button>
                            <button wire:click="edit_tasks(<?php echo e($pbi->id); ?>)" class="bg-blue-300 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Tareas
                            </button>
                            <button wire:click="delete(<?php echo e($pbi->id); ?>)" onclick="confirm('¿Eliminar este PBI?') || event.stopImmediatePropagation()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Eliminar
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-6 py-4">
                <?php echo e($pbis->links()); ?>

            </div>
        </div>

        <!-- Modal para crear/editar -->
        <?php if($showModal): ?>
        
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 w-2/4">
                <h2 class="text-xl font-bold mb-4">
                    <?php echo e($editingPBI ? 'Editar Product Backlog Item' : 'Nuevo Product Backlog Item'); ?>

                </h2>
                <div class="flex">
                    <div class="space-y-2 mr-1">
                        <div>
                            <label class="block text-sm font-medium mb-1">Título</label>
                            <input type="text" wire:model="title" class="w-full border rounded px-3 py-2">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Descripción</label>
                            <textarea wire:model="description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Tipo</label>
                            <select wire:model="type" class="w-full border rounded px-3 py-2">
                                <option value="FEATURE">Feature</option>
                                <option value="BUG">Bug</option>
                                <option value="TASK">Task</option>
                                <option value="TECH_DEBT">Tech Debt</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-2 ml-1">                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Prioridad</label>
                            <input type="number" wire:model="priority" class="w-full border rounded px-3 py-2">
                            <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Urgencia (1-10)</label>
                            <input type="number" wire:model="urgencia" class="w-full border rounded px-3 py-2" title="Alta (7-10) - Media (4-6) - Baja (1-3)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Valor del Negocio ( 1 - 10 )</label>
                            <input type="number" wire:model="valor_negocio" class="w-full border rounded px-3 py-2" title="impacto en ingresos/satisfacción">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Costo Estimado 1-10 <br>(complejidad + recursos + dependencias) </label>
                            <input type="number" wire:model="costo_estimado" class="w-full border rounded px-3 py-2" tit
                        le="Esfuerzo requerido para implementar (1-10)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">
                                Tiempo Límite (días)
                                <span class="text-xs text-gray-500">(plazo máximo para tener listo)</span>
                            </label>
                            <input type="number" wire:model="tiempo_limite_dias" class="w-full border rounded px-3 py-2">
                            <?php $__errorArgs = ['tiempo_limite_dias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Story Points (story_points promedio por sprint)</label>
                            <input type="number" wire:model="story_points" class="w-full border rounded px-3 py-2" title="Estimación de esfuerzo en story points (ej: 1, 2, 3, 5, 8)">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-2">
                    <button wire:click="$set('showModal', false)" class="px-4 py-2 border rounded">
                        Cancelar
                    </button>
                    <button wire:click="save" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/proyectos/product-backlog.blade.php ENDPATH**/ ?>