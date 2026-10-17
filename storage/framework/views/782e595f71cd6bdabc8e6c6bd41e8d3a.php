<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title','mostrar']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title','mostrar']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<div class="col-6">
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo e($title); ?></b></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php if($mostrar=='papeles'): ?> 
                <?php if (isset($component)) { $__componentOriginal2e5fb7702c4d591be5575940d593d4b6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardTableComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-table-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardTableComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['listado' => ''.e($mostrar).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $attributes = $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $component = $__componentOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?>
                <?php if($this->vpseudo_modal=='papeles'): ?>
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-3">
                            <div>Tamaño</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-3">
                            <div>Gramaje</div>
                            <div><input type="text" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-3">
                            <div>Precio</div>
                            <div><input type="number" class="form-control" value="" wire:model="param3"></div>
                        </div>
                        <div class="col-3">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('papeles')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($mostrar=='lados'): ?> 
                <?php if (isset($component)) { $__componentOriginal2e5fb7702c4d591be5575940d593d4b6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardTableComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-table-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardTableComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['listado' => ''.e($mostrar).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $attributes = $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $component = $__componentOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?> 
                <?php if($this->vpseudo_modal=='lados'): ?>
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-4">
                            <div>Lados</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-4">
                            <div>Factor</div>
                            <div><input type="number" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('lados')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($mostrar=='sistemas'): ?> 
                <?php if (isset($component)) { $__componentOriginal2e5fb7702c4d591be5575940d593d4b6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardTableComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-table-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardTableComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['listado' => ''.e($mostrar).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $attributes = $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $component = $__componentOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?> 
                <?php if($this->vpseudo_modal=='sistemas'): ?>
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-4">
                            <div>Sistema</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-4">
                            <div>Factor</div>
                            <div><input type="number" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('sistemas')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                <?php endif; ?>            
            <?php endif; ?>
            <?php if($mostrar=='tipos'): ?> 
                <?php if (isset($component)) { $__componentOriginal2e5fb7702c4d591be5575940d593d4b6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6 = $attributes; } ?>
<?php $component = App\View\Components\Imprenta\CardTableComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('imprenta.card-table-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Imprenta\CardTableComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['listado' => ''.e($mostrar).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $attributes = $__attributesOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__attributesOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6)): ?>
<?php $component = $__componentOriginal2e5fb7702c4d591be5575940d593d4b6; ?>
<?php unset($__componentOriginal2e5fb7702c4d591be5575940d593d4b6); ?>
<?php endif; ?> 
                <?php if($this->vpseudo_modal=='tipos'): ?>
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-4">
                            <div>Nombre</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-4">
                            <div>Factor</div>
                            <div><input type="number" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('tipos')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                <?php endif; ?> 
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/components/imprenta/card-component.blade.php ENDPATH**/ ?>