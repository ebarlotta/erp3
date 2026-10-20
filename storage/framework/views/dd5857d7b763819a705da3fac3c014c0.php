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
<?php $component->withAttributes([]); ?>Relacionar Módulos a Empresas <?php echo $__env->renderComponent(); ?>
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
					<?php if($empresaseleccionada): ?>
					<div class="text-left">
						<button wire:click="mostrarmodal()"
							class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
							Relacionar nuevo Módulo
						</button>
					</div>
					<?php endif; ?>
				</div>

				<?php if($isModalOpen): ?>
					<?php echo $__env->make('livewire.empresa-modulos.createempresamodulos', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
				<?php endif; ?>
				<?php if($empresas): ?>
					<div class="flex">
						<div class="h-full" style="width: 35%">
							<b>Empresas</b>
							<?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<ul>
									<li class="border text-left <?php if($seleccionado == $empresa->id): ?> bg-red-100 <?php endif; ?>" wire:click="CargarModulos(<?php echo e($empresa->id); ?>)">
										<div class="w-full lg:p-3 hover:scale-105 transition-all duration-500">
											<div class="flex rounded overflow-hidden border flex-wrap">
												<?php if($empresa->imagen): ?>
													<img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover" src="<?php echo e(asset('/'. $empresa->imagen)); ?>" style="width: 70px; height: 70px;">
												<?php else: ?>
													<img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover" src="<?php echo e(asset('images/sin_imagen.jpg')); ?>"	style="width: 70px; height: 70px;">
												<?php endif; ?>
												<div class="col-12 col-md-8 w-full rounded-b flex flex-col justify-between leading-normal">

													
													<div class="<?php if($seleccionado == $empresa->id): ?> bg-red-100 <?php endif; ?> lg:text-lg md:font-bold md:fs-6 text-center md:text-left md:text-sm text-grey-darker text-base">
														<?php echo e($empresa->name); ?>

													</div>
													
												</div>
											</div>
										</div>
									</li>
								</ul>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="w-full"><?php echo e($datos->links()); ?></div>
						</div>

						<td>
							<div style="width: 65%: border: ligthgrey solid 1px;background: aliceblue;">
								<div class="bg-transparent"><b>Módulos</b></div>
									<?php if($modulosdelaempresa): ?>
										<div class="flex-wrap flex">
										<?php $__currentLoopData = $modulosdelaempresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($modulo['estado_suscripcion']=="SUSCRITO"): ?>
													<div class="w-30 p-2 hover:scale-110 transition-all duration-500 hover:bg-green-300">
														<div class="flex-wrap d-flex rounded overflow-hidden border">
															<div class="">
																<div class="d-flex">
																	<img class="block flex-none bg-cover rounded-md ml-1 mt-1" src="<?php echo e(asset('images/'. $modulo['imagen'])); ?>" style="width: 30px; height: 30px;">
																	<div class="bg-white rounded-b leading-normal p-1" style="left: -30px; float: left;">
																		<div class="text-black font-bold text-xl mb-2 leading-tight">
																			<img class="block flex-none bg-cover"	src="<?php echo e(asset('images/activo.png')); ?>" width="30" height="30">
																		</div>
																	</div>
																</div>
																<div class="w-full bg-white rounded-b pl-4 flex flex-col justify-between leading-normal">
																	<div class="text-black font-bold text-sm mb-2 mt-1 leading-tight">
																		<?php echo e($modulo['name']); ?>

																	</div>
																</div>
															</div>
														</div>
													</div>
												<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									<?php else: ?>
										<p class="mt-4 bg-red-100 rounded-md mx-5">
											No hay datos para mostrar o no hay módulos relacionados con la empresa
										</p>
									<?php endif; ?>
								</div>
							</div>
						</td>
					</div>
				<?php else: ?>
					<h1>No hay datos</h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>


<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/empresa-modulos/empresa-modulos-component.blade.php ENDPATH**/ ?>