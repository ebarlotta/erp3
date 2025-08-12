<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class="container pt-4" >
            <h1 class="titulo1">Obtener Informe Web</h1>
            <label class="text-muted mb-3">Completá los datos personales y de contacto del solicitante.</label>

            {{-- Resúmen --}}
            {{-- ======= --}}
            @if($datos_solicitante || $datos_vehiculo || $seleccion_tramite || $forma_pago)
                <div class="form-group tarjeta-gris">            
                    <div>
                        <div class="panel panel-info hidden-xs ng-scope" style="margin-bottom: 20px;" ng-if="resumenCtrl.solicitud.codigoTramite || resumenCtrl.solicitud.solicitante || resumenCtrl.solicitud. vehiculo || resumenCtrl.solicitud.turno || resumenCtrl.solicitud.tipoTramite">
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
                                        <tr class="p-3" style="border:white 10px:">
                                            <td class="text-muted text-right" style="width: 15%">Trámite</td>
                                            <td colspan="3">ALTA DE CARROCERIA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!--TRAMITE-->
            @if($datos_solicitante || $estado_inicial)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex">
                        <div class="form-group col-6">
                            <h2 class="titulo1">Datos del solicitante</h2>
                            <label class="titulo_card" for="codigoTramite">CUIL / CUIT</label>
                            <input class="form-control texto" type="text" tooltip="CUIL / CUIT" wire:model="cuil" id="cuil" maxlength="11">
                            <p class="text-muted">Ingresa el CUIL / CUIT sin espacios ni guiones.</p>

                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9">Buscar Solicitante&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>

                            <button type="button" class="btn btn-success boton" wire:click="Mostrar('datos_vehiculo')">Continuar&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                            
                        </div>


                        <div class="col-6 tarjeta-verde">
                            <label class="titulo_card" for="codigoTramite">Detalles del solicitante</label><br>
                            <div>
                                <input class="col-10" type="text" value="Apellido	BARLOTTA" style="font-size: 1.3rem;">
                                <input class="col-10" type="text" value="Nombre	ENZO GABRIEL" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                <input class="col-10" type="text" value="Email	EBA*****@YAHOO.COM.AR" style="font-size: 1.3rem;">
                                <input class="col-10" type="text" value="Celular	0263 - 15***5287" style="background-color: #e7e7e7; font-size: 1.3rem;">
                            </div>                                
                        </div>
                        </div>

                    <div class="tarjeta-celeste">
                        <div class="media-left" style="margin-right: 13px;">
                            <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                        </div>
                        <div class="media-body">
                            <h4 class="titulo2"><b>¿Los datos del solicitante son correctos?</b></h4>
                            <p class="text-muted">Para confirmar que los datos son correctos, presioná CONTINUAR;<br>si querés corregir algunos de los campos solicitados, presioná MODIFICAR DATOS y realizá nuevamente la carga.</p>
                        </div>

                    </div>

                    <div class="flex d-flex">
                        
                        <button type="submit" class="btn btn-info boton mr-3" wire:click="Mostrar('inicial')" style="background-color: #e9e506 !important; color:#F9F9F9">Volver&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_vehiculo')">Continuar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- VEHÍCULO --}}
            @if($datos_vehiculo)
                <div class="form-group tarjeta-gris">
                        <div class="flex d-flex">
                            <div class="form-group col-6">
                                <h2 class="titulo1">Datos del Vehículo</h2>
                                <label class="titulo_card" for="codigoTramite">Patente</label>
                                <input class="form-control texto" type="text" tooltip="PATENTE" wire:model="patente">
                                <p class="text-muted">Ingresa la patente sin espacios ni guiones ni barras</p>

                                <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9">Validar&nbsp; 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                                </button>
                                <div class="flex d-flex">
                        
                                    <button type="submit" class="btn btn-info boton mr-3" wire:click="Mostrar('inicial')" style="background-color: #e9e506 !important; color:#F9F9F9">Volver&nbsp; 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                                    </button>
                                    <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_tramite')">Continuar&nbsp; 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="col-6 tarjeta-verde">
                                <label class="titulo_card" for="codigoTramite">Detalles del Vehículo</label><br>
                                <div>
                                    <input class="col-10" type="text" value="Marca	VOLKSWAGEN" style="font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Modelo	BORA 2.0" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Año	2011" style="font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Registro	GENERAL SAN MARTIN N° 1 (13003)" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                </div>                                
                            </div>
                            
                        </div>

                </div>
            @endif

            {{-- TRAMITE --}}
            @if($seleccion_tramite)
                <div class="form-group tarjeta-gris">
                    <div class="form-group">
                        <label class="text-muted mb-3">Elegí qué trámite querés iniciar.</label>            
                        <h2 class="titulo1">Selección de Trámite</h2>
                        <label class="titulo_card" for="codigoTramite">Tipo de Trámite</label>
                        <select class="form-control" style="font-size:1.2rem; height: 3.2rem;" wire:model="tramite" >
                            <option value="0">--- Seleccione alguna opción ---</option>
                            <option value="1">INFORME DE MULTAS POR INFRACCIONES DE TRÁNSITO</option>
                            <option value="2">INFORME ESTADO DE DOMINIO</option>
                            <option value="3">INFORME HISTORICO DE TITULARIDAD Y DE ESTADO DE DOMINIO</option>
                        </select>
                    </div>
                </div>
                 <div class="flex d-flex">
                        
                    <button type="submit" class="btn btn-info boton mr-3" wire:click="Mostrar('datos_vehiculo')" style="background-color: #e9e506 !important; color:#F9F9F9">Volver&nbsp; 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                    </button>
                    <button type="submit" class="btn btn-success boton" wire:click="Mostrar('forma_pago')">Continuar&nbsp; 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                    </button>
                 </div>
            @endif
            
            {{-- PAGO --}}
            @if($forma_pago)
                <div class="form-group tarjeta-gris">
                    <div class="form-group">
                        <h2 class="titulo1">Pagar la solicitud</h2>           
                        <label class="titulo_card" for="codigoTramite">Presupuesto1</label>
                        
                        <table class="table table-striped margin-bottom-no">
                            <tbody>
                                <tr class="titulo_card blue-300" style="background-color: lightblue;">
                                    <td>Item</td>
                                    <td>Descripción</td>
                                    <td>Precio Unitario</td>
                                    <td>Cantidad</td>
                                    <td>Total</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>INFORME ESTADO DE DOMINIO</td>
                                    <td class="text-right pr-2">$260,00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right pr-2">$260,00</td>
                                </tr>
                                    <tr>
                                    <td class="text-center">2</td>
                                    <td>FORMULARIO TP</td>
                                    <td class="text-right pr-2">$4.188,00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right pr-2">$4.188,00</td>
                                </tr>
                                <tr style="background-color: lightblue;">
                                    <td colspan=5 class="text-right pr-2">$4.188,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="titulo1">Forma de Pago</h2>
                    inluir formas acá
                    
                    <div class="flex d-flex">    
                        <button type="submit" class="btn btn-info boton mr-3" wire:click="Mostrar('datos_tramite')" style="background-color: #e9e506 !important; color:#F9F9F9">Volver&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('pago')">Continuar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <script>
        function soloNumeros(e) {
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }

        document.getElementById('cuil').addEventListener('keypress', soloNumeros);
    </script>
</div>
