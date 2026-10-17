<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="<?php echo e(asset('css/registro.css')); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Iniciar Trámite Online</h1>
            <?php if($datos_tramite_validados || $datos_vehiculo_validados || $datos_solicitante_validados ): ?>
                <div class="form-group tarjeta-gris">
                    <div>
                        <div class="panel panel-info hidden-xs ng-scope" style="margin-bottom: 20px;">
                            <div class="panel-body">
                                <table class="table table-striped margin-bottom-no">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="d-flex- flex">
                                                    <div class="media-left" style="margin-right: 13px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="26" height="26" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                                    </div>
                                                    <label class="titulo_card text-uppercase blue-300"> Resumen de la Solicitud</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php if($datos_tramite_validados): ?>
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Trámite</td>
                                                <td colspan="3"><?php echo e($descripciontramite); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($datos_vehiculo_validados): ?>
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Vehículo</td>
                                                <td colspan="3"><?php echo e($modelo); ?> - <?php echo e($marca); ?> - <?php echo e($ano); ?> - <?php echo e(strtoupper($patente)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($datos_solicitante_validados): ?>
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Solicitante</td>
                                                <td colspan="3"><?php echo e($solicitante['name'] .' - ' . $solicitante['direccion'] .' - '. $solicitante['telefono'] .' - '. $solicitante['email']); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($datos_turno_validados): ?>
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Día seleccionado del turno:</td>
                                                <td colspan="3"><?php echo e($diaSeleccionado); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!--TRAMITE-->
            <?php if($seleccion_tramite): ?>
                <div class="form-group tarjeta-gris">
                    <div class="form-group">
                        <label class="text-muted mb-3">Elegí qué trámite querés iniciar.</label>
                        <h2 class="titulo1">Selección de Trámite</h2>
                        <label class="titulo_card" for="codigoTramite">Tipo de Trámite</label>
                        <select  id="eleccion" class="form-control" style="font-size:1.2rem; height: 3.2rem;" wire:change="cambiar_tramite()" wire:model="tramite_seleccionado" >
                                <option value="0">--- Seleccione alguna opción ---</option>
                                <?php $__currentLoopData = $tramites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tramite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tramite->id); ?>"><?php echo e($tramite->nombretramite); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <?php if($tramite_seleccionado): ?>
                        <div class="tarjeta-celeste">
                            <div class="media-left" style="margin-right: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                            </div>
                            <div class="media-body">
                                <h4 class="titulo2"><b>Descripción</b></h4>
                                <p class="text-muted">Trámite para incorporar el motor de los dominios inscriptos</p>
                                <h5 class="titulo2">Requisitos</h5>
                                <ul style="list-style-type: disc !important;">
                                    <?php $__currentLoopData = $requisitos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requisito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="text-muted"><?php echo e($requisito->descripcionrequisitotipotramite); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_vehiculo')" <?php if(!$tramite_seleccionado): ?> disabled <?php endif; ?>>Continuar&nbsp; &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            
            <?php if($datos_vehiculo): ?>
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex flex-wrap">
                        <div class="form-group col-12 col-md-6">
                            <h2 class="titulo1">Datos del Vehículo</h2>
                            <label class="titulo_card" for="codigoTramite">Patente</label>
                            <input class="form-control texto" type="text" tooltip="PATENTE" maxlength="11" wire:model="patente">
                            <p class="text-muted">Ingresa la patente sin espacios ni guiones ni barras</p>
                            <?php $__errorArgs = ['patente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightred text-danger"><?php echo e($message); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <label class="titulo_card" for="codigoTramite">Chasis</label>
                            <input class="form-control texto" type="text" tooltip="CHASIS" maxlength="7" wire:model="chasis">
                            <p class="text-muted">Ingresa las últimas 7 posiciones del chasis de tu vehículo. Este dato figura en tu cédula.</p>
                            <p class="text-muted">Si la cantidad de caracteres es inferior a 7, ingresá la totalidad de los mismos.</p>
                            <?php $__errorArgs = ['chasis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightred text-danger"><?php echo e($message); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <?php if($datos_vehiculo_validados): ?>
                                <div class="col-12 tarjeta-verde">
                                    <label class="titulo_card" style="margin-bottom: 20px">Detalles del Vehículo</label><br>
                                    <div style="width: 100%">
                                        <p class="flex">Modelo<input class="form-control ml-3" type="text" value="<?php echo e($modelo); ?>" disabled></p>
                                        <p class="flex">Marca<input class="form-control ml-3" type="text" value="<?php echo e($marca); ?>" disabled></p>
                                        <p class="flex">Año<input class="form-control ml-3" type="text" value="<?php echo e($ano); ?>" disabled></p>
                                        
                                    </div>                                
                                </div>
                            <?php endif; ?>
                            <?php if($necesita_agregar_vehiculo): ?>
                                <div class="col-12 tarjeta-verde">
                                    <label class="titulo_card mb-3 bg-red-300" style="background-color: antiquewhite; padding:10px">Debe ingresar los datos del vehículo</label><br>
                                    <label class="titulo_card mb-3">Detalles del vehículo</label><br>
                                    <div style="width: 100%">
                                        <p class="flex">Modelo<input class="form-control ml-3" type="text" wire:model="agregar_modelo" oninput="convertirAMayusculas(event)"><?php $__errorArgs = ['agregar_modelo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex">Marca<input class="form-control ml-3" type="text" wire:model="agregar_marca" oninput="convertirAMayusculas(event)"></p><?php $__errorArgs = ['agregar_marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex">Año<input class="form-control ml-3" type="text" wire:model="agregar_ano" id="agregar_ano" maxlength="4" onkeypress="return soloNumeros(event)"></p><?php $__errorArgs = ['agregar_ano'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                            <?php if(session()->has('message')): ?>
                                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                                    <div class="flex">
                                                        <div>
                                                            <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </p>
                                        <?php if(session()->has('messageVehículo')): ?>
                                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                                <div class="flex">
                                                    <div>
                                                        <p class="text-xm bg-lightgreen"><?php echo e(session('messageVehículo')); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div style="width: 100%; display: flex; justify-content: space-around;">
                                        <button type="submit" class="btn boton-warning mr-3" wire:click="Agregar_Vehiculo();">Guardar</button>
                                        <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="Ocultar_Vehículo();">Cerrar</button>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6">

                        <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarPatente();">Validar Vehículo&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                        <div class="flex d-flex">
                            <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('inicial')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                </svg>&nbsp;Volver&nbsp; 
                            </button>
                            <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_solicitante')" <?php if(!$datos_vehiculo_validados): ?> disabled <?php endif; ?>>Continuar&nbsp; &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!--TRAMITE-->
            <?php if($datos_solicitante): ?>
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex">
                        <div class="form-group col-12 col-md-6">
                            <h2 class="titulo1">Datos del Solicitante</h2>
                            <label class="titulo_card" for="codigoTramite">CUIL / CUIT</label>
                            <input class="form-control texto" type="text" tooltip="CUIL / CUIT" maxlength="11" wire:model="cuil">
                            <p class="text-muted">Ingresa el CUIL / CUIT sin guiones ni espacios.</p>

                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarSolicitante()">Buscar Solicitante&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                            <?php if($datos_solicitante_validados): ?>
                                <div class="col-12">
                                    <p class="text-muted mt-3">Solicitante en cáracter de</p>
                                    <select  id="eleccion" class="form-control col-3" style="font-size:1.2rem; height: 3.2rem;" wire:change="cambiar_tramite()" wire:model="tramite_seleccionado" >
                                        <option value="0">--- Seleccione alguna opción ---</option>
                                        <option value="1">Apoderado</option>
                                        <option value="2">Curador</option>
                                        <option value="3">Representante Legal</option>
                                        <option value="4">Titular</option>
                                        <option value="5">Tutor</option>
                                        <option value="6">Acreedor Prendario</option>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <?php if($datos_solicitante_validados): ?>
                                <div class="col-12 tarjeta-verde">
                                    <label class="titulo_card" style="margin-bottom: 20px">Detalles del solicitante</label><br>
                                    <div style="width: 100%">
                                        <p class="flex">Apellido<input class="form-control ml-3" type="text" value="<?php echo e($apellido); ?>" disabled></p>
                                        <p class="flex">Nombre<input class="form-control ml-3" type="text" value="<?php echo e($nombre); ?>" disabled></p>
                                        <p class="flex">Email<input class="form-control ml-3" type="text" value="<?php echo e($solicitante['email']); ?>" disabled></p>
                                        <p class="flex">Celular<input class="form-control ml-3" type="text" value="<?php echo e($solicitante['telefono']); ?>" disabled></p>
                                        <p class="flex">Dirección<input class="form-control ml-3" type="text" value="<?php echo e($solicitante['direccion']); ?>" disabled></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($necesita_agregar_solicitante): ?>
                                <div class="col-12 tarjeta-verde">
                                    <label class="titulo_card mb-3">Detalles del solicitante</label><br>
                                    <div style="width: 100%">
                                        <p class="flex">Apellido<input class="form-control ml-3" type="text" wire:model="agregar_apellido"><?php $__errorArgs = ['agregar_apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex">Nombre<input class="form-control ml-3" type="text" wire:model="agregar_nombre"></p><?php $__errorArgs = ['agregar_nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex">Email<input class="form-control ml-3" type="text" wire:model="agregar_email"></p><?php $__errorArgs = ['agregar_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex">Celular<input class="form-control ml-3" type="text" wire:model="agregar_celular" maxlength="11"></p><?php $__errorArgs = ['agregar_celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex">Dirección<input class="form-control ml-3" type="text" wire:model="agregar_direccion"></p><?php $__errorArgs = ['agregar_direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                                        <p class="flex w-100" style="justify-content: flex-start;">Condición iva
                                            <select class="form-control" wire:model="agregarivaid" style="width: 96%;">
                                                <option value="0">--- Seleccione una opción ---</option>
                                                <?php $__currentLoopData = $ivas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($iva->id); ?>"><?php echo e($iva->descripcion); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['agregarivaid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-message"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>

                                            <?php if(session()->has('message')): ?>
                                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                                    <div class="flex">
                                                        <div>
                                                            <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div style="width: 100%; display: flex; justify-content: space-around;">
                                        <button type="submit" class="btn boton-warning mr-3" wire:click="Agregar_Solicitante()">Guardar</button>
                                        <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="Ocultar_Solicitante();">Cerrar</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="tarjeta-celeste">
                        <div class="col-12 block">
                            <div class="media-left flex d-flex" style="margin-right: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                <div class="media-body ml-4">
                                    <h4 class="titulo2"><b>¿Los datos del solicitante son correctos?</b></h4>
                                    <p class="text-muted">Para confirmar que los datos son correctos, presioná CONTINUAR;</p>
                                    <p class="text-muted">si querés corregir algunos de los campos solicitados, presioná MODIFICAR DATOS y realizá nuevamente la carga.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex d-flex">
                        <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_vehiculo')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>

                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('seleccionar_turno')" <?php if(!$datos_solicitante_validados): ?> disabled <?php endif; ?>>Continuar&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>

            
            <?php if($seleccionar_turno): ?>
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex">
                        <div class="form-group col-12">
                            <h2 class="titulo1">Seleccionar Turno</h2>
                            <h2 style="font-size: 1.5em; font-family: sans-serif; font-weight: 700; max-width: 100%; overflow-x: hidden;">Según nuestra base de datos, para este CUIT/CUIL se registraron</h2>
                            <label class="titulo_card" for="codigoTramite">Días disponibles</label>
                            <div class="calendar text-center">

                                <?php if (isset($component)) { $__componentOriginal65bacedc1e494dfd323b86854eb6d160 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65bacedc1e494dfd323b86854eb6d160 = $attributes; } ?>
<?php $component = App\View\Components\Registro\CalendarioComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('registro.calendario-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Registro\CalendarioComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal65bacedc1e494dfd323b86854eb6d160)): ?>
<?php $attributes = $__attributesOriginal65bacedc1e494dfd323b86854eb6d160; ?>
<?php unset($__attributesOriginal65bacedc1e494dfd323b86854eb6d160); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal65bacedc1e494dfd323b86854eb6d160)): ?>
<?php $component = $__componentOriginal65bacedc1e494dfd323b86854eb6d160; ?>
<?php unset($__componentOriginal65bacedc1e494dfd323b86854eb6d160); ?>
<?php endif; ?>
                                <div style="justify-content: center; display:flex; margin-top: 15px">
                                    <input class="form-control texto" type="text" tooltip="CUIL / CUIT" wire:model="diaSeleccionado">
                                </div>
                                <p class="text-muted">Elegí un día disponible (En Verde).</p>

                                <div style="justify-content: center; display:flex; margin-bottom: 15px">
                                    <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_solicitante')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                        </svg>&nbsp;Volver&nbsp; 
                                    </button>

                                    <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_final')" <?php if(!$tramite_seleccionado): ?> disabled <?php endif; ?>>Continuar&nbsp; &nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($datos_final): ?>
                <div id="cuerpo" class="container">
                    <div class="well">
                        <h2>Solicitud Finalizada</h2>

                        <!--TURNO-->
                        <div class="col-sm-12">
                            <div class="alert alert-info tarjeta-celeste">
                                <div class="media">
                                    <div class="media-body">
                                        <h4>Agendá el turno</h4>
                                        
                                        <p class="margin-0">Te esperamos en el registro el <strong class="lead text-primary ng-binding"><?php echo e($diaSeleccionado); ?></strong> a las <strong class="lead text-primary ng-binding">11:40</strong> hs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--REGISTRO-->
                        <div class="col-sm-12">
                            <div class="alert alert-success tarjeta-celeste">
                                <div class="media">
                                    <div class="media-body">
                                        <h4>Lugar de la Reunión</h4>
                                        <p class="margin-0 ng-binding">GENERAL SAN MARTIN N° 1 (13003) - <strong class="lead text-primary ng-binding">ALBUERA 554  </strong>, GRAL.SAN MARTIN.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--BOTONES-->
                        <div class="form-group flex d-flex">
                            <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('seleccionar_turno')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                </svg>&nbsp;Volver&nbsp; 
                            </button>
                            
                            <a href="/registro">
                                <button type="submit" class="btn btn-success boton" style="text-decoration: none;" wire:click="Mostrar('datos_final')" <?php if(!$datos_turno_validados): ?> disabled <?php endif; ?>>Salir&nbsp; &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
        function soloNumeros(e) {
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }

        function convertirAMayusculas(e) {
            const input = e.target;
            input.value = input.value.toUpperCase();
        }

        document.getElementById('cuil').addEventListener('keypress', soloNumeros);
        document.getElementById('agregar_celular').addEventListener('keypress', soloNumeros);

    </script>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/registro/tramitesonline-component.blade.php ENDPATH**/ ?>