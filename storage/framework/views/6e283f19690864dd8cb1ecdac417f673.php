<!DOCTYPE HTML>
<html>
	<head>
		<title>Presentismo - Control de Asistencia | EcoSystems</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo e(asset('home/assets/css/main.css')); ?>" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
		<noscript><link rel="stylesheet" href="<?php echo e(asset('home/assets/css/noscript.css')); ?>" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="/" class="logo"><strong>EcoSystems</strong> <span>Pres</span></a>
						<nav class="col-1 align-content-end">
                            <?php if(auth()->check()): ?>
							    <a href="<?php echo e(route('empresas')); ?>">Mi Panel</a>
                            <?php else: ?>
							    <a href="<?php echo e(route('login')); ?>">Ingresar</a>
							    <a href="<?php echo e(route('register')); ?>">Registrarse</a>
                            <?php endif; ?>
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
							<li><a href="<?php echo e(route('register')); ?>" class="button primary fit">Solicitar Demo</a></li>
							<li><a href="<?php echo e(route('login')); ?>" class="button fit">Ingresar</a></li>
						</ul>
					</nav>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>Control de Asistencia y Gestión de Personal</h1>
							</header>
							<div class="content">
								<p>Modernice el registro de entrada y salida de su equipo de trabajo con un sistema preciso, flexible y adaptado a las necesidades de su empresa.</p>
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
									<span class="image"><img src="<?php echo e(asset('home/images/pic01.jpg')); ?>" alt="Marcación" /></span>
									<header class="major">
										 <h3><i class="fas fa-fingerprint" style="color: #32aa9c; margin-right: 8px;"></i> Marcación Flexible</h3>
										 <p>Registre la asistencia mediante lectores biométricos, tarjetas QR o desde la aplicación móvil con geolocalización.</p>
									</header>
							  </article>
							  <article>
									<span class="image"><img src="<?php echo e(asset('home/images/pic02.jpg')); ?>" alt="Reportes" /></span>
									<header class="major">
										 <h3><i class="fas fa-clock" style="color: #32aa9c; margin-right: 8px;"></i> Control de Horas Extras</h3>
										 <p>Cálculo automático de horas trabajadas, tardanzas, ausencias y horas extras, listo para la liquidación de sueldos.</p>
									</header>
							  </article>
							  <article>
									<span class="image"><img src="<?php echo e(asset('home/images/pic03.jpg')); ?>" alt="Turnos" /></span>
									<header class="major">
										 <h3><i class="fas fa-calendar-alt" style="color: #32aa9c; margin-right: 8px;"></i> Gestión de Turnos</h3>
										 <p>Asignación y rotación de turnos para diferentes áreas, con notificaciones automáticas a los empleados.</p>
									</header>
							  </article>
                                <!-- Geolocalización -->
								<article>
									<span class="image"><img src="<?php echo e(asset('home/images/pic04.jpg')); ?>" alt="Geolocalización" /></span>
									<header class="major">
										<h3><i class="fas fa-map-marker-alt" style="color: #32aa9c; margin-right: 8px;"></i> Geolocalización</h3>
										<p>Verificación de ubicación GPS para personal en terreno, con validación de radio de acción y registro de rutas.</p>
									</header>
								</article>

								<!-- Integración con RRHH -->
								<article>
									<span class="image"><img src="<?php echo e(asset('home/images/pic05.jpg')); ?>" alt="RRHH" /></span>
									<header class="major">
										<h3><i class="fas fa-users-cog" style="color: #32aa9c; margin-right: 8px;"></i> Integración con RRHH</h3>
										<p>Exportación directa de novedades a sistemas de liquidación de sueldos, con cálculo de presentismos, licencias y ausencias.</p>
									</header>
								</article>

								<!-- Reportes de Asistencia -->
								<article>
									<span class="image"><img src="<?php echo e(asset('home/images/pic06.jpg')); ?>" alt="Reportes" /></span>
									<header class="major">
										<h3><i class="fas fa-file-csv" style="color: #32aa9c; margin-right: 8px;"></i> Reportes de Asistencia</h3>
										<p>Generación de informes personalizados por empleado, sector o período, con exportación a Excel y PDF para auditorías.</p>
									</header>
								</article>
							</section>

						<!-- Two: Beneficios y Propuesta de Valor -->
							<section id="benefits">
                                <div class="inner">
                                    <header class="major">
													<h2>¿Por qué elegir nuestro sistema de Presentismo?</h2>
                                    </header>
												<p>Olvídese de los relojes registradores obsoletos y las planillas manuales propensas a errores. Nuestro sistema previene fraudes de marcación, simplifica la tarea del departamento de RRHH y se integra directamente con el módulo de liquidación de sueldos.</p>
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
                            <form method="POST" action="<?php echo e(route('contact.send')); ?>">
                                <?php echo csrf_field(); ?>
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
                            <li>&copy; <?php echo e(date('Y')); ?> EcoSystems</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </footer>
			</div>

		<!-- Scripts -->
			<script src="<?php echo e(asset('home/assets/js/jquery.min.js')); ?>"></script>
			<script src="<?php echo e(asset('home/assets/js/jquery.scrolly.min.js')); ?>"></script>
			<script src="<?php echo e(asset('home/assets/js/jquery.scrollex.min.js')); ?>"></script>
			<script src="<?php echo e(asset('home/assets/js/browser.min.js')); ?>"></script>
			<script src="<?php echo e(asset('home/assets/js/breakpoints.min.js')); ?>"></script>
			<script src="<?php echo e(asset('home/assets/js/util.js')); ?>"></script>
			<script src="<?php echo e(asset('home/assets/js/main.js')); ?>"></script>

	</body>
</html><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/welcome/pres.blade.php ENDPATH**/ ?>