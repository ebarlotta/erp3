<!DOCTYPE HTML>
<html>
	<head>
		<title>Almacenes - Gestión de Producción | EcoSystems</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('home/assets/css/main.css') }}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
		<noscript><link rel="stylesheet" href="{{ asset('home/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="/" class="logo"><strong>EcoSystems</strong> <span>Almacenes</span></a>
						<nav class="col-1 align-content-end">
                            @if(auth()->check())
							    <a href="{{ route('empresas') }}">Mi Panel</a>
                            @else
							    <a href="{{ route('login') }}">Ingresar</a>
							    <a href="{{ route('register') }}">Registrarse</a>
                            @endif
							<a href="#menu">Menú</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="/">Volver al Home</a></li>
							<li><a href="#features">Características</a></li>
							<li><a href="#benefits">Beneficios</a></li>
							<li><a href="#contact">Contacto</a></li>
						</ul>
						<ul class="actions stacked">
							<li><a href="{{ route('register') }}" class="button primary fit">Solicitar Demo</a></li>
							<li><a href="{{ route('login') }}" class="button fit">Ingresar</a></li>
						</ul>
					</nav>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>Gestión de Materias Primas y Procesos Productivos</h1>
							</header>
							<div class="content">
								<p>Controle cada etapa de la transformaci&oacute;n de sus materias primas en productos terminados, optimizando recursos y minimizando mermas.</p>
								<ul class="actions">
									<li><a href="#features" class="button next scrolly" style="border-radius: 5px;">Ver Características</a></li>
                                    <li><a href="#contact" class="button primary" style="border-radius: 5px;">Hablar con un Asesor</a></li>
								</ul>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- One: Características del ERP (Usando el estilo 'tiles' original) -->
							<section id="features" class="tiles">
								<article>
									<span class="image"><img src="{{ asset('home/images/pic01.jpg') }}" alt="Insumos" /></span>
									<header class="major">
										 <h3><i class="fas fa-flask" style="color: #32aa9c; margin-right: 8px;"></i> Control de Insumos y Fórmulas</h3>
										 <p>Defina recetas de producción y controle el consumo exacto de materias primas por cada lote fabricado.</p>
									</header>
							  </article>
							  <article>
									<span class="image"><img src="{{ asset('home/images/pic02.jpg') }}" alt="Trazabilidad" /></span>
									<header class="major">
										 <h3><i class="fas fa-barcode" style="color: #32aa9c; margin-right: 8px;"></i> Trazabilidad de Lotes</h3>
										 <p>Seguimiento completo del producto, desde la recepción de la materia prima hasta el despacho del producto terminado.</p>
									</header>
							  </article>
							  <article>
									<span class="image"><img src="{{ asset('home/images/pic03.jpg') }}" alt="Mermas" /></span>
									<header class="major">
										 <h3><i class="fas fa-chart-area" style="color: #32aa9c; margin-right: 8px;"></i> Gestión de Mermas</h3>
										 <p>Registro y análisis de desperdicios en el proceso productivo para identificar ineficiencias y mejorar el rendimiento.</p>
									</header>
							  </article>
								<!-- Control de Calidad -->
								<article>
									<span class="image"><img src="{{ asset('home/images/pic04.jpg') }}" alt="Calidad" /></span>
									<header class="major">
										<h3><i class="fas fa-clipboard-check" style="color: #32aa9c; margin-right: 8px;"></i> Control de Calidad</h3>
										<p>Registro de análisis de laboratorio, controles de pH, densidad y otros parámetros críticos por lote de producción.</p>
									</header>
								</article>

								<!-- Planificación de Producción -->
								<article>
									<span class="image"><img src="{{ asset('home/images/pic05.jpg') }}" alt="Planificación" /></span>
									<header class="major">
										<h3><i class="fas fa-calendar-check" style="color: #32aa9c; margin-right: 8px;"></i> Planificación de Producción</h3>
										<p>Programación de órdenes de fabricación, asignación de recursos y seguimiento del avance de cada etapa productiva.</p>
									</header>
								</article>

								<!-- Costos de Producción -->
								<article>
									<span class="image"><img src="{{ asset('home/images/pic06.jpg') }}" alt="Costos" /></span>
									<header class="major">
										<h3><i class="fas fa-dollar-sign" style="color: #32aa9c; margin-right: 8px;"></i> Costos de Producción</h3>
										<p>Cálculo automático del costo real por unidad producida, incluyendo materias primas, mano de obra y gastos indirectos.</p>
									</header>
								</article>
							</section>

						<!-- Two: Beneficios y Propuesta de Valor -->
							<section id="benefits">
                                <div class="inner">
                                    <header class="major">
													<h2>¿Por qué elegir el módulo de Bodegas de EcoSystems?</h2>
                                    </header>
												<p>Diseñado para la industria manufacturera y alimenticia. Obtenga visibilidad total de su cadena de producción, garantice la calidad de sus productos terminados y tome decisiones basadas en costos reales de producción.</p>
                                    <ul class="actions">
                                        <li><a href="#contact" class="button next scrolly" style="border-radius: 5px;">Solicitar una Demostración Gratuita</a></li>
                                    </ul>
                                </div>
                            </section>

					</div>

				<!-- Contact -->
                <section id="contact">
                    <div class="inner">
                        <section>
                            <header class="major">
                                <h2>¿Listo para optimizar tu empresa?</h2>
                                <p>Déjanos tus datos y un especialista te contactará a la brevedad.</p>
                            </header>
                            <form method="POST" action="{{ route('contact.send') }}">
                                @csrf
                                <!-- Campo oculto para que sepas de qué producto viene el lead -->
                                <input type="hidden" name="producto_interes" value="ERP">
                                
                                <div class="fields">
                                    <div class="field half">
                                        <label for="name">Nombre Completo</label>
                                        <input type="text" name="name" id="name" style="border-radius: 5px;" required />
                                    </div>
                                    <div class="field half">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" name="email" id="email" style="border-radius: 5px;" required />
                                    </div>
                                    <div class="field half">
                                        <label for="company">Nombre de la Empresa</label>
                                        <input type="text" name="company" id="company" style="border-radius: 5px;" />
                                    </div>
                                    <div class="field half">
                                        <label for="phone">Teléfono / WhatsApp</label>
                                        <input type="text" name="phone" id="phone" style="border-radius: 5px;" />
                                    </div>
                                    <div class="field">
                                        <label for="message">Mensaje o Consulta Específica</label>
                                        <textarea name="message" id="message" rows="6" style="border-radius: 5px;" placeholder="Me interesa conocer los módulos de facturación y stock..."></textarea>
                                    </div>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="Enviar Consulta" class="primary" style="border-radius: 5px;" /></li>
                                    <li><input type="reset" value="Limpiar" style="border-radius: 5px;" /></li>
                                </ul>
                            </form>
                        </section>
                        <section class="split">
                            <section>
                                <div class="contact-method">
                                    <span class="icon solid alt fa-envelope"></span>
                                    <h3>Email</h3>
                                    <a href="mailto:ecosystems.mail@gmail.com">ecosystems.mail@gmail.com</a>
                                </div>
                            </section>
                            <section>
                                <div class="contact-method">
                                    <span class="icon solid alt fa-phone"></span>
                                    <h3>Teléfono</h3>
                                    <span>(+549) 261 747 1502</span><br>
                                    <span>(+549) 263 463 5287</span>
                                </div>
                            </section>
                            <section>
                                <div class="contact-method">
                                    <span class="icon solid alt fa-home"></span>
                                    <h3>Dirección</h3>
                                    <span>Mendoza<br />Argentina</span>
                                </div>
                            </section>
                        </section>
                    </div>
                </section>

				<!-- Footer -->
                <footer id="footer">
                    <div class="inner">
                        <ul class="icons">							
                            <li><a href="https://x.com/ecosystems_ar" class="icon brands alt fab fa-x"><span class="label">X (ex Twitter)</span></a></li>
                            <li><a href="https://www.tiktok.com/@ecosystems.ar" class="icon brands alt fa-tiktok"><span class="label">TikTok</span></a></li>
                            <li><a href="https://www.facebook.com/people/Ecosystemsar/61588336885375/" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                            <li><a href="https://www.instagram.com/ecosystems.mail" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                            <li><a href="https://www.linkedin.com/company/ecosystems-ar/" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                        </ul>
                        <ul class="copyright">
                            <li>&copy; {{ date('Y') }} EcoSystems</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </footer>
			</div>

		<!-- Scripts -->
			<script src="{{ asset('home/assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('home/assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('home/assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('home/assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('home/assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('home/assets/js/util.js') }}"></script>
			<script src="{{ asset('home/assets/js/main.js') }}"></script>

	</body>
</html>