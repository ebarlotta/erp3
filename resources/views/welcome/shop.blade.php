<!DOCTYPE HTML>
<html>
	<head>
		<title>P-Shop - E-commerce y Ventas | EcoSystems</title>
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
						<a href="/" class="logo"><strong>EcoSystems</strong> <span>p-shop</span></a>
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
								<h1>Carrito de Compras y E-commerce Integrado</h1>
							</header>
							<div class="content">
								<p>Potencie sus ventas online con una plataforma de comercio electr&oacute;nico robusta, segura y perfectamente sincronizada con su stock e inventario.</p>
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
									<span class="image"><img src="{{ asset('home/images/pic01.jpg') }}" alt="Catálogo" /></span>
									<header class="major">
										 <h3><i class="fas fa-store" style="color: #32aa9c; margin-right: 8px;"></i> Catálogo Dinámico</h3>
										 <p>Cree y administre sus productos con fotos, variantes (talle, color) y descripciones optimizadas para SEO.</p>
									</header>
							  </article>
							  <article>
									<span class="image"><img src="{{ asset('home/images/pic02.jpg') }}" alt="Pagos" /></span>
									<header class="major">
										 <h3><i class="fas fa-credit-card" style="color: #32aa9c; margin-right: 8px;"></i> Pasarelas de Pago</h3>
										 <p>Integración nativa con Mercado Pago, PayPal, tarjetas de crédito y transferencia bancaria con conciliación automática.</p>
									</header>
							  </article>
							  <article>
									<span class="image"><img src="{{ asset('home/images/pic03.jpg') }}" alt="Stock" /></span>
									<header class="major">
										 <h3><i class="fas fa-sync-alt" style="color: #32aa9c; margin-right: 8px;"></i> Sincronización de Stock</h3>
										 <p>El inventario se actualiza en tiempo real en su tienda online y en su depósito físico, evitando ventas sin stock.</p>
									</header>
							  </article>
                               <!-- Gestión de Envíos -->
								<article>
									<span class="image"><img src="{{ asset('home/images/pic04.jpg') }}" alt="Envíos" /></span>
									<header class="major">
										<h3><i class="fas fa-shipping-fast" style="color: #32aa9c; margin-right: 8px;"></i> Gestión de Envíos</h3>
										<p>Integración con correos y servicios de logística, generación de etiquetas de envío y seguimiento de paquetes en tiempo real.</p>
									</header>
								</article>

								<!-- Marketing y Promociones -->
								<article>
									<span class="image"><img src="{{ asset('home/images/pic05.jpg') }}" alt="Marketing" /></span>
									<header class="major">
										<h3><i class="fas fa-bullhorn" style="color: #32aa9c; margin-right: 8px;"></i> Marketing y Promociones</h3>
										<p>Creación de cupones de descuento, campañas de email marketing y programas de fidelización de clientes integrados.</p>
									</header>
								</article>

								<!-- Atención al Cliente -->
								<article>
									<span class="image"><img src="{{ asset('home/images/pic06.jpg') }}" alt="Atención" /></span>
									<header class="major">
										<h3><i class="fas fa-headset" style="color: #32aa9c; margin-right: 8px;"></i> Atención al Cliente</h3>
										<p>Gestión de consultas, devoluciones y reclamos con ticket de soporte, historial de compras y satisfacción del cliente.</p>
									</header>
								</article>
							</section>

						<!-- Two: Beneficios y Propuesta de Valor -->
							<section id="benefits">
                                <div class="inner">
                                    <header class="major">
													<h2>¿Por qué elegir P-Shop para su negocio?</h2>
                                    </header>
												<p>No necesita ser un experto en tecnología para vender online. P-Shop le brinda una tienda virtual profesional, fácil de administrar y optimizada para convertir visitantes en clientes, todo conectado directamente a su sistema central de gestión.</p>

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