<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-white">
            <?php echo e($project ? 'Editar Proyecto' : 'Nuevo Proyecto'); ?>

        </h2>
        <a href="<?php echo e(route('proyectos.index')); ?>">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Volver
            </button>
        </a>
        
    </div>

    <form wire:submit="save" class="space-y-6">
        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Nombre</label>
            <input
                type="text"
                wire:model="name"
                class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                placeholder="Nombre del proyecto"
            >
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Descripción</label>
            <textarea wire:model="description" rows="3" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Descripción opcional"></textarea>
        </div>

        <!-- Status & Priority -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Estado</label>
                <select wire:model="status" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500">
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status); ?>"><?php echo e(ucfirst($status)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Prioridad</label>
                <select wire:model="priority" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500">
                    <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($priority); ?>"><?php echo e(ucfirst($priority)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <!-- Color -->
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Color</label>
            <div class="flex gap-3">
                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hex => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button
                        type="button"
                        wire:click="$set('color', '<?php echo e($hex); ?>')"
                        class="w-8 h-8 rounded-lg transition-transform hover:scale-110 <?php echo e($color === $hex ? 'ring-2 ring-white ring-offset-2 ring-offset-slate-900' : ''); ?>"
                        style="background-color: <?php echo e($hex); ?>"
                        title="<?php echo e($name); ?>"
                    ></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Dates -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Fecha de Inicio</label>
                <input
                    type="date"
                    wire:model="start_date"
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Fecha Objetivo</label>
                <input
                    type="date"
                    wire:model="target_date"
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                >
            </div>
        </div>

        <!-- Submit -->
        <div class="flex gap-4 pt-4">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium"
            >
                <?php echo e($project ? 'Actualizar' : 'Crear Proyecto'); ?>

            </button>
            <a href="<?php echo e(route('proyectos.index')); ?>" class="text-slate-400 hover:text-white px-6 py-2">
                Cancelar
            </a>
        </div>
    </form>

    <?php if(session('message')): ?>
        <div class="mt-4 p-4 bg-green-500/20 text-green-400 rounded-lg">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/proyectos/project-form.blade.php ENDPATH**/ ?>