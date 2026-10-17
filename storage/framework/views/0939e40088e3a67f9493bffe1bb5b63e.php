<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['id']));

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

foreach (array_filter((['id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<div>
    <!-- Desde 640 en adelante -->
    <button wire:click="agregar(<?php echo e($id); ?>)" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-2 px-4 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
        </svg>
        Agregar
    </button>
    <!-- Menos 640 en adelante -->
    <button wire:click="agregar(<?php echo e($id); ?>)" class="sm:hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-2 px-4 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
        </svg>
    </button>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/components/geri/agregar.blade.php ENDPATH**/ ?>