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
<?php $component->withAttributes([]); ?>Gestión de Productos <?php echo $__env->renderComponent(); ?>
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
					
					<div class="text-left flex">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.Agregar','web'.session('empresa_id'))): ?>
							<button wire:click="mostrarmodal()"	class="col-5 col-md-3 bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
								Agregar Producto
							</button>
						<?php endif; ?>
						<input class="form-control col-5 ml-2" type="text" wire:model="search" placeholder="Introduzca Filtro" wire:keyup="Filtrar">
                        
					</div>
					
				</div>

				<?php if($isModalOpenFileUpload): ?>
					<?php echo $__env->make('livewire.producto.EditFileUpload', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
				<?php endif; ?>

				<?php if($isModalOpen): ?>
					
					<div style="background-color: lightgray;">
						<form method="POST" enctype="multipart/form-data" action="store()">
							<div class="bg-white px-4 pt-2 pb-2 sm:p-6 sm:pb-4 flex flex-wrap" style="background-color: lightgray;">
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Nombre" wire:model="name">
									<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Descripción" wire:model="descripcion">
									<?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left flex">
									<?php if($this->ruta != 'sin_imagen.jpg'): ?>
										<img src="<?php echo e(asset('images2/'.$this->ruta )); ?>" width="70px" height="70px">
										<input class="btn btn-info ml-2" type="text" value="Actualizar Imágen" style="height: fit-content;" wire:click="ModalOpenFileUpload">
										<?php $__errorArgs = ['ruta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									<?php else: ?>
										<img src="<?php echo e(asset('images/sin_imagen.jpg' )); ?>" width="100px" height="100px">
										<input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="exampleFormControlInput1" placeholder="Ingrese imágendd" wire:model="ruta">										
										<?php $__errorArgs = ['ruta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									<?php endif; ?>
								</div>

							</div>
							<div class="bg-white px-4 pb-2 sm:p-2 sm:pb-4 flex flex-wrap" style="background-color: lightgray;">
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de compra</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese precio de compra" wire:model="precio_compra">
									<?php $__errorArgs = ['precio_compra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1"
											class="block text-gray-700 text-sm font-bold mb-2">Existencia</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese existencia" wire:model="existencia">
									<?php $__errorArgs = ['existencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Stock Mínimo</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese stock_minimo" wire:model="stock_minimo">
									<?php $__errorArgs = ['stock_minimo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese lote" wire:model="lote">
									<?php $__errorArgs = ['lote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
									<?php if($unidades): ?>
										<select wire:model="unidads_id" class="rounded form-control" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
										<option value="">-</option>
											<?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($unidad->id); ?>"><?php echo e($unidad->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php $__errorArgs = ['unidads_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									<?php endif; ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
									<?php if($categoria_productos): ?>
										<select wire:model="categoriaproductos_id" class="rounded form-control">
										<option value="">-</option>
											<?php $__currentLoopData = $categoria_productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php $__errorArgs = ['categoriaproductos_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									<?php endif; ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
									<?php if($proveedores): ?>
										<select wire:model="proveedor_id" class="rounded form-control">
										<option value="">-</option>
											<?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($proveedor->id); ?>"><?php echo e($proveedor->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php $__errorArgs = ['proveedor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									<?php endif; ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
									<?php if($estados): ?>
										<select wire:model="estados_id" class="rounded form-control">
											<option value="">-</option>
											<?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($estado->id); ?>"><?php echo e($estado->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php $__errorArgs = ['estados_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									<?php endif; ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Barra</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese código de barra" wire:model="barra">
									<?php $__errorArgs = ['barra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">QR</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese código QR" wire:model="qr">
									<?php $__errorArgs = ['qr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Barra Proveerdor</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese código de barra del proveedor" wire:model="barra_proveerdor">
									<?php $__errorArgs = ['barra_proveerdor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descuento</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Descuento" wire:model="descuento">
									<?php $__errorArgs = ['descuento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Calificacion</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Calificación" wire:model="calificacion">
									<?php $__errorArgs = ['calificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descuento Especial</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese descuento Especial" wire:model="descuento_especial">
									<?php $__errorArgs = ['descuento_especial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio Venta</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Precio de Venta" wire:model="precio_venta">
									<?php $__errorArgs = ['precio_venta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							</div>
							<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mr-5">
								<?php if (isset($component)) { $__componentOriginalf253541e01a36dd42205b332d448f648 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf253541e01a36dd42205b332d448f648 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.guardar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guardar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf253541e01a36dd42205b332d448f648)): ?>
<?php $attributes = $__attributesOriginalf253541e01a36dd42205b332d448f648; ?>
<?php unset($__attributesOriginalf253541e01a36dd42205b332d448f648); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf253541e01a36dd42205b332d448f648)): ?>
<?php $component = $__componentOriginalf253541e01a36dd42205b332d448f648; ?>
<?php unset($__componentOriginalf253541e01a36dd42205b332d448f648); ?>
<?php endif; ?>
								<?php if (isset($component)) { $__componentOriginal0b8e008b9eeb9aa717a966287bf60513 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8e008b9eeb9aa717a966287bf60513 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cerrar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cerrar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8e008b9eeb9aa717a966287bf60513)): ?>
<?php $attributes = $__attributesOriginal0b8e008b9eeb9aa717a966287bf60513; ?>
<?php unset($__attributesOriginal0b8e008b9eeb9aa717a966287bf60513); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8e008b9eeb9aa717a966287bf60513)): ?>
<?php $component = $__componentOriginal0b8e008b9eeb9aa717a966287bf60513; ?>
<?php unset($__componentOriginal0b8e008b9eeb9aa717a966287bf60513); ?>
<?php endif; ?>
							</div>
						</form>
					</div>
					
				<?php endif; ?>	

				<?php if($productos): ?>
				<table class="w-full table table-striped">
					<thead>
						<th>Foto</th>
						<th>Productos</th>
						<th>Existencia</th>
						<th>Stock Mínimo</th>
						<th>Precio Compra</th>
						<th>Precio Venta</th>
						<th>Estado</th>
					</thead>
					<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.Modificar','web'.session('empresa_id'))): ?>
							<tr wire:click="edit(<?php echo e($producto->id); ?>)">
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('productos.Modificar','web'.session('empresa_id'))): ?>
							<tr>
						<?php endif; ?>
							<td>
								<?php if($producto->ruta != 'sin_imagen.jpg'): ?> 
									<img class="block rounded-md flex-none bg-cover" src="<?php echo e(asset('images2/'.$producto->ruta)); ?>" style="width:70px; height: 70px;">	
								<?php else: ?>
									<img class="block rounded-md flex-none bg-cover" src="<?php echo e(asset('images/sin_imagen.jpg')); ?>" style="width:70px; height: 70px;">
								<?php endif; ?>
							</td>
							<td><?php echo e($producto->name); ?></td>
							<td><?php echo e($producto->existencia); ?></td>
							<td><?php echo e($producto->stock_minimo); ?></td>
							<td><?php echo e($producto->precio_compra); ?></td>
							<td><?php echo e($producto->precio_venta); ?></td>
							<td><?php echo e($producto->estado->name); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
					
							
							
						</div>
					</div>
				<?php else: ?>
					<h1>No hay datos</h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/producto/producto-component.blade.php ENDPATH**/ ?>