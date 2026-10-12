<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
	<div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
		style="background-color: beige; ">
		<div class="fixed inset-0 transition-opacity">
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>

		<span class="hidden sm:inline-block sm:align-middle "></span>
		<div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:max-w-lg sm:w-full"
			role="dialog" aria-modal="true" aria-labelledby="modal-headline">
			<form>
				<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
					<div class="mb-4">
						<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
							Está seguro de cerrar el libro seleccionado?<br> Una vez cerrado, no podrá volver a modificarlo!
						</label>
					</div>
				</div>
				<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
					<?php if (isset($component)) { $__componentOriginal9d86ae12c7e5c44fc2347a1231bea97b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d86ae12c7e5c44fc2347a1231bea97b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cerrarlibro','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cerrarlibro'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d86ae12c7e5c44fc2347a1231bea97b)): ?>
<?php $attributes = $__attributesOriginal9d86ae12c7e5c44fc2347a1231bea97b; ?>
<?php unset($__attributesOriginal9d86ae12c7e5c44fc2347a1231bea97b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d86ae12c7e5c44fc2347a1231bea97b)): ?>
<?php $component = $__componentOriginal9d86ae12c7e5c44fc2347a1231bea97b; ?>
<?php unset($__componentOriginal9d86ae12c7e5c44fc2347a1231bea97b); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalf601d5fc21cefd441404c449c7f6e2be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf601d5fc21cefd441404c449c7f6e2be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.volver','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('volver'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf601d5fc21cefd441404c449c7f6e2be)): ?>
<?php $attributes = $__attributesOriginalf601d5fc21cefd441404c449c7f6e2be; ?>
<?php unset($__attributesOriginalf601d5fc21cefd441404c449c7f6e2be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf601d5fc21cefd441404c449c7f6e2be)): ?>
<?php $component = $__componentOriginalf601d5fc21cefd441404c449c7f6e2be; ?>
<?php unset($__componentOriginalf601d5fc21cefd441404c449c7f6e2be); ?>
<?php endif; ?>
				</div>
			</form>
		</div>
	</div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/venta/modalcerrarlibroventas.blade.php ENDPATH**/ ?>