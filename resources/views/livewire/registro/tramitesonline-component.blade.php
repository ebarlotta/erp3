<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <div id="cuerpo" class="container pt-4" >
            <h1 class="titulo1">Iniciar Trámite Online</h1>

            <div class="form-group tarjeta-gris">            
                @if($tramite_seleccionado<>0)
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
                @endif
            </div>

            <!--TRAMITE-->
            <div class="form-group tarjeta-gris">
                <div class="form-group">
                    <label class="text-muted mb-3">Elegí qué trámite querés iniciar.</label>            
                    <h2 class="titulo1">Selección de Trámite</h2>
                    <label class="titulo_card" for="codigoTramite">Tipo de Trámite</label>
                    <select  id="eleccion" class="form-control" style="font-size:1.2rem; height: 3.2rem;" wire:change="cambiar_tramite()" wire:model="tramite_seleccionado" >
                            <option value="0">--- Seleccione alguna opción ---</option>
                            @foreach ($tramites as $tramite)
                                <option value="{{ $tramite->id }}">{{ $tramite->nombretramite }}</option>
                            @endforeach
                    </select>
                </div>

                @if($tramite_seleccionado)
                    <div class="tarjeta-celeste">
                        <div class="media-left" style="margin-right: 13px;">
                            <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                        </div>
                        <div class="media-body">
                            <h4 class="titulo2"><b>Descripción</b></h4>
                            <p class="text-muted">Trámite para incorporar el motor de los dominios inscriptos</p>
                            <h5 class="titulo2">Requisitos</h5>
                            <ul>
                                @foreach($requisitos as $requisito)
                                    <li class="text-muted">{{ $requisito->descripcionrequisitotipotramite }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-success boton">Continuar&nbsp; 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                    </button>
                @endif
            </div>

            <div class="form-group tarjeta-gris">
                @if($datos_vehiculo)
                    <div class="flex d-flex">
                        <div class="form-group col-6">
                            <h2 class="titulo1">Datos del Vehículo</h2>
                            <label class="titulo_card" for="codigoTramite">Patente</label>
                            <input class="form-control texto" type="text" tooltip="PATENTE">
                            <p class="text-muted">Ingresa la patente sin espacios ni guiones ni barras</p>


                            <label class="titulo_card" for="codigoTramite">Chasis</label>
                            <input class="form-control texto" type="text" tooltip="CHASIS">
                            <p class="text-muted">Ingresa las últimas 7 posiciones del chasis de tu vehículo. Este dato figura en tu cédula.</p>
                            <p class="text-muted">Si la cantidad de caracteres es inferior a 7, ingresá la totalidad de los mismos.</p>

                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9">Validar&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                            <button type="submit" class="btn btn-success boton">Continuar&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                        </div>
                        @if($vehiculo_validado)
                        <div class="col-6 tarjeta-verde">
                                <label class="titulo_card" for="codigoTramite">Patente</label><br>
                                <div>
                                    <input class="col-10" type="text" value="Marca	VOLKSWAGEN" style="font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Modelo	BORA 2.0" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Año	2011" style="font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Registro	GENERAL SAN MARTIN N° 1 (13003)" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                </div>                                
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="form-group tarjeta-gris">
                @if($datos_solicitante)
                    <div class="flex d-flex">
                        <div class="form-group col-6">
                            <h2 class="titulo1">Datos del Solicitante</h2>
                            <label class="titulo_card" for="codigoTramite">CUIL / CUIT</label>
                            <input class="form-control texto" type="text" tooltip="CUIL / CUIT">
                            <p class="text-muted">Ingresa el CUIL / CUIT sin guiones ni espacios.</p>                            

                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9">Buscar Solicitante&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                            <button type="submit" class="btn btn-success boton">Continuar&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                        </div>
                        @if($vehiculo_validado)
                            <div class="col-6 tarjeta-verde">
                                <label class="titulo_card" for="codigoTramite">Datos del Solicitante</label><br>
                                <div>
                                    <input class="col-10" type="text" value="Apellido	BARLOTTA" style="font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Nombre	ENZO GABRIEL" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Email	EBA*****@YAHOO.COM.AR" style="font-size: 1.3rem;">
                                    <input class="col-10" type="text" value="Celular	0263 - 15***5287" style="background-color: #e7e7e7; font-size: 1.3rem;">
                                </div>                                
                            </div>
                        @endif
                    </div>

                    {{-- <div class="tarjeta-celeste" style="display: block !important"> --}}

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
                        <button type="submit" class="btn btn-success boton">Continuar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                @endif
            </div>

            <div class="form-group tarjeta-gris">
                @if($datos_solicitante)
                    <div class="flex d-flex">
                        <div class="form-group col-6">
                            <h2 class="titulo1">Seleccionar Turno</h2>
                            <h2 class="titulo1">Según nuestra base de datos, para este CUIT/CUIL se registraron</h2>
                            
                            <ul>
                                <li>Turnos tomados a futuro: 0</li>
                                <li>Turnos atendidos: 0</li>
                                <li>Turnos cancelados por la DNRPA: 0</li>
                                <li>Turnos cancelados por vos: 0</li>
                                <li>Turnos ausentes: 0</li>
                            </ul>
                            <label class="titulo_card" for="codigoTramite">Días disponibles</label>
                            <table><caption><a class="previous-month" onclick="aCalendar.refreshWith(2025,6,1)"></a><span>AGOSTO 2025</span><a class="next-month" onclick="aCalendar.refreshWith(2025,8,1)"></a></caption><tbody><tr class="dia"><th>Do</th><th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th></tr><tr><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td align="center" class="not-working-day">&nbsp;1&nbsp;</td><td align="center" class="not-working-day">&nbsp;2&nbsp;</td></tr><tr><td align="center" class="not-working-day">&nbsp;3&nbsp;</td><td align="center" class="not-working-day">&nbsp;4&nbsp;</td><td align="center" class="not-working-day">&nbsp;5&nbsp;</td><td align="center" class="not-working-day">&nbsp;6&nbsp;</td><td align="center" class="not-working-day">&nbsp;7&nbsp;</td><td align="center" class="not-working-day">&nbsp;8&nbsp;</td><td align="center" class="not-working-day">&nbsp;9&nbsp;</td></tr><tr><td align="center" class="not-working-day">&nbsp;10&nbsp;</td><td align="center" class="not-working-day">&nbsp;11&nbsp;</td><td align="center" class="today"><b>12</b></td><td align="center" class="availableDay"><b><a shiftdate="13/08/2025" class="availableDay">13</a></b></td><td align="center" class="availableDay"><b><a shiftdate="14/08/2025" class="availableDay">14</a></b></td><td align="center" class="no-shift-available">&nbsp;15&nbsp;</td><td align="center" class="not-working-day">&nbsp;16&nbsp;</td></tr><tr><td align="center" class="not-working-day">&nbsp;17&nbsp;</td><td align="center" class="availableDay"><b><a shiftdate="18/08/2025" class="availableDay">18</a></b></td><td align="center" class="availableDay"><b><a shiftdate="19/08/2025" class="availableDay">19</a></b></td><td align="center" class="availableDay"><b><a shiftdate="20/08/2025" class="availableDay">20</a></b></td><td align="center" class="availableDay"><b><a shiftdate="21/08/2025" class="availableDay">21</a></b></td><td align="center" class="availableDay"><b><a shiftdate="22/08/2025" class="availableDay">22</a></b></td><td align="center" class="not-working-day">&nbsp;23&nbsp;</td></tr><tr><td align="center" class="not-working-day">&nbsp;24&nbsp;</td><td align="center" class="availableDay"><b><a shiftdate="25/08/2025" class="availableDay">25</a></b></td><td align="center" class="availableDay"><b><a shiftdate="26/08/2025" class="availableDay">26</a></b></td><td align="center" class="availableDay"><b><a shiftdate="27/08/2025" class="availableDay">27</a></b></td><td align="center" class="availableDay"><b><a shiftdate="28/08/2025" class="availableDay">28</a></b></td><td align="center" class="availableDay"><b><a shiftdate="29/08/2025" class="availableDay">29</a></b></td><td align="center" class="not-working-day">&nbsp;30&nbsp;</td></tr><tr><td align="center" class="not-working-day">&nbsp;31&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td><td class="not-working-day">&nbsp;</td></tr></tbody></table>

                            <input class="form-control texto" type="text" tooltip="CUIL / CUIT">
                            <p class="text-muted">Elegí un día disponible (En Verde).</p>                            

                            <button type="submit" class="btn btn-success boton">Continuar&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>

                        </div>
                    </div>  
                @endif
            </div>
        </div>
    </main>
</div>
