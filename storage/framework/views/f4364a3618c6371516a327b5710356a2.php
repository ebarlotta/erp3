<div>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
            integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </head>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item p-3 bg-red-100 rounded-3 ml-2" role="presentation">
            <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Menúes</a>
        </li>
        <li class="nav-item p-3 bg-red-200 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Medicamentos</a>
        </li>
        <li class="nav-item p-3 bg-red-300 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Descartables</a>
        </li>
        <li class="nav-item p-3 bg-red-400 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Gráficos</a>
        </li>
        <li class="nav-item p-3 bg-red-500 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-4" data-bs-toggle="tab" href="#simple-tabpanel-4" role="tab" aria-controls="simple-tabpanel-4" aria-selected="false">Resúmenes</a>
        </li>
    </ul>

    <div class="tab-content pt-5" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header ui-sortable-handle" style="cursor: move; justify-content: space-between;">
                    <h3 class="card-title ml-3 col-md-6">Datos de Expediciones</h3>
                    <div class="flex ml-4 col-md-12" style="padding-left: 60px;">
                        <label>Fecha:</label>
                        <input type="date" wire:model="fecha" wire:change="CargarMenues()" style="background-color: lightgreen; border-radius: 5px; padding: 0px 5px 0px 5px; margin-left: 7px;">
                    </div>
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.expedirMomento','data' => ['momento' => '1','cerrado' => ''.e($cerradoDesayuno).'','titulo' => 'Desayuno']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('expedirMomento'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['momento' => '1','cerrado' => ''.e($cerradoDesayuno).'','titulo' => 'Desayuno']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $attributes = $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $component = $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.expedirMomento','data' => ['momento' => '2','cerrado' => ''.e($cerradoAlmuerzo).'','titulo' => 'Almuerzo']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('expedirMomento'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['momento' => '2','cerrado' => ''.e($cerradoAlmuerzo).'','titulo' => 'Almuerzo']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $attributes = $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $component = $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.expedirMomento','data' => ['momento' => '3','cerrado' => ''.e($cerradoMerienda).'','titulo' => 'Merienda']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('expedirMomento'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['momento' => '3','cerrado' => ''.e($cerradoMerienda).'','titulo' => 'Merienda']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $attributes = $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $component = $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.expedirMomento','data' => ['momento' => '4','cerrado' => ''.e($cerradoCena).'','titulo' => 'Cena']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('expedirMomento'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['momento' => '4','cerrado' => ''.e($cerradoCena).'','titulo' => 'Cena']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $attributes = $__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__attributesOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a)): ?>
<?php $component = $__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a; ?>
<?php unset($__componentOriginal8ea9d7d6fe710551afa5e8bfa66cd97a); ?>
<?php endif; ?>

        </div>

        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['class' => 'max-w-lg w-full mt-10','wire:model' => 'confirmacion','style' => 'margin-top: 100px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-lg w-full mt-10','wire:model' => 'confirmacion','style' => 'margin-top: 100px']); ?>
             <?php $__env->slot('title', null, ['style' => 'margin-top: 100px; padding-top: 100px;']); ?> 
                Cerrar Servicio
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('content', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Está seguro de que quiere cerrar el servicio de <?php echo e($servicioacerrar); ?> del día
                    <?php echo e(date('d-m-Y', strtotime($fecha))); ?>? <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('footer', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn bg-yellow-300 btn-warning mr-2','wire:click' => 'CambiarEstado('.e($servicioacerrar).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn bg-yellow-300 btn-warning mr-2','wire:click' => 'CambiarEstado('.e($servicioacerrar).')']); ?>Si, cerrar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn btn-info','wire:click' => '$set(\'confirmacion\',false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn btn-info','wire:click' => '$set(\'confirmacion\',false)']); ?>Volver sin cerrar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['class' => 'max-w-lg w-full mt-10','wire:model' => 'agregar','style' => 'margin-top: 100px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-lg w-full mt-10','wire:model' => 'agregar','style' => 'margin-top: 100px']); ?>
             <?php $__env->slot('title', null, ['style' => 'margin-top: 100px; padding-top: 100px;']); ?> 
                Agregar Servivio
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('content', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Seleccione los menúes a agregar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <div class="flex d-flex">
                    <div class="col-5">
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Actor <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <select class="form-control" wire:model="actor_id_agregar">
                            <option value="">Seleccione un actor</option>
                            <?php $__currentLoopData = $agregarActores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($actor['id']); ?>"><?php echo e($actor['nombre']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <div class="col-5">
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Menú <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <select class="form-control" wire:model="menu_id_agregar">
                            <option value="">Seleccione un menú</option>
                            <?php $__currentLoopData = $agregarMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu['id']); ?>"><?php echo e($menu['nombremenu']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Cantidad <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'number','class' => 'form-control','wire:model' => 'cantidad_agregar','value' => '1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','class' => 'form-control','wire:model' => 'cantidad_agregar','value' => '1']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                    </div>
                </div>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('footer', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn bg-yellow-300 btn-warning mr-2','wire:click' => 'AgregarMenu()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn bg-yellow-300 btn-warning mr-2','wire:click' => 'AgregarMenu()']); ?>Agregar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn btn-info','wire:click' => '$set(\'agregar\',false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn btn-info','wire:click' => '$set(\'agregar\',false)']); ?>Cerrar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>

        <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">Medicamentos Expedidos</div>
        <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">Descartables Expedidos</div>

        <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
            
            <!-- En tu vista -->
            <div class="flex d-flex flex-wrap">

                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Consumo Mensual','labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],'data' => [12, 19, 3, 5, 2, 3],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Consumo Mensual','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([12, 19, 3, 5, 2, 3]),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Gráfico de Barras -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','fill' => 'true','title' => 'Despachos Mensuales','labels' => $labels['DespachosMenuales'],'data' => $data['DespachosMenuales'],'colors' => $colors,'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','fill' => 'true','title' => 'Despachos Mensuales','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labels['DespachosMenuales']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['DespachosMenuales']),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Gráfico de Línea -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Comparativa de despachos No efectuados','labels' => $labels['ComparativaDespachos'],'data' => $data['ComparativaDespachos'][1],'colors' => $colors,'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Comparativa de despachos No efectuados','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labels['ComparativaDespachos']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['ComparativaDespachos'][1]),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                 <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Comparativa de despachos Efectuados','labels' => $labels['ComparativaDespachos'],'data' => $data['ComparativaDespachos'][0],'colors' => $colors,'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Comparativa de despachos Efectuados','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labels['ComparativaDespachos']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['ComparativaDespachos'][0]),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Colores personalizados -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'pie','title' => 'Satisfacción del Cliente','labels' => ['Muy Satisfecho', 'Satisfecho', 'Neutral', 'Insatisfecho'],'data' => [60, 25, 10, 5],'colors' => ['#10B981', '#3B82F6', '#6B7280', '#EF4444'],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'pie','title' => 'Satisfacción del Cliente','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Muy Satisfecho', 'Satisfecho', 'Neutral', 'Insatisfecho']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([60, 25, 10, 5]),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['#10B981', '#3B82F6', '#6B7280', '#EF4444']),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Tema corporativo -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Metas Cumplidas 2024','labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May'],'data' => [85, 92, 78, 95, 88],'colors' => ['#1E40AF', '#1D4ED8', '#2563EB', '#3B82F6', '#60A5FA'],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Metas Cumplidas 2024','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Ene', 'Feb', 'Mar', 'Abr', 'May']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([85, 92, 78, 95, 88]),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['#1E40AF', '#1D4ED8', '#2563EB', '#3B82F6', '#60A5FA']),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- KPI Principal: Ventas del Mes -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Ventas Diarias - Mes Actual','labels' => ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],'data' => [1200, 1500, 1800, 1400, 1600, 1900, 2100, 2300, 2000, 2200, 2400, 2100, 2300, 2500, 2700],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Ventas Diarias - Mes Actual','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([1200, 1500, 1800, 1400, 1600, 1900, 2100, 2300, 2000, 2200, 2400, 2100, 2300, 2500, 2700]),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Top Clientes -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'doughnut','title' => 'Distribución por Top Clientes','labels' => ['Cliente Premium (20%)', 'Clientes Regulares (50%)', 'Clientes Ocasionales (30%)'],'data' => [20, 50, 30],'colors' => ['#F59E0B', '#3B82F6', '#10B981'],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'doughnut','title' => 'Distribución por Top Clientes','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Cliente Premium (20%)', 'Clientes Regulares (50%)', 'Clientes Ocasionales (30%)']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([20, 50, 30]),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['#F59E0B', '#3B82F6', '#10B981']),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Productos Más Rentables -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Margen por Producto (%)','labels' => ['Pollo Grill', 'Lomo Saltado', 'Ceviche', 'Tallarines', 'Arroz Chaufa'],'data' => [35, 42, 28, 25, 30],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Margen por Producto (%)','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Pollo Grill', 'Lomo Saltado', 'Ceviche', 'Tallarines', 'Arroz Chaufa']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([35, 42, 28, 25, 30]),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Tendencia Semanal -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'line','title' => 'Tendencia Semanal de Ventas','labels' => ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],'data' => [4500, 5200, 4800, 6100, 7300, 8500, 4200],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'line','title' => 'Tendencia Semanal de Ventas','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([4500, 5200, 4800, 6100, 7300, 8500, 4200]),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Horarios Pico -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'bar','title' => 'Pedidos por Hora del Día','labels' => ['8-10', '10-12', '12-14', '14-16', '16-18', '18-20', '20-22'],'data' => [15, 45, 120, 65, 40, 85, 35],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bar','title' => 'Pedidos por Hora del Día','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['8-10', '10-12', '12-14', '14-16', '16-18', '18-20', '20-22']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([15, 45, 120, 65, 40, 85, 35]),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Estacionalidad -->
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'line','title' => 'Comparativo Mensual Año Actual vs Anterior','labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],'data' => [45000, 52000, 48000, 61000, 73000, 85000],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'line','title' => 'Comparativo Mensual Año Actual vs Anterior','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([45000, 52000, 48000, 61000, 73000, 85000]),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Pareto de Clientes por Consumo -->
                <?php
                    $clientesFrecuentes = [
                        'labels' => ['Juan Pérez', 'María García', 'Carlos López', 'Ana Martínez', 'Pedro Rodríguez', 'Luisa Fernández', 'Miguel Torres'],
                        'data' => [45, 38, 32, 28, 25, 22, 20] // Número de consumos
                    ];
                ?>
                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['type' => 'line','title' => 'Pareto - Clientes por Frecuencia de Consumo','labels' => $clientesFrecuentes['labels'],'data' => $clientesFrecuentes['data'],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'line','title' => 'Pareto - Clientes por Frecuencia de Consumo','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clientesFrecuentes['labels']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clientesFrecuentes['data']),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Pareto de Ingresos por Menú -->
                <?php
                    $ingresosMenus = [
                        'labels' => ['Pollo Grill', 'Lomo Saltado', 'Ceviche', 'Tallarines', 'Arroz Chaufa', 'Pescado Frito'],
                        'data' => [12500, 9800, 7600, 6500, 5400, 4200] // Ingresos en soles
                    ];
                ?>

                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['title' => 'Pareto - Ingresos por Tipo de Menú','labels' => $ingresosMenus['labels'],'data' => $ingresosMenus['data'],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pareto - Ingresos por Tipo de Menú','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ingresosMenus['labels']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ingresosMenus['data']),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>

                <!-- Pareto de Días con Mayor Consumo -->

                <?php
                    $consumoDias = [
                        'labels' => ['Viernes', 'Sábado', 'Jueves', 'Miércoles', 'Martes', 'Lunes', 'Domingo'],
                        'data' => [89, 85, 65, 58, 52, 48, 35] // Total de consumos por día
                    ];
                ?>

                <div class="col-md-6 col-xl-4  ">
                    <?php if (isset($component)) { $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.chart','data' => ['title' => 'Pareto - Consumo por Día de la Semana','labels' => $consumoDias['labels'],'data' => $consumoDias['data'],'height' => '320px','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pareto - Consumo por Día de la Semana','labels' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($consumoDias['labels']),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($consumoDias['data']),'height' => '320px','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $attributes = $__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__attributesOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4)): ?>
<?php $component = $__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4; ?>
<?php unset($__componentOriginalc621b3f3a1dd664e2d7a5c269bd63ea4); ?>
<?php endif; ?>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
        </div>

        <div class="tab-pane" id="simple-tabpanel-4" role="tabpanel" aria-labelledby="simple-tab-4">
            <?php if (isset($component)) { $__componentOriginala1426e408ee89213b6d362d9987c8e17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala1426e408ee89213b6d362d9987c8e17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.expedir-resumen-ingredientres-component','data' => ['titulo' => 'Resúmenes de Ingredientes y Menúes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('expedir-resumen-ingredientres-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['titulo' => 'Resúmenes de Ingredientes y Menúes']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala1426e408ee89213b6d362d9987c8e17)): ?>
<?php $attributes = $__attributesOriginala1426e408ee89213b6d362d9987c8e17; ?>
<?php unset($__attributesOriginala1426e408ee89213b6d362d9987c8e17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala1426e408ee89213b6d362d9987c8e17)): ?>
<?php $component = $__componentOriginala1426e408ee89213b6d362d9987c8e17; ?>
<?php unset($__componentOriginala1426e408ee89213b6d362d9987c8e17); ?>
<?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/expendio/expendio-component.blade.php ENDPATH**/ ?>