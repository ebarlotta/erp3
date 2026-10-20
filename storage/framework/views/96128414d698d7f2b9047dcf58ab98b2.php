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
<?php $component->withAttributes([]); ?>Actores <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>

    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <?php if(session()->has('message')): ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="flex d-flex" style="flex-wrap: wrap;">
                <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Alta de Actores <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $attributes = $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $component = $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
                <div class="flex d-flex text-center flex-wrap justify-content-between" style="margin-top: 23px">
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Todos">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Todos
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Agentes" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Agentes
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios"  type="radio" value="Referentes" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Referentes
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Personal" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Personal
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Proveedores" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Proveedores
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Clientes" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Clientes
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Vendedores" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Vendedores
                        </label>
                    </div>
                    <div class="form-check mx-3" wire:click="Filtrar()">
                        <input class="form-check-input" wire:model="radios" type="radio" value="Empresas" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Empresas
                        </label>
                    </div>
                </div>
                <div class="flex d-flex align-middle" style="margin-top: 23px">
                    <div class="form-check mx-3">
                        <input class="form-input" wire:model="searchActor" wire:keyup="Filtrar()" type="textbox" value="" placeholder="Buscar Nombre/Apellido" style="background-color: darkgray; padding:5px; border-radius:4px;">
                    </div>
                </div>
            </div>
            <?php if($isModalOpen): ?> <?php echo $__env->make('livewire.geri.actores.createactores', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
            <?php if($isModalOpenAdicionales): ?> <?php echo $__env->make('livewire.geri.actores.createactoresadicionales', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
            <?php if($isModalOpenGestionar): ?> <?php echo $__env->make('livewire.geri.actores.createactores2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
            <?php if($showDeleteModal): ?> <?php echo $__env->make('livewire.geri.actores.showDeleteModal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
            <?php if($mostrarModificarIndicacion): ?> <?php echo $__env->make('livewire.geri.actores.modalModificarIndicacion', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
            <?php if($mostrarNuevaIndicacion): ?> <?php echo $__env->make('livewire.geri.actores.modalNuevaIndicacion', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
            <?php if($modalpreguntas): ?> <?php echo $__env->make('livewire.geri.actores.modalpreguntas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>

            <table class="table-fixed">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 col-5">Apellido y Nombre</th>
                        <th class="px-4 py-2 col-2">Tipo</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($actores): ?>
                        <?php $__currentLoopData = $actores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border px-4 py-2 col-5" style="width: 10%"><?php echo e($actor->nombre); ?></td>
                            <td class="border px-4 py-2 col-2"><?php echo e($actor->TipoDePersona->tipodepersona); ?></td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center">
                                    <!-- Gestionar -->
                                    
                                        
                                        
                                        

                                    
                                    <div>

                                    <?php if (isset($component)) { $__componentOriginal76ae29e313a0a5f5b6cde2f854382813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76ae29e313a0a5f5b6cde2f854382813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gestionar','data' => ['id' => ''.e($actor->id).'','desactivado' => ''.e($actor->tipopersona_id==1 ? 'disabled' : 'enabled').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('gestionar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($actor->id).'','desactivado' => ''.e($actor->tipopersona_id==1 ? 'disabled' : 'enabled').'']); ?>Gestionar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76ae29e313a0a5f5b6cde2f854382813)): ?>
<?php $attributes = $__attributesOriginal76ae29e313a0a5f5b6cde2f854382813; ?>
<?php unset($__attributesOriginal76ae29e313a0a5f5b6cde2f854382813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76ae29e313a0a5f5b6cde2f854382813)): ?>
<?php $component = $__componentOriginal76ae29e313a0a5f5b6cde2f854382813; ?>
<?php unset($__componentOriginal76ae29e313a0a5f5b6cde2f854382813); ?>
<?php endif; ?>

                                    </div>
                                    <!-- Editar  -->
                                    <?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($actor->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($actor->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $attributes = $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $component = $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
                                    <!-- Eliminar -->
                                    <?php if (isset($component)) { $__componentOriginal9ddda47f568f29ef52afdb1e96730de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.eliminar','data' => ['id' => ''.e($actor->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('eliminar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($actor->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ddda47f568f29ef52afdb1e96730de3)): ?>
<?php $attributes = $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3; ?>
<?php unset($__attributesOriginal9ddda47f568f29ef52afdb1e96730de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ddda47f568f29ef52afdb1e96730de3)): ?>
<?php $component = $__componentOriginal9ddda47f568f29ef52afdb1e96730de3; ?>
<?php unset($__componentOriginal9ddda47f568f29ef52afdb1e96730de3); ?>
<?php endif; ?>
                                    <!-- Agregar -->
                                    <?php if (isset($component)) { $__componentOriginal0eb03324c17b9ba53bedc23fffe6f859 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0eb03324c17b9ba53bedc23fffe6f859 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.agregar','data' => ['id' => ''.e($actor->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('agregar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($actor->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0eb03324c17b9ba53bedc23fffe6f859)): ?>
<?php $attributes = $__attributesOriginal0eb03324c17b9ba53bedc23fffe6f859; ?>
<?php unset($__attributesOriginal0eb03324c17b9ba53bedc23fffe6f859); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0eb03324c17b9ba53bedc23fffe6f859)): ?>
<?php $component = $__componentOriginal0eb03324c17b9ba53bedc23fffe6f859; ?>
<?php unset($__componentOriginal0eb03324c17b9ba53bedc23fffe6f859); ?>
<?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/actores/actor-component.blade.php ENDPATH**/ ?>