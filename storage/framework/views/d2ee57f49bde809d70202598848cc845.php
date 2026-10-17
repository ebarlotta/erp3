<div>
    <a href="<?php echo e(route('projects.index')); ?>">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            Volver
        </button>
    </a>
    <header class="mb-8">
        <h2 class="text-2xl font-bold text-white">Time Tracker</h2>
        <p class="text-slate-400 text-sm">Registra el tiempo en tus proyectos</p>
    </header>

    <!-- Timer Control -->
    <div class="bg-slate-800 rounded-xl p-6 border border-slate-700 mb-8">
        <div class="flex items-center gap-6">
            <!-- Project Select -->
            <div class="flex-1">
                <label class="block text-sm text-slate-400 mb-2">Proyecto</label>
                <select wire:model="selectedProject" wire:change="changeProject($event.target.value)" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white" <?php echo e($currentEntry ? 'disabled' : ''); ?>>
                    <option value="">Seleccionar proyecto...</option>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Task Select -->
            <div class="flex-1">
                <label class="block text-sm text-slate-400 mb-2">Tarea (opcional)</label>
                <select wire:model="selectedTask" wire:change="changeTask($event.target.value)" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white" <?php echo e($currentEntry ? 'disabled' : ''); ?>>
                    <option value="">Sin tarea específica</option>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($task->id); ?>"><?php echo e($task->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Timer Display -->
            <div class="text-center">
                <label class="block text-sm text-slate-400 mb-2">Tiempo</label>
                <div class="text-4xl font-mono text-white <?php echo e($currentEntry ? 'timer-active' : ''); ?>">
                    <?php echo e($runningTime); ?>

                </div>
            </div>

            <!-- Start/Stop Button -->
            <div class="flex items-end">
                <?php if($currentEntry): ?>
                    <button wire:click="stopTimer" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <rect x="6" y="6" width="8" height="8"/>
                        </svg>
                        Detener
                    </button>
                <?php else: ?>
                    <button wire:click="startTimer" <?php echo e(!$selectedProject || !$selectedTask ? 'disabled' : ''); ?> class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                        Iniciar
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Time Entries History -->
    <h3 class="text-lg font-semibold text-white mb-4">Historial</h3>
    <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-slate-900 text-slate-400 text-sm">
                <tr>
                    <th class="text-left px-4 py-3">Proyecto</th>
                    <th class="text-left px-4 py-3">Tarea</th>
                    <th class="text-left px-4 py-3">Inicio</th>
                    <th class="text-left px-4 py-3">Fin</th>
                    <th class="text-left px-4 py-3">Duración</th>
                    <th class="text-right px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                <?php $__empty_1 = true; $__currentLoopData = $timeEntries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="text-sm">
                        <td class="px-4 py-3 text-white"><?php echo e($entry->project->name); ?></td>
                        <td class="px-4 py-3 text-slate-400"><?php echo e($entry->task->title ?? '-'); ?></td>
                        <td class="px-4 py-3 text-slate-400"><?php echo e($entry->started_at->format('d/m H:i')); ?></td>
                        <td class="px-4 py-3 text-slate-400"><?php echo e($entry->ended_at?->format('d/m H:i') ?? '-'); ?></td>
                        <td class="px-4 py-3 text-white font-mono"><?php echo e($entry->duration_formatted); ?></td>
                        <td class="px-4 py-3 text-right">
                            <button wire:click="deleteEntry(<?php echo e($entry->id); ?>)" class="text-slate-500 hover:text-red-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-slate-400">
                            No hay registros de tiempo.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if($timeEntries->hasPages()): ?>
            <div class="px-4 py-3 border-t border-slate-700">
                <?php echo e($timeEntries->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/proyectos/time-tracker.blade.php ENDPATH**/ ?>