<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['searchIcon','searchIconClasses','searchIconOtherAttributes']));

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

foreach (array_filter((['searchIcon','searchIconClasses','searchIconOtherAttributes']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<div class="relative inset-y-0 left-6
            inline-flex items-center 
            pointer-events-none">

        <?php echo e(svg($searchIcon, $searchIconClasses, $searchIconOtherAttributes)); ?>

</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/vendor/rappasoft/laravel-livewire-tables/resources/views/components/tools/toolbar/items/search/icon.blade.php ENDPATH**/ ?>