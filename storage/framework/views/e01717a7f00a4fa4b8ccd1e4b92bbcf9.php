<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Tareas</h2>
        <button wire:click="$dispatch('open-modal', 'task-modal')"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            + Nueva Tarea
        </button>
    </div>

    <!-- Filtros -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="flex flex-wrap gap-4">
            <input type="text" wire:model.live="search" placeholder="Buscar tareas..."
                   class="border rounded-lg px-3 py-2 flex-1 min-w-[200px]">
            <select wire:model.live="statusFilter" class="border rounded-lg px-3 py-2">
                <option value="">Todos los estados</option>
                <option value="pending">Pendiente</option>
                <option value="in_progress">En Progreso</option>
                <option value="completed">Completada</option>
            </select>
            <select wire:model.live="priorityFilter" class="border rounded-lg px-3 py-2">
                <option value="">Todas las prioridades</option>
                <option value="low">Baja</option>
                <option value="medium">Media</option>
                <option value="high">Alta</option>
                <option value="urgent">Urgente</option>
            </select>
        </div>
    </div>

    <!-- Lista de Tareas con Drag & Drop -->
    <div class="space-y-2" x-data="{
        dragging: null,
        dragover(e) { e.preventDefault() },
        drop(e) {
            e.preventDefault()
            const id = this.dragging
            const newOrder = this.$refs.task.value
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('updateOrder', [{ value: id, order: newOrder }])
            this.dragging = null
        }
    }">
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div draggable="true"
                 @dragstart="dragging = <?php echo e($task->id); ?>"
                 @dragover="dragover"
                 @drop="drop"
                 class="bg-white p-4 rounded-lg shadow border-l-4
                        <?php if($task->status === 'completed'): ?> border-green-500 opacity-75
                        <?php elseif($task->status === 'in_progress'): ?> border-blue-500
                        <?php else: ?> border-gray-300 <?php endif; ?>">
                <div class="flex items-center gap-3">
                    <!-- Drag Handle -->
                    <div class="cursor-move text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0
0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
stroke-width="2"
                                  d="M4 8h16M4 16h16"/>
                        </svg>
                    </div>

                    <!-- Checkbox estado -->
                    <button wire:click="toggleStatus(<?php echo e($task->id); ?>)"
                            class="w-5 h-5 rounded border-2 flex items-center
justify-center
                            <?php if($task->status === 'completed'): ?> bg-green-500
border-green-500 text-white
                            <?php else: ?> border-gray-300 <?php endif; ?>">
                        <?php if($task->status === 'completed'): ?>
                            ✓
                        <?php endif; ?>
                    </button>

                    <div class="flex-1">
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium <?php if($task->status === 'completed'): ?>
line-through text-gray-500 <?php endif; ?>">
                                <?php echo e($task->title); ?>

                            </h4>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-1">
                            <span class="text-xs px-2 py-0.5 rounded-full
                                <?php if($task->priority === 'urgent'): ?> bg-red-100 text-red-800
                                <?php elseif($task->priority === 'high'): ?> bg-orange-100
text-orange-800
                                <?php elseif($task->priority === 'medium'): ?> bg-yellow-100
text-yellow-800
                                <?php else: ?> bg-gray-100 text-gray-800 <?php endif; ?>">
                                <?php echo e(ucfirst($task->priority)); ?>

                            </span>

                            <?php if($task->due_date): ?>
                                <span class="text-xs text-gray-500">
                                    📅 <?php echo e($task->due_date->format('d/m/Y')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button wire:click="$dispatch('edit-task', { id: <?php echo e($task->id); ?>

})"
                                class="text-gray-500 hover:text-blue-600 p-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0
002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button wire:click="delete(<?php echo e($task->id); ?>)"
                                wire:confirm="¿Eliminar esta tarea?"
                                class="text-gray-500 hover:text-red-600 p-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0
01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-4">
        
    </div>

    
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/proyectos/task-listN.blade.php ENDPATH**/ ?>