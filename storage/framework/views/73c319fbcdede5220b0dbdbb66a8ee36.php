<div>
    <style>
          .btn-icon {
              width: 30px;
              height: 30px;
              padding: 0;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              margin: 0 2px;
          }
      </style>
      
    <div class="flex d-flex flex-wrap mt-4">

      <?php if (isset($component)) { $__componentOriginal35208870814487a571a97d997354e079 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35208870814487a571a97d997354e079 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['mostrar' => 'papeles','title' => 'Tipo de Papel']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35208870814487a571a97d997354e079)): ?>
<?php $attributes = $__attributesOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__attributesOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35208870814487a571a97d997354e079)): ?>
<?php $component = $__componentOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__componentOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal35208870814487a571a97d997354e079 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35208870814487a571a97d997354e079 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['mostrar' => 'lados','title' => 'Lados']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35208870814487a571a97d997354e079)): ?>
<?php $attributes = $__attributesOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__attributesOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35208870814487a571a97d997354e079)): ?>
<?php $component = $__componentOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__componentOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal35208870814487a571a97d997354e079 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35208870814487a571a97d997354e079 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['mostrar' => 'sistemas','title' => 'Sistemas de Impresión']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35208870814487a571a97d997354e079)): ?>
<?php $attributes = $__attributesOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__attributesOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35208870814487a571a97d997354e079)): ?>
<?php $component = $__componentOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__componentOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal35208870814487a571a97d997354e079 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35208870814487a571a97d997354e079 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['mostrar' => 'tipos','title' => 'Tipos de Documentos']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35208870814487a571a97d997354e079)): ?>
<?php $attributes = $__attributesOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__attributesOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35208870814487a571a97d997354e079)): ?>
<?php $component = $__componentOriginal35208870814487a571a97d997354e079; ?>
<?php unset($__componentOriginal35208870814487a571a97d997354e079); ?>
<?php endif; ?>
    </div>
  </div>
  <?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/imprenta/admin-component.blade.php ENDPATH**/ ?>