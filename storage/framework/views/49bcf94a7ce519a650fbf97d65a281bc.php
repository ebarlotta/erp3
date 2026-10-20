<div x-data x-init="$dispatch('filter-pills-updated', { filterPillValues: <?php echo \Illuminate\Support\Js::from($returnValues)->toHtml() ?>, tableComponent: <?php echo \Illuminate\Support\Js::from($tableComponent)->toHtml() ?> })"
    >
    <?php echo e($slot); ?>

</div><?php /**PATH /home/casa-pc/Proyectos/erp3/vendor/rappasoft/laravel-livewire-tables/resources/views/components/external/filters/livewire-array-filter.blade.php ENDPATH**/ ?>