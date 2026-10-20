<div>
   <?php if (isset($component)) { $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.titulo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('titulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Relacionar Usuarios a Empresas <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
    <?php $__env->slot('header', null, []); ?> 
       <div class="flex">
           <!-- //Comienza en submenu de encabezado -->

           <!-- Navigation Links -->
           
       </div>

    <?php $__env->endSlot(); ?>

   <div class="content-center flex">
       <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-1">
                   <?php if(session()->has('message')): ?>
                       <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                           role="alert">
                           <div class="flex">
                               <div>
                                   <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                               </div>
                           </div>
                       </div>
                   <?php endif; ?>
               </div>
           </div>
       </div>
   </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/empresa-usuarios/empresarelacion.blade.php ENDPATH**/ ?>