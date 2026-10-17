<div class="calendar-container">
    <!-- Controles de navegación -->
    <div class="calendar-header d-flex flex" style="justify-content: center;">
        <button wire:click="cambiarMes(-1)" class="calendar-nav-btn mr-3">&lt;</button>
        <h3 class="calendar-title"><?php echo e($nombreMes); ?> <?php echo e($anio); ?></h3>
        <button wire:click="cambiarMes(1)" class="calendar-nav-btn ml-3">&gt;</button>
    </div>

    <!-- Días de la semana -->
    <div style="grid-template-columns: repeat(7, 1fr);display: grid;">
        <?php $__currentLoopData = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="week-day  normal-day"><?php echo e($dia); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Grid de días -->
        <?php $__currentLoopData = $diasCalendario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                wire:click="seleccionarDia(<?php echo e($dia['numero']); ?>)"
                class="hover:bg-gray-200 calendar-day normal-day <?php echo e(!$dia['esMesActual'] ? 'other-month' : 
                    ($diaSeleccionado == $dia['numero'] ? 'selected bg-gray-400' : 
                    ($dia['esHoy'] ? 'today' : 'normal-day'))); ?>">
                <?php echo e($dia['numero']); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/components/registro/calendario-component.blade.php ENDPATH**/ ?>