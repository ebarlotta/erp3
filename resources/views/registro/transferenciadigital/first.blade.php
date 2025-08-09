<main role="main">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class="container">
            <h1 class="titulo1">Transferencia Digital</h1>
            
            <div class="col-lg-12">
                <label>Podés iniciar tu trámite de transferencia de manera digital. Completá los datos y presentate en el Registro con el número de precarga que te enviaremos por correo electrónico.¡Ahorrá tiempo!</label>
            
                <h3 class="titulo1">Aclaración importante:</h3>
                <label>Esta operatoria permite iniciar una transferencia entre personas humanas o jurídicas, cuando:</label>
                <label>1-Todas las partes concurran al registro seccional de radicación del comprador o del vendedor y certifiquen su firma allí.</label>
                <label>2-Se cuente con un formulario 08 en formato papel con la firma certificada con anterioridad de sólo una de las partes</label>
                <button type="button" class="btn btn-primary boton">Siguiente</button>
            </div>
        </div>



    <div class="row content margin-top ng-hide" ng-show="homeCtrl.MostrarRequisitos">
        <!--INFORME WEB-->
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-default panel-icon panel-success" href="#">
                <div class="panel-heading bg-success">
                    <i class="fa fa-exclamation icono-4x text-gray"></i>
                </div>
                <div class="panel-body">
                    <h2>Aclaraciones</h2>
                    <p class="text-muted">Conoce más sobre este trámite</p>
                    <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.aclaraciones()">Ver</button>
                </div>
            </div>
        </div>
        <!--RETIRAR DOCUMENTACION-->
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-default panel-icon panel-info" href="#">
                <div class="panel-heading bg-success">
                    <i class="icono-arg-solidaridad icono-4x text-gray"></i>
                </div>
                <div class="panel-body">
                    <h2>Iniciar o Continuar una Precarga</h2>
                    <p class="text-muted">Podés iniciar la carga del formulario 08 Digital o continuar completando los datos del comprador</p>
                    <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.siguiente()">Iniciar o Continuar</button>
                </div>
            </div>
        </div>
        <!--TURNO-->
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-default panel-icon panel-info" href="#">
                <div class="panel-heading bg-success">
                    <i class="fa fa-history icono-4x text-gray"></i>
                </div>
                <div class="panel-body">
                    <h2>Recuperar Nro Precarga</h2>
                    <p class="text-muted">Si perdiste el nro de precarga, lo podés recuperar ingresando datos del automotor que querés transferir</p>
                    <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.recuperar()">Recuperar Última Precarga</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row center-block">
        <div class="row content margin-top ng-hide" ng-show="homeCtrl.MostrarRequisitos1">
            <!--INFORME WEB-->
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-icon panel-info" href="#">
                    <div class="panel-heading bg-warning">
                        <i class="icono-arg-arma-imp icono-4x text-gray"></i>
                    </div>
                    <div class="panel-body">
                        <h2>Datos del Vendedor</h2>
                        <p class="text-muted">Completá los datos solicitados de la parte vendedora</p>
                        <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.vendedores()">Iniciar</button>
                    </div>
                </div>
            </div>
            <!--RETIRAR DOCUMENTACION-->
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-icon panel-info" href="#">
                    <div class="panel-heading bg-warning">
                        <i class="fa fa-user icono-4x text-gray"></i>
                    </div>
                    <div class="panel-body">
                        <h2>Datos del Comprador</h2>
                        <p class="text-muted">Completá los datos solicitados de la parte compradora ingresando el nro de precarga que te facilitó el vendedor</p>
                        <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.compradores()">Iniciar</button>
                    </div>
                </div>
            </div>
            <!--TURNO-->
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-icon panel-info" href="#">
                    <div class="panel-heading bg-warning">
                        <i class="fa fa-users icono-4x text-gray"></i>
                    </div>
                    <div class="panel-body">
                        <h2>Completar datos de ambas partes</h2>
                        <p class="text-muted">Completá los datos solicitados de las partes vendedora y compradora en un mismo paso</p>
                        <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.SeleccionarPartes()">Iniciar</button>
                    </div>
                </div>
            </div>
            <!--TURNO CON PRENDA-->
            <!--<div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-icon panel-info" href="#">
                    <div class="panel-heading bg-warning">
                        <i class="fa fa-users icono-4x text-gray"></i>
                        <i class="fa fa-plus  text-gray"></i>
                        <i class="fa fa-car icono-4x text-gray"></i>
                    </div>
                    <div class="panel-body">
                        <h2>Completar datos de ambas partes con prenda</h2>
                        <p class="text-muted">Completá los datos solicitados de las partes vendedora y compradora (con prenda) en un mismo paso</p>
                        <button class="btn btn-default btn-block margin-top-s" type="button" ng-click="homeCtrl.SeleccionarPartesConPrenda()">Iniciar</button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div></div>
            <div class="no-print g-recaptcha" data-sitekey="6Ld5ZjUUAAAAAJ7zlNNbYOQ9REJyT9LeFH13N-We" data-callback="onSubmit" data-size="invisible"><div class="grecaptcha-badge" data-style="bottomright" style="width: 256px; height: 60px; display: block; transition: right 0.3s; position: fixed; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px; border-radius: 2px; overflow: hidden;"><div class="grecaptcha-logo"><iframe title="reCAPTCHA" width="256" height="60" role="presentation" name="a-gusmv6cs5a05" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ld5ZjUUAAAAAJ7zlNNbYOQ9REJyT9LeFH13N-We&amp;co=aHR0cHM6Ly93d3cyLmp1cy5nb3YuYXI6NDQz&amp;hl=es-419&amp;v=07cvpCr3Xe3g2ttJNUkC6W0J&amp;size=invisible&amp;anchor-ms=20000&amp;execute-ms=15000&amp;cb=v8jrjgqbwv0m"></iframe></div><div class="grecaptcha-error"></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
        </div>
    </main>