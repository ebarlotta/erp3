<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <div id="cuerpo" class="container pt-4" >
            <h1 class="titulo1">Iniciar Trámite Online</h1>

            <label class="text-muted mb-3">Elegí qué trámite querés iniciar.</label>            


            <div class="form-group" style="border:1px solid #bbb6b6; padding:2rem; background-color: #ededed8c; !important; margin-bottom: 30px;">
            
                <!--TRAMITE-->
                <div class="form-group">
                    <h2 class="titulo1">Selección de Trámite</h2>
                    <label class="titulo_card" for="codigoTramite">Tipo de Trámite</label>
                    <select  id="eleccion" class="form-control" style="font-size:1.2rem; height: 3.2rem;" wire:change="cambiar_tramite()" wire:model="tramite_seleccionado" >
                            <option>--- Seleccione alguna opción ---</option>
                            {{-- <option>verde, cedula, cero kilometro, titulo, denuncia, prenda...</option> --}}
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
                                {{-- <li class="text-muted">Lo solicita el titular, condómino, el adquirente o sus representantes legales o apoderados.</li>
                                <li class="text-muted">Solicitud Tipo 12 con la verificación efectuada</li>
                                <li class="text-muted">Documentación de origen del motor que se incorpora.</li>
                                <li class="text-muted">Título del automotor o CAT (Constancia de asignación de titulo), cédulas expedidas o sus respectivas denuncias de extravío. En caso de existir prenda deberá presentar la notificación al acreedor prendario.</li> --}}
                                    <li class="text-muted">{{ $requisito->descripcionrequisitotipotramite }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                @endif
                <button type="submit" class="btn btn-success boton">Continuar&nbsp; 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                </button>
            </div>


        </div>
    </main>
</div>
