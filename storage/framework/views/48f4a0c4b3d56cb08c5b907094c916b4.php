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
<?php $component->withAttributes([]); ?>Relacionar Usuarios a distintos Módulos <?php echo $__env->renderComponent(); ?>
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
						<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
							<div class="flex">
								<div>
									<p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if($seleccionado): ?>
					<div class="text-left">
						<button wire:click="mostrarmodal()"	class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
							Relacionar nuevo Usuario
						</button>
                        <input type="text" wire:model="search" placeholder="Introduzca Filtro" wire:keyup="Filtrar" style="height: 2.5rem; background-color: lightgray;  border-radius: 10px; padding-left: 10px; margin-left: 4px;     width: 6rem;">
					</div>
					<?php endif; ?>
				</div>
				<?php if($isModalOpen): ?>
					<?php echo $__env->make('livewire.modulo-usuarios.createmodulousuarios', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
				<?php endif; ?>
				<?php if($datos): ?>
				<div class="flex">
					<div class="h-full w-1/2" >
						Módulos <br>
						<?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<ul>
								<li class="border text-left <?php if($seleccionado==$modulo->id): ?> bg-red-100 <?php endif; ?>" wire:click="CargarUsuarios(<?php echo e($modulo->id); ?>)">
									<div class="w-full lg:p-3 hover:scale-110 transition-all duration-500">
										<div class="flex rounded overflow-hidden border <?php if($seleccionado==$modulo->id): ?> bg-red-100 <?php endif; ?>">
											<img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover" src="<?php echo e(asset('images/'. $modulo->imagen)); ?>" style="width:70px; height: 70x;">
											<div class="<?php if($seleccionado==$modulo->id): ?> bg-red-100 <?php endif; ?> col-12 col-md-8 w-full rounded-b flex flex-col justify-between leading-normal">
												<div class="h-full lg:text-lg md:font-bold md:fs-6 text-left md:text-center md:text-sm text-grey-darker text-base">
                                                    <?php echo e($modulo->name); ?>

                                                </div>
												
											</div>
										</div>
									</div>
								</li>
							</ul>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<div class="w-full"><?php echo e($datos->links()); ?></div>
					</div>
					<div style="width: 50%">
						<div class="bg-transparent"><b>Usuarios</b></div>
						<?php if($usuariosdelmodulo): ?>
							<div class="flex-wrap flex">
						    <?php $__currentLoopData = $usuariosdelmodulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<ul class="w-full">
								<li class="border text-left bg-red-100">
									<div class="w-full p-2 hover:scale-110 transition-all duration-500">
										<div class="d-flex rounded overflow-hidden">
                                            <div class="d-flex flex">
                                                <?php if($usuario['profile_photo_path']): ?>
                                                    <img class="block flex-none bg-cover rounded-md ml-1 mt-1" src="<?php echo e(asset($usuario['profile_photo_path'])); ?>" style="width: 40px; height: 40px;">
                                                <?php else: ?>
                                                    <img class="block flex-none bg-cover rounded-md ml-1 mt-1" src="<?php echo e(asset('images/sin_imagen.jpg')); ?>" style="width: 40px; height: 40px;">
                                                <?php endif; ?>
                                                <div class="text-black font-bold text-xl mb-2 leading-tight d-flex flex">
                                                    <img class="block bg-cover mt-2 px-1 py-1 mx-1" src="<?php echo e(asset('images/activo.png')); ?>" style="width: 25px; height: 25px;">
                                                    <div class="h-full lg:text-lg md:font-bold md:fs-6 text-left md:text-center md:text-sm text-grey-darker text-base">
                                                        <?php echo e($usuario['name']); ?>

                                                    </div>
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
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/modulo-usuarios/modulo-usuarios-component.blade.php ENDPATH**/ ?>