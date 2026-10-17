<div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
        <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
            <div class="text-slate-400 text-xs md:text-sm mb-1">Proyectos Activos</div>
            <div class="text-2xl md:text-3xl font-bold text-white"><?php echo e($stats['activeProjects']); ?></div>
        </div>
        <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
            <div class="text-slate-400 text-xs md:text-sm mb-1">Tareas Pendientes</div>
            <div class="text-2xl md:text-3xl font-bold text-white"><?php echo e($stats['pendingTasks']); ?></div>
        </div>
        <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
            <div class="text-slate-400 text-xs md:text-sm mb-1">Horas Esta Semana</div>
            <div class="text-2xl md:text-3xl font-bold text-blue-400"><?php echo e(number_format($stats['hoursThisWeek'], 1)); ?>h</div>
        </div>
        <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
            <div class="text-slate-400 text-xs md:text-sm mb-1">Completado</div>
            <div class="text-2xl md:text-3xl font-bold text-green-400"><?php echo e($stats['completionRate']); ?>%</div>
        </div>
    </div>
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/components/project-stats.blade.php ENDPATH**/ ?>