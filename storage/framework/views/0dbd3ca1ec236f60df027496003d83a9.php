<div>
    <main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="<?php echo e(asset('css/registro.css')); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Estimador de Costos</h1>

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
                                                <td><?php echo e($tramite_descripcion); ?></td>
                                                
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group tarjeta-gris">
                <p class="text-muted mt-3">Calculá los costos aproximados para la <b>inscripción</b> de un vehículo 0 KM o la <b>transferencia</b> de un vehículo usado.</p>
                <select  id="eleccion" class="form-control col-12 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:model="tramite_seleccionado" wire:change="ElegirTramite();" >
                
                    <option value="0">--- Seleccione alguna opción ---</option>
                    <?php $__currentLoopData = $tramites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tramite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tramite->id); ?>"><?php echo e($tramite->nombretramite); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <?php if($tramite_descripcion=="TRANSFERENCIA"): ?>
                <div class="form-group tarjeta-gris">
                    <div class="col-12 d-md-flex">
                        <div class="col-12 col-md-4 mb-3">
                            Modelo / Año
                            <select class="form-control col-12 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:model="modelo" wire:change="BuscarDato();" >
                                <option value="0">--- Seleccione alguna opción ---</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>

                                <?php $__currentLoopData = $tramites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tramite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tramite->id); ?>"><?php echo e($tramite->nombretramite); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            Descripción
                            <input type="text" wire:model="descripcion" class="form-control col-12 mb-3 mb-3" style="font-size:1.2rem; height: 3.2rem;">
                        </div>

                        <div class="col-12 col-md-4 align-bottom">
                            <label for=""></label>
                            <input type="button" class="btn btn-info col-12 mb-4" value="Buscar" wire:click="cargarListado();">
                        </div>
                    </div>
                    <div class="col-12 flex d-flex">
                        <table class="table table-striped table-hover">
                            <?php if($listado): ?>
                                <tr>
                                    <td>Descripción del Vehículo</td>
                                    <td>Avalúo</td>
                                </tr>
                                <?php if($mostrarListado): ?>
                                    <?php echo $listado; ?>

                                <?php else: ?>
                                <tr>
                                    <td colspan="2" style="border: black solid;background-color: lightgreen;"><?php echo e($nombreCompleto); ?></td>
                                </tr>
                                <?php endif; ?>
                            <?php else: ?>
                                    <tr><td>No se encontraron datos aún</td></tr>
                            <?php endif; ?>
                        </table>
                    </div>
                    <?php if($seleccionado): ?>
                        <div style="padding-left: 10px; border: 1px solid #bbb6b6; background-color: #ededed8c !important; margin-bottom: 30px;">
                            <label class="titulo_card" for="codigoTramite">Presupuesto</label>
                            <table class="table-striped col-12" style="font-size: 0.9rem">
                                <tbody>
                                    <?php if($detalles): ?>
                                        <tr class="titulo_card blue-300" style="background-color: lightblue;">
                                            <td class="text-center d-none d-md-block" style="width: 9rem">Item</td>
                                            
                                            <td>Descripción</td>
                                            <td class="text-right col-3">Precio Unitario</td>
                                            <td class="text-center" style="width: 14rem">Cant.</td>
                                            <td class="text-center">Total</td>
                                        </tr>
                                        <?php if(!is_null($registroinicial)): ?>
                                        <tr style="height: 30px;">
                                            <td class="text-center d-none d-md-block"></td>
                                            <td><?php echo e($registroinicial['descripcion']); ?> </td>
                                            <td class="text-right pr-2">$<?php echo e(number_format($registroinicial['PrecioUnitario'],0,",",".")); ?> </td>
                                            <td class="text-center"><?php echo e($registroinicial['Cantidad']); ?> </td>
                                            <td class="text-right pr-2">$<?php echo e(number_format($registroinicial['PrecioUnitario'],0,",",".")); ?> </td>
                                            <td></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="height: 30px;">
                                                <td class="text-center d-none d-md-block">1</td>
                                                <td><?php echo e($detalle->descripcionrequisitotipotramite); ?></td>
                                                <td class="text-right pr-2">$<?php echo e(number_format($detalle['precio'],0,",",".")); ?></td>
                                                <td class="text-center"><?php echo e($detalle['cantidad']); ?></td>
                                                <td class="text-right pr-2">$<?php echo e(number_format($detalle['precio'] * $detalle['cantidad'],0,",",".")); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="background-color: lightblue; height: 30px;">
                                            <td colspan=5 class="text-right pr-2"><b>$ <?php echo e(number_format($total,0,",",".")); ?></b></td>
                                            <td class="text-right pr-2"></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/registro/estimador-component.blade.php ENDPATH**/ ?>