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
                    <?php if(session()->has('messageerror')): ?>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen"><?php echo e(session('messageerror')); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($seleccionado): ?>
                        <div class="text-left">
                            <button wire:click="mostrarmodal()"
                                class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
                                Relacionar nuevo Usuario
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($isModalOpen): ?>
                    <?php echo $__env->make('livewire.empresa-usuarios.createempresausuarios', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
                <?php if($isModalRoles): ?>
                    <?php echo $__env->make('livewire.empresa-usuarios.adminempresausuarios-roles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
                <?php if($datos): ?>
                    <div class="flex">
                        <div class="h-full" style="width: 40%">
                            Empresas
                            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul>
                                    <li class="border text-left <?php if($seleccionado == $empresa->id): ?> bg-red-100 <?php endif; ?>"
                                        wire:click="CargarUsuarios(<?php echo e($empresa->id); ?>)">
                                        <div class="w-full lg:p-3 hover:scale-105 transition-all duration-500">
                                            <div class="flex rounded overflow-hidden border flex-wrap">
                                                <?php if($empresa->imagen): ?>
                                                <img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover"
                                                    src="<?php echo e(asset('/'. $empresa->imagen)); ?>"
                                                    style="width: 60px; height: 60px;">
                                                <?php else: ?>
                                                <img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover"
                                                    src="<?php echo e(asset('images/sin_imagen.jpg')); ?>"
                                                    style="width: 60px; height: 60px;">
                                                <?php endif; ?>
                                                <div class="bg-white w-full rounded-b flex flex-col justify-between leading-normal">
                                                    <div class="<?php if($seleccionado == $empresa->id): ?> bg-red-100 <?php endif; ?> lg:text-lg md:font-bold md:fs-6 text-center md:text-left md:text-sm text-grey-darker text-base">
                                                        <?php echo e($empresa->name); ?>

                                                    </div>
                                                    <p class="<?php if($seleccionado == $empresa->id): ?> bg-red-100 <?php endif; ?> lg:text-lg md:font-bold md:fs-6 text-center md:text-left md:text-sm text-grey-darker text-base">
                                                        <?php echo e($empresa->cuit); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="w-full"><?php echo e($datos->links()); ?></div>
                        </div>
                        <div>
                            <div class="bg-transparent flex-wrap">Usuarios</div>
                            <?php if($usuariosdelaempresa): ?>
                                <?php $__currentLoopData = $usuariosdelaempresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <ul>
                                        <li class="border px-4 py-2 text-left bg-red-100">
                                            <div class="w-full p-2 hover:scale-110 transition-all duration-500">
                                                <div class="flex rounded overflow-hidden border">
                                                    <?php if($usuario['profile_photo_path']): ?>
                                                        <img class="hidden sm:block rounded-md flex-none bg-cover" src="<?php echo e(asset($usuario['profile_photo_path'] )); ?>" style="width: 100px; height: auto;">
                                                       
                                                    <?php else: ?>
                                                        <img class="hidden sm:block rounded-md flex-none bg-cover" src="<?php echo e(asset('images/sin_imagen.jpg')); ?>" style="width: 85px; height: auto;">
                                                    <?php endif; ?>
                                                    
                                                    <div>
                                                        <div class="bg-white rounded-b pl-4 leading-normal" style="min-width: 200px; padding-right: 17px; padding-bottom: 10px;">
                                                            <div class="d-flex lg:text-lg md:font-bold md:fs-6 text-center md:text-left md:text-sm text-grey-darker text-base  ">
                                                                 <img class="block flex-none bg-cover" src="<?php echo e(asset('images/activo.png')); ?>" style="width: 20px; height: 20px; margin-top: 5px">
                                                                 <p class="ml-2 mt-1"><?php echo e($usuario['name']); ?></p>
                                                                
                                                                
                                                            </div>
                                                                 <p class="ml-2 mt-1 bold">- <?php echo e($usuario['rol_name']); ?></p>

                                                            <button class="btn btn-info w-full h-5" style="padding: 0px 0px 22px 0px;" wire:click="CambiarRol(<?php echo e($usuario['user_id']); ?>)">Cambiar Rol</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <h1>No hay datos</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/empresa-usuarios/empresa-usuarios-component.blade.php ENDPATH**/ ?>