<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
	<div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
		style="background-color: beige; ">
		<div class="fixed inset-0 transition-opacity">
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>

		<span class="hidden sm:inline-block sm:align-middle "></span>
		<div class="inline-block align-center bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:w-3/5" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
			<form>
				<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
					<div class="">
						<div class="mb-4">
							<?php if($moduloseleccionado): ?>
								<div style="width: 100%;background-color: bisque;border-radius: 20px;height: 5rem;justify-content: center;display: flex; margin: 4px;	align-items: center; text-align: center; padding-top:1px; font-size: 2rem;">
									<?php echo e($moduloseleccionado->name); ?>

								</div>
                                <?php if(session()->has('success')): ?>
                                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                                        role="alert">
                                        <div class="flex">
                                            <div>
                                                <p class="text-xm bg-lightgreen"><?php echo e(session('success')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(session()->has('error')): ?>
                                    <div class="bg-red-200 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                                        role="alert">
                                        <div class="flex">
                                            <div>
                                                <p class="text-xm bg-lightred"><?php echo e(session('error')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="">
                                    <div style="display: flex; flex-wrap: wrap; width: 50%">
                                        <p>Usuarios</p>
                                        <?php $__currentLoopData = $usuariosNOmodulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex d-flex" style="width: max-content; background-color: bisque;border-radius: 20px; justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; display: flex; padding-left:2rem; padding-right:2rem;">
                                                <?php if($user['profile_photo_path']): ?>
                                                    <img src="<?php echo e(asset($user['profile_photo_path'])); ?>" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/sin_imagen.jpg')); ?>" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                <?php endif; ?>
                                                
                                                <img src="<?php echo e(asset('images/activo.png')); ?>" width="20" height="20" wire:click="AgregarUsuario(<?php echo e($user['id']); ?>)">
                                                
                                                <p><?php echo e($user['name']); ?></p>
                                                <p><?php echo e($user['email']); ?></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div style="width: 50%; display: flex; flex-direction: column; align-items: flex-end;">
                                        <p>Usuarios Habilitados</p>
                                        <?php $__currentLoopData = $usuariosdelmodulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div style="width: max-content; background-color: rgb(160, 233, 100);border-radius: 20px; justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem; height: 2.5rem;">
                                                <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;" placeholder="Eliminar" wire:click="EliminarUsuario(<?php echo e($usx['id']); ?>)">
                                                    <?php if($user['profile_photo_path']): ?>
                                                        <img src="<?php echo e(asset($user['profile_photo_path'])); ?>" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('images/sin_imagen.jpg')); ?>" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                    <?php endif; ?>
                                                    <img src="<?php echo e(asset('images/pasivo.jpg')); ?>" width="20" height="20">
                                                    <b><?php echo e($usx['name']); ?></b>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
							<?php endif; ?>
						</div>
						<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/modulo-usuarios/createmodulousuarios.blade.php ENDPATH**/ ?>