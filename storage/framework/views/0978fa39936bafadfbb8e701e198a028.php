<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['listado']));

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

foreach (array_filter((['listado']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<div>

<?php 
    switch($listado) {
        case 'papeles': $listados = $this->papeles_list; 
            echo '<table class="table table-striped">
            <tr><td>Tamaño</td><td>Gramaje</td><td>Precio</td><td>Activo</td><td>Acciones</td></tr>';
            foreach ($listados as $item) {
                echo '<tr>
                    <td>'. $item->tamano_papel .'</td>
                    <td>'. $item->gramaje .'</td>
                    <td>$'. $item->precio .'</td>';
                
                if($item->activo==1) { echo '<td><span class="badge text-bg-primary rounded-pill bg-green-500 p-2" wire:click="activar(\'' . $listado. '\',\'' . $item->id. '\',\''. $item->activo .'\')"><i class="fa-solid fa-check"></i></span></td>'; } else { echo '<td><span class="badge text-bg-primary rounded-pill bg-red-500 p-2" wire:click="activar(\'' . $listado. '\',\'' . $item->id. '\',\''. $item->activo .'\')">X</span></td>'; }
                echo '<td>
                        <!-- Botón Aceptar (Verde) -->              <button type="button" class="btn btn-success btn-icon" title="Aceptar" wire:click="pseudo_modal(\'papeles\')"><i class="fas fa-check"></i></button>
                        <!-- Botón Modificar (Amarillo/Naranja) --> <button type="button" class="btn btn-warning btn-icon" title="Modificar" wire:click="pseudo_modal()"><i class="fas fa-pencil-alt"></i></button>
                        <!-- Botón Eliminar (Rojo) -->              <button type="button" class="btn btn-danger btn-icon"  title="Eliminar" wire:click="eliminar(\'' . $listado. '\',\'' . $item->id. '\')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>';
            }
            echo '</table>';
            break;

        case 'lados': $listados = $this->lados_list; 
            echo '<table class="table table-striped">
            <tr><td>Lados</td><td>Factor</td><td>Activo</td><td>Acciones</td></tr>';
            foreach ($listados as $item) {
                echo '<tr>
                    <td>'. $item->lados . '</td>
                    <td>'. $item->factor .'</td>';
                if($item->activo==1) { echo '<td><span class="badge text-bg-primary rounded-pill bg-green-500 p-2" wire:click="activar(\'' . $listado. '\',\'' . $item->id. '\',\''. $item->activo .'\')"><i class="fa-solid fa-check"></i></span></td>'; } else { echo '<td><span class="badge text-bg-primary rounded-pill bg-red-500 p-2" wire:click="activar(\'' . $listado. '\',\'' . $item->id. '\',\''. $item->activo .'\')">X</span></td>'; }
                echo '<td>
                        <!-- Botón Aceptar (Verde) --><button type="button" class="btn btn-success btn-icon" title="Aceptar" wire:click="pseudo_modal(\'lados\')"><i class="fas fa-check"></i></button>
                        <!-- Botón Modificar (Amarillo/Naranja) --><button type="button" class="btn btn-warning btn-icon" title="Modificar"><i class="fas fa-pencil-alt"></i></button>
                        <!-- Botón Eliminar (Rojo) --><button type="button" class="btn btn-danger btn-icon" title="Eliminar" wire:click="eliminar(\'' . $listado. '\',\'' . $item->id. '\')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>';
            }
            echo '</table>';  
            break;
        case 'sistemas': $listados = $this->sistemas_list; 
            echo '<table class="table table-striped">
                <tr><td>Sistema</td><td>Factor</td><td>Activo</td><td>Acciones</td></tr>';
            foreach ($listados as $item) {
                echo '<tr>
                    <td>'. $item->sistema . '</td>
                    <td>'. $item->factor .'</td>';
                if($item->activo==1) { echo '<td><span class="badge text-bg-primary rounded-pill bg-green-500 p-2" wire:click="activar(\'' . $listado. '\',\'' . $item->id. '\',\''. $item->activo .'\')"><i class="fa-solid fa-check"></i></span></td>'; } else { echo '<td><span class="badge text-bg-primary rounded-pill bg-red-500 p-2" wire:click="activar(\'' . $listado. '\',\'' . $item->id. '\',\''. $item->activo .'\')">X</span></td>'; }
                echo '<td>
                        <!-- Botón Aceptar (Verde) --><button type="button" class="btn btn-success btn-icon" title="Aceptar" wire:click="pseudo_modal(\'sistemas\')"><i class="fas fa-check"></i></button>
                        <!-- Botón Modificar (Amarillo/Naranja) --><button type="button" class="btn btn-warning btn-icon" title="Modificar"><i class="fas fa-pencil-alt"></i></button>
                        <!-- Botón Eliminar (Rojo) --><button type="button" class="btn btn-danger btn-icon" title="Eliminar" wire:click="eliminar(\'' . $listado. '\',\'' . $item->id. '\')"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>';
            }
            echo '</table>';  
            break;

        case 'tipos': $listados = $this->tipos_list;             
            echo '<table class="table table-striped">
                <tr><td>Nombre</td><td>Factor</td><td>Activo</td><td>Acciones</td></tr>';
            foreach ($listados as $item) {
                echo '<tr>
                    <td>'. $item->name . '</td>
                    
                    
                    <td>
                        <!-- Botón Aceptar (Verde) --><button type="button" class="btn btn-success btn-icon" title="Aceptar" wire:click="pseudo_modal(\'tipos\')"><i class="fas fa-check"></i></button>
                        <!-- Botón Modificar (Amarillo/Naranja) --><button type="button" class="btn btn-warning btn-icon" title="Modificar"><i class="fas fa-pencil-alt"></i></button>
                        <!-- Botón Eliminar (Rojo) --><button type="button" class="btn btn-danger btn-icon" title="Eliminar" wire:click="eliminar(\'' . $listado. '\',\'' . $item->id. '\')"><i class="fas fa-trash-alt"></i></button>
                    </td>

                </tr>';
            }
            echo '</table>';  
            break;
    }
?>

    
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/components/imprenta/card-table-component.blade.php ENDPATH**/ ?>