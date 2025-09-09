{{-- <x-guest-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ecosystems') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        
        {{-- <script src="{{ asset('registro.css') }}" ></script> --}}
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        {{-- <link rel="stylesheet" href="https://barber.gentepiola.net/css/tooltips.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap">
        <link rel="stylesheet" href="https://barber.gentepiola.net/css/app.css"> --}}
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        @livewireStyles
    </head>
    <body>
{{-- <p> --}}
  {{-- <i class="bi bi-arrow-down-up"></i> Transferencia digital
  <i class="fi fi-brands-instagram"></i>
  <i class="fa-light fa-face-smile"></i>
  <i class="fa-solid fa-user"></i> --}}

  <!-- regular style -->
  {{-- <i class="fa-regular fa-user"></i>

  <!-- light style -->
  <i class="fa-light fa-user"></i>

  <!-- thin style -->
  <i class="fa-thin fa-user"></i>

  <!-- duotone style -->
  <i class="fa-duotone fa-solid fa-user"></i>

  <!-- sharp solid style -->
  <i class="fa-sharp fa-solid fa-user"></i>

  <!-- sharp regular style -->
  <i class="fa-sharp fa-regular fa-user"></i>

  <!-- sharp light style -->
  <i class="fa-sharp fa-light fa-user"></i>

  <!-- sharp thin style -->
  <i class="fa-sharp fa-thin fa-user"></i>

  <!-- all new sharp duotone style -->
  <i class="fa-sharp-duotone fa-solid fa-user"></i>

  <!--brand icon-->
  <i class="fa-brands fa-github-square"></i> --}}
{{-- </p> --}}
    {{-- <div>
        <input class="form-control" type="text" id="texto">
        <button type="submit" class="btn btn-success">Continuar&nbsp;<i class="fa fa-arrow-right"></i></button>
    </div> --}}
    {{-- <div class="text-center"> --}}
<div class="justify-center flex d-flex flex-wrap" style="background: #cc7979; color: #111; height: 100%; padding-top: 10%; padding-bottom: 10%;">
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
        <a href="/tramites-online" class="tarjeta-a amarillo" >
            <div class="panel_superior">
                <i class="icono-arg-solidaridad icono-4x text-gray"></i>
            </div>
            <div class="panel_inferior">
                <h4 class="titulo_card">
                    <b>Trámites online</b>
                </h4>
                <p class="text-muted"><strong>¡Ahorrá tiempo!</strong> Iniciá tu trámite online, conocé los requisitos y <strong>elegí</strong> el <i>día</i> y <i>horario</i> para ser atendido en el registro.</p>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
        <a href="/informes-online" class="tarjeta-a rosado" >
            <div class="panel_superior">
                <i class="icono-arg-solidaridad icono-4x text-gray"></i>
            </div>
            <div class="panel_inferior">
                <h4 class="titulo_card">
                    <b>Informes online</b>
                </h4>
                <p class="text-muted">Solicitá informes de <b>estado</b> dominio, <b>histórico</b> titularidad o <b>multas</b> e infracciones y recibilo por correo electrónico.</p>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
        <a href="" class="tarjeta-a celeste" >
            <div class="panel_superior">
                <i class="icono-arg-solidaridad icono-4x text-gray"></i>
            </div>
            <div class="panel_inferior">
                <h4 class="titulo_card">
                    <b>Turnos para consultas o asesoramiento</b>
                </h4>
                <p class="text-muted">Exclusivamente para consultas o asesoramiento en un registro seccional.</p>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
        <a href="/estimador-registro" class="tarjeta-a verdemusgo" >
            <div class="panel_superior">
                <i class="icono-arg-solidaridad icono-4x text-gray"></i>
            </div>
            <div class="panel_inferior">
                <h4 class="titulo_card">
                    <b>Estimador de costos</b>
                </h4>
                <p class="text-muted">Calculá los costos aproximados para la <b>inscripción</b> de un vehículo 0 KM o la <b>transferencia</b> de un vehículo usado.</p>
            </div>
        </a>
    </div>

</div>

<div style="display: flex; justify-content: center; align-items: center; margin: 0; font-size: 14px; line-height: 1.42857143; background: #F9F9F9; color: #111; display: table; width: 100%; font-family: Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;">
    <select  id="eleccion" class="form-control">
        <option>ACTUALIZACION DE CARROCERIA</option>
        <option value="">ALTA DE CARROCERIA</option>
        <option value="">ALTA DE MOTOR PARA VEHICULO INSCRIPTO</option>
        <option value="">ALTA DE MOTOR USADO, ARMADO FUERA DE FABRICA, GARANTIA DE FABRICACION
        </option>
        <option value="">ALTA DE NUEVO MOTOR IMPORTADO</option>
        <option value="">ALTA DE NUEVO MOTOR NACIONAL</option>
        <option value="">ANOTACION DE ENDOSO</option>
        <option value="">ANOTACION DE LOCACION</option>
        <option value="">ANOTACIONES PERSONALES / OFICIO JUDICIAL / INSC.. DE EMBARGO / INSC.
            SUBASTADO</option>
        <option value="">ANULACION DE SOCIEDAD EN FORMACION (SEF)</option>
        <option value="">AUTOMOTOR BAJA TEMPORAL</option>
        <option value="">BAJA DE AUTOMOTOR CON RECUPERACION DE PIEZAS</option>
        <option value="">BAJA DE AUTOMOTOR PARA EXPORTACION DEFINITIVA</option>
        <option value="">BAJA DE AUTOMOTOR POR SINIESTRO, DESTRUCCION O ENVEJECIMIENTO</option>
        <option value="">BAJA DE CARROCERIA</option>
        <option value="">BAJA DE MOTOR POR OTRAS CAUSAS</option>
        <option value="">BAJA DE MOTOR POR SINIESTRO, DESTRUCCION O ENVEJECIMIENTO</option>
        <option value="">BAJA DE MOTOVEHICULO PARA EXPORTACION DEFINITIVA</option>
        <option value="">BAJA DE MOTOVEHICULO POR SINIESTRO, DESTRUCCION O ENVEJECIMIENTO</option>
        <option value="">CAMBIO DE CUADRO O CHASIS</option>
        <option value="">CAMBIO DE DOMICILIO</option>
        <option value="">CAMBIO DE TIPO DE CARROCERIA</option>
        <option value="">CAMBIO DE TITULAR, DENOMINACION SOCIAL O DESTINO</option>
        <option value="">CAMBIO DE USO</option>
        <option value="">CANCELACION DE CONTRATO DE LEASING</option>
        <option value="">CANCELACION DE LOCACION</option>
        <option value="">CANCELACION DE POSESION O TENENCIA</option>
        <option value="">CANCELACION DE PRENDA</option>
        <option value="">CANCELACION ENDOSO</option>
        <option value="">CERTIFICACION DE FIRMAS</option>
        <option value="">CERTIFICADO DE CAMBIO DE TITULARIDAD</option>
        <option value="">CERTIFICADO DE DOMINIO</option>
        <option value="">COMUNICACION DE RECUPERO</option>
        <option value="">CONDICIONAMIENTO DE PRENDA POR TRANSFERENCIA O 0KM</option>
        <option value="">CONFIRMACION DE BIENES PARA SOCIEDADES EN FORMACION(SEF)</option>
        <option value="">CONSIGNACION DE AUTOMOTOR FORMULARIO 17</option>
        <option value="">CONSULTA DE LEGAJO</option>
        <option value="">DENUNCIA DE COMPRA Y POSESION</option>
        <option value="">DENUNCIA DE ROBO O HURTO</option>
        <option value="">DENUNCIA DE VENTA</option>
        <option value="">DEVOLUCION DE AUTOMOTOR A TITULAR</option>
        <option value="">DEVOLUCION DE MOTOVEHICULO A TITULAR</option>
        <option value="">DUPLICADO DE CEDULA</option>
        <option value="">DUPLICADO DE CERTIFICADO DE BAJA DE AUTOMOTOR</option>
        <option value="">DUPLICADO DE CERTIFICADO DE BAJA DE CARROCERIA/CHASIS/CUADRO</option>
        <option value="">DUPLICADO DE CERTIFICADO DE BAJA DE MOTOR</option>
        <option value="">DUPLICADO DE CERTIFICADO DE DENUNCIA DE ROBO/HURTO</option>
        <option value="">DUPLICADO DE CERTIFICADO DE NACIONALIZACION</option>
        <option value="">DUPLICADO DE CERTIFICADO DE RECUPERO</option>
        <option value="">DUPLICADO DE TITULO</option>
        <option value="">ESTIPULACION A FAVOR TERCEROS - ACEPTACION (ALTA DE TERCEROS)</option>
        <option value="">ESTIPULACION A FAVOR TERCEROS - REVOCACION (BAJA DE TERCEROS)</option>
        <option value="">EXPEDICION ADICIONAL DE CEDULA</option>
        <option value="">FOTOCOPIA DE CONSTANCIAS REGISTRALES</option>
        <option value="">INFORME DE ANOTACIONES PERSONALES</option>
        <option value="">INFORME NOMINAL HISTORICO NACIONAL</option>
        <option value="">INFORME NOMINAL NACIONAL</option>
        <option value="">INSCRIPCION DE CONTRATO DE LEASING</option>
        <option value="">INSCRIPCION DE MEDIDA JUDICIAL</option>
        <option value="">INSCRIPCION DE POSESION O TENENCIA</option>
        <option value="">INSCRIPCION DE PRENDA</option>
        <option value="">INSCRIPCION INICIAL DE CERO KILOMETRO</option>
        <option value="">INSCRIPCION INICIAL DE CERO KILOMETRO CON PRENDA DIGITAL</option>
        <option value="">INSCRIPCION INICIAL DE SUBASTADO</option>
        <option value="">LEVANTAMIENTO DE ANOTACIONES PERSONALES</option>
        <option value="">LEVANTAMIENTO DE MEDIDA JUDICIAL</option>
        <option value="">MODIFICACION DE ANOTACIONES PERSONALES</option>
        <option value="">MODIFICACION DE CONTRATO DE LEASING </option>
        <option value="">MODIFICACION DE MEDIDA JUDICIAL</option>
        <option value="">MODIFICACION DE PRENDA</option>
        <option value="">PAGO, JUSTIFICACION O NEGATIVA DE PAGO DE INFRACCIONES</option>
        <option value="">PLACA DE IDENTIFICACION ALTERNATIVA METALICA PARA TRAILERS</option>
        <option value="">RECTIFICACION DE DATOS</option>
        <option value="">RECUPERACION DE CONSTANCIA DE ASIGNACION DE TITULO</option>
        <option value="">REINSCRIPCION DE ANOTACIONES PERSONALES</option>
        <option value="">REINSCRIPCION DE MEDIDA JUDICIAL</option>
        <option value="">REINSCRIPCION DE PRENDA</option>
        <option value="">RENOVACION CONTRATO DE LEASING</option>
        <option value="">REPOSICION DE PLACA METALICA</option>
        <option value="">REVOCACION DE CEDULA PARA AUTORIZADO A CONDUCIR</option>
        <option value="">RPA/RPM PARA CHASIS/CUADRO</option>
        <option value="">RPA/RPM PARA MOTOR</option>
        <option value="">RPA/RPM PARA MOTOR SIMULTANEO</option>
    </select>


    
            {{-- <label class="control-label titulo" for="codigoTramite" style="">Tipo de Trámitesss</label>
            <label class="control-label" for="codigoTramite" style="font-size: 18px;font-family: sans-serif; font-weight: 300; margin: .5em 0; height: 100%; max-width: 100%; overflow-x: hidden">Tipo
                de Trámite</label>
            <label class="control-label" for="codigoTramite" style="line-height: 1.42857143; color: #111; font-family: Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;  margin: 0 0 10px; font-weight: 300; font-size: 18px;">Tipo
                de Trámite</label>

            <label class="control-label" for="codigoTramite" style="font-size: 14px; line-height: 1.42857143; color: #111;font-family: Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;  display: inline-block; max-width: 100%; margin-bottom: 5px; font-weight: 700;">Tipo
                de Trámite</label> --}}
            {{-- <div class="form-group" style="font-size: 14px; line-height: 1.42857143; color: #111; font-family: Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;  padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;"> --}}
</div>

            {{-- <div class="text-center flex d-flex flex-wrap bg-red-100" style="-webkit-text-size-adjust: 100%; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); line-height: 1.42857143; font-size: 16px; color: #111; box-sizing: border-box; margin-right: -15px; margin-left: -15px; margin-top: 15px;"> --}}

            {{-- <i class="fas fa-heart"></i>
            <i class="fas fa-car"></i>
            <i class="fas fa-file"></i>
            <i class="fas fa-bars"></i>
            <i class="bi bi-airplane-engines"></i>
   
            <i class="bi bi-alarm"></i>
            <i class="bi bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i>
            <i class="fa-solid fa-user"></i>   
            <i class="fas fa-cloud"></i> --}}

            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="/registro/transferenciadigital/first" class="tarjeta-a" >
                    <div class="panel_superior verde">


                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Transferencia digital</b>
                        </h4>
                        <p class="text-muted">
                        Iniciá la precarga del <strong>formulario 08</strong> digital
                        </p>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="/tramites-online" class="tarjeta-a amarillo" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Trámites online</b>
                        </h4>
                        <p class="text-muted"><strong>¡Ahorrá tiempo!</strong> Iniciá tu trámite online, conocé los requisitos y <strong>elegí</strong> el <i>día</i> y <i>horario</i> para ser atendido en el registro.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="/informes-online" class="tarjeta-a rosado" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Informes online</b>
                        </h4>
                        <p class="text-muted">Solicitá informes de <b>estado</b> dominio, <b>histórico</b> titularidad o <b>multas</b> e infracciones y recibilo por correo electrónico.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a celeste" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Turnos para consultas o asesoramiento</b>
                        </h4>
                        <p class="text-muted">Exclusivamente para consultas o asesoramiento en un registro seccional.</p>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a amarillopalido" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Firma digital</b>
                        </h4>
                        <p class="text-muted">Registrá tu firma digital en los más de mil registros de propiedad automotor de todo el país.</p>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="/estimador-registro" class="tarjeta-a verdemusgo" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Estimador de costos</b>
                        </h4>
                        <p class="text-muted">Calculá los costos aproximados para la <b>inscripción</b> de un vehículo 0 KM o la <b>transferencia</b> de un vehículo usado.</p>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a borgona" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Subsanación o retiro de trámites</b>
                        </h4>
                        <p class="text-muted">Verificá el estado de tu trámite y comunicate con el Registro para retirarlo o subsanarlo.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a celesteclaro" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Descarga de documentación</b>
                        </h4>
                        <p class="text-muted">Descargá y validá tus documentos.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a violeta" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Mandatarios</b>
                        </h4>
                        <p class="text-muted">Ingreso exclusivo para mandatarios registrados.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a amarilloclaro" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Escribanos</b>
                        </h4>
                        <p class="text-muted">Ingreso exclusivo para escribanos.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta">
                <a href="" class="tarjeta-a marron" >
                    <div class="panel_superior">
                        <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Asociaciones profesionales</b>
                        </h4>
                        <p class="text-muted">Acceso exclusivo para asociados registrados.</p>
                    </div>
                </a>
            </div> --}}
{{-- 
        </div> --}}
{{-- </div> --}}
    {{-- </div> --}}
{{-- </x-guest-layout> --}}


   </body>
</html>