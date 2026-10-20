   <!-- This example requires Tailwind CSS v2.0+ -->
   <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
         <!--
            Background overlay, show/hide based on modal state.

            Entering: "ease-out duration-300"
               From: "opacity-0"
               To: "opacity-100"
            Leaving: "ease-in duration-200"
               From: "opacity-100"
               To: "opacity-0"
         -->
         <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

         <!-- This element is to trick the browser into centering the modal contents. -->
         <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

         <!--
            Modal panel, show/hide based on modal state.

            Entering: "ease-out duration-300"
               From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
               To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
               From: "opacity-100 translate-y-0 sm:scale-100"
               To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         -->
         <div class="inline-block align-bottom bg-white pt-5 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-11/12 w-11/12" style="width: 90%; margin-left: 18%;">
            <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
               <div class="sm:flex sm:items-start">
                  
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                     <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        <?php if (isset($component)) { $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.titulo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('titulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Producto <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
                     </h3>
                     <div class="mt-2">
                        <p class="text-sm text-gray-500">
                           <?php echo e($slot); ?>

                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/components/producto.blade.php ENDPATH**/ ?>