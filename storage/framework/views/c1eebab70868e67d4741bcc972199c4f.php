<?php ($setErrorsBag($errors ?? null)); ?>



<?php $__env->startSection('input_group_item'); ?>

    <div class="custom-file">

        
        <input type="file" id="<?php echo e($id); ?>" name="<?php echo e($name); ?>"
            <?php echo e($attributes->merge(['class' => $makeItemClass()])); ?>>

        
        <label class="custom-file-label text-truncate" for="<?php echo e($id); ?>"
            <?php if(isset($legend)): ?> data-browse="<?php echo e($legend); ?>" <?php endif; ?>>
            <?php echo e($placeholder); ?>

        </label>

    </div>

<?php $__env->stopSection(true); ?>



<?php if (! $__env->hasRenderedOnce('86d705cb-2256-4d5e-834c-4a4ae76e386f')): $__env->markAsRenderedOnce('86d705cb-2256-4d5e-834c-4a4ae76e386f'); ?>
<?php $__env->startPush('js'); ?>
<script>

    $(() => {
        bsCustomFileInput.init();
    })

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>




<?php if (! $__env->hasRenderedOnce('7e7ef3f8-3e05-4760-8f75-dfc80c9da064')): $__env->markAsRenderedOnce('7e7ef3f8-3e05-4760-8f75-dfc80c9da064'); ?>
<?php $__env->startPush('css'); ?>
<style type="text/css">

    
    .input-group-sm .custom-file-label:after {
        height: 1.8125rem;
        line-height: 1.25;
    }
    .input-group-sm .custom-file-label {
        height: calc(1.8125rem + 2px);
        line-height: 1.25;
    }
    .input-group-sm .custom-file {
        height: calc(1.8125rem + 2px);
        font-size: .875rem;
    }

    
    .input-group-lg .custom-file-label:after {
        height: 2.875rem;
        line-height: 1.6;
    }
    .input-group-lg .custom-file-label {
        height: calc(2.875rem + 2px);
        line-height: 1.6;
    }
    .input-group-lg .custom-file {
        height: calc(2.875rem + 2px);
        font-size: 1.25rem;
    }

</style>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('adminlte::components.form.input-group-component', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/casa-pc/Proyectos/erp3/vendor/jeroennoten/laravel-adminlte/resources/views/components/form/input-file.blade.php ENDPATH**/ ?>