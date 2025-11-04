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

        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link rel="stylesheet" href="{{ asset('css/registro-icono-arg.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        @livewireStyles
    </head>
    <body>
        <div class="justify-center flex d-flex flex-wrap" style="background: #f1eaea; color: #111; height: 100%; padding-top: 10%; padding-bottom: 10%;">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta zoom">
                <a href="/tramites-online" class="tarjeta-a amarillo" >
                    <div class="panel_superior">
                        <i class="icono-arg-digital icono-5x text-gray" style="color: white"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Trámites online</b>
                        </h4>
                        <p class="text-muted"><strong>¡Ahorrá tiempo!</strong> Iniciá tu trámite online, conocé los requisitos y <strong>elegí</strong> el <i>día</i> y <i>horario</i> para ser atendido en el registro.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta zoom">
                <a href="/informes-online" class="tarjeta-a rosado" >
                    <div class="panel_superior">
                        <i class="icono-arg-auto-informe icono-5x text-gray" style="color: white"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Informes online</b>
                        </h4>
                        <p class="text-muted">Solicitá informes de <b>estado</b> dominio, <b>histórico</b> titularidad o <b>multas</b> e infracciones y recibilo por correo electrónico.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta zoom">
                <a href="" class="tarjeta-a celeste" >
                    <div class="panel_superior">
                        <i class="icono-arg-turno icono-5x text-gray" style="color: white"></i>
                    </div>
                    <div class="panel_inferior">
                        <h4 class="titulo_card">
                            <b>Turnos para consultas o asesoramiento</b>
                        </h4>
                        <p class="text-muted">Exclusivamente para consultas o asesoramiento en un registro seccional.</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 tarjeta zoom">
                <a href="/estimador-registro" class="tarjeta-a verdemusgo" >
                    <div class="panel_superior">
                        <i class="icono-arg-firma-digital icono-5x text-gray" style="color: white"></i>
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
   </body>
</html>
