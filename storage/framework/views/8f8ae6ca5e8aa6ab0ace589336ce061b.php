
<div>
    <div class="">
        <?php if(session()->has('message')): ?>
            <div class="rounded-md bg-red-300 px-6 mx-2 py-1 mt-3" role="alert">
                    <?php echo e(session('message')); ?></p>
            </div>
        <?php endif; ?>
        <ul class="mb-0 list-none pb-4 d-flex flex-row">
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center" style="text-decoration: none;">
                <?php if($tabActivo==1): ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(1)">
                <?php else: ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(1)">
                <?php endif; ?>
                    <i class="fas fa-space-shuttle text-base mr-1"></i> Generar Certificado
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <?php if($tabActivo==2): ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(2)">
                <?php else: ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(2)">
                <?php endif; ?>
                    <i class="fas fa-cog text-base mr-1"></i> Autorizar Certificado
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <?php if($tabActivo==3): ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(3)">
                <?php else: ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(3)">
                <?php endif; ?>
                    <i class="fas fa-briefcase text-base mr-1"></i> Datos de Clientes
                </a>
            </li>
            <!-- <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <?php if($tabActivo==4): ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(4)">
                <?php else: ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(4)">
                <?php endif; ?>
                    <i class="fas fa-cog text-base mr-1"></i> Cuentas Corrientes
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <?php if($tabActivo==5): ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(5)">
                <?php else: ?>
                    <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(5)">
                <?php endif; ?>
                    <i class="fas fa-briefcase text-base mr-1"></i> Libros de Iva
                </a>
            </li> -->
        </ul>
        <?php if($demora==true): ?>
            <div class="inset-0 fixed">
                <div class="absolute flex justify-center w-full mt-10 p-18">
                    <div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
                        <div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            Espere unos segundos mientras se procesa la información ingresada...
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="tab-content tab-space">
                    <div class="<?php echo e($tabActivo != 1 ? 'hidden' : ''); ?>">
                        <input type="text" name="" id="" wire:click="Facturar()" value="Facturar">
                        <input type="text" class="bnt btn-info" wire:click="Emitidos()" value="Emitido">
                        <span wire:loading>
                            <div class="inset-0 fixed">
                                <div class="absolute flex justify-center w-full mt-6 p-18">
                                    <div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
                                        <div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            Espere unos segundos mientras se procesa la información ingresada...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                        <div style="background-color: rgb(137, 168, 168); font-size: 14px;" class="d-flex p-3">
                            <div class="col-3 grid text-left">
                                <label style="font-size: 80%;">CUIT de la persona (física/jurídica) </label>
                                <input class="w-full text-center rounded-md h-8" type="text" wire:model="txttax_id" data-toggle="tooltip" data-placement="top" title="CUIT de la persona (física/jurídica) al cual le queremos generar el certificado.">
                                <?php $__errorArgs = ['txttax_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-3 grid text-left">
                                <label style="font-size: 80%;">CUIT Usuario para ingresar a AFIP (Representante) </label>
                                <input class="w-full text-left rounded-md h-8 pl-2" type="text" wire:model="txtusername" data-toggle="tooltip" data-placement="top" title="Usuario para ingresar a AFIP (Representante). CUIT sin guiones">
                                <?php $__errorArgs = ['txtusername'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-3 grid text-left">
                                <label style="font-size: 80%;">Contraseña </label>
                                <input class="w-full text-center rounded-md h-8" type="password" wire:model="txtpassword" data-toggle="tooltip" data-placement="top" title="Contraseña para ingresar a AFIP.">
                                <?php $__errorArgs = ['txtpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-3 grid text-left">
                                <label style="font-size: 80%;">Alias </label>
                                <input class="w-full text-right rounded-md h-8 pl-2" type="text" wire:model="txtalias" data-toggle="tooltip" data-placement="top" title="Alias para el certificado (Nombre para reconocerlo en AFIP)">
                                <?php $__errorArgs = ['txtalias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div style="background-color: rgb(137, 168, 168); font-size: 14px;" class="d-flex p-3">
                            <div class="col-6 grid text-left">
                                <label for="">Certificado</label>
                                <textarea rows="10" class="rounded-md w-full"  >
                                    
                                    <?php echo $certificado_crt; ?>

                                </textarea>
                            </div>
                            <div class="col-6 grid text-left">
                                <label for="">Key</label>
                                <textarea rows="10" class="rounded-md w-full">
                                    
                                    <?php echo e($certificado_key); ?>

                                </textarea>
                            </div>
                        </div>
                        <div class="d-flex" style="background-color: rgb(137, 168, 168); font-size: 14px;" >
                            <div class="p-3 col-3">
                                <label style="font-size: 80%; margin-right: 5px;">Estado del <br>Certificado</label>
                                <input style="width: 33px; padding-top: 14px; background-color: <?php echo e($estado_color); ?>"  class="rounded-xl h-8"  disabled>
                                <label style="padding-bottom: 9px;vertical-align: middle;padding-left: 6px;"><?php echo e($estado); ?></label>
                            </div>
                            <div class="p-3 col-3">
                                <label style="font-size: large; margin-right: 5px;"><b>Modo de Trabajo</b></label>
                                <label style="padding: 8px; border-radius: 4px; margin: 3px; font-size: large; <?php echo e($certificado_production ?  'background-color: lightcoral;' : 'background-color: lightgreen;'); ?>"><?php echo e($certificado_production ? 'PRODUCCIÓN' : 'TESTING'); ?></label>
                            </div>
                            <div class="col-6 text-center d-flex justify-center">
                                <input class="btn btn-info shadow-md p-3 m-3" type="button" value="Generar Certificado" wire:click="GenerarCertificado()">
                            </div>
                            <div class="col-3"></div>
                        </div>

                            <!-- Botones -->
                            
                            <!-- Modals -->
                            

                            <!-- Gestionar Comprobantes -->
                            
                    </div>

                    <div class="<?php echo e($tabActivo != 2 ? 'hidden' : ''); ?>">
                        <div style="background-color: #E3F6CE" class="block">
                            <!-- Botones -->
                            <div class="flex">
                                <div class="w-80">
                                    <?php if($this->certificados): ?>
                                    
                                            <table class="table table-striped w-80" style="width: 80%;">
                                                <tr style="background-color: #777;">
                                                    <td style="border: 1px solid black;">Certificados</td>
                                                    <td style="border: 1px solid black;">Punto de Venta Habilitado</td>
                                                    <td style="border: 1px solid black;">Opciones</td>
                                                </tr>
                                                <?php $__currentLoopData = $certificados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td style="border: 1px solid black;vertical-align: middle;">
                                                            <?php echo e($certificado->alias); ?>

                                                        </td>
                                                        <td style="border: 1px solid black;vertical-align: middle;">
                                                            
                                                            
                                                                <?php echo e($certificado_PtoVta); ?>

                                                                
                                                            
                                                        </td>
                                                        <td style="border: 1px solid black;">
                                                            <input class="btn btn-info shadow-md p-3 m-3" type="button" value="Solicitar Autorización" wire:click="AutorizarCertificado()">
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>

                                            
                                    <?php endif; ?>
                                </div>
                                
                            </div>
                            <!-- Modals -->
                            

                            

                            
                        </div>
                    </div>

                    <div class="<?php echo e($tabActivo != 3 ? 'hidden' : ''); ?>">
                        <input type="button" value="Obtener Datos" wire:click="ObtenerDatosCliente();">
                        <?php echo $datosCliente; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/certificado/certificado-component.blade.php ENDPATH**/ ?>