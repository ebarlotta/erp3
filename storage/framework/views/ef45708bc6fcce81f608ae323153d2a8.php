<!DOCTYPE HTML>
<html>
	<head>
		<title>EcoSystems</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/home/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="/home/assets/css/noscript.css" /></noscript>
		<!-- Agrega esto en el <head> de tu archivo -->
<style>
	.confeti {
		 position: fixed;
		 top: -10px;
		 width: 10px;
		 height: 10px;
		 background-color: #f00;
		 animation: caer linear forwards;
		 z-index: 9999;
		 pointer-events: none;
	}
	
	@keyframes caer {
		 to {
			  transform: translateY(100vh) rotate(720deg);
		 }
	}
	
	.gracias-container {
		 position: relative;
		 overflow: hidden;
	}
</style>

<!-- Agrega esto antes de cerrar </body> -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		 const graciasDiv = document.querySelector('.gracias-container');
		 if (graciasDiv) {
			  crearConfeti();
		 }
	});
	
	function crearConfeti() {
		 const colores = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff', '#ffa500', '#ff69b4'];
		 
		 for (let i = 0; i < 150; i++) {
			  setTimeout(() => {
					const confeti = document.createElement('div');
					confeti.classList.add('confeti');
					
					// Posición horizontal aleatoria
					confeti.style.left = Math.random() * 100 + 'vw';
					
					// Color aleatorio
					confeti.style.backgroundColor = colores[Math.floor(Math.random() * colores.length)];
					
					// Duración de caída aleatoria (entre 2 y 5 segundos)
					confeti.style.animationDuration = (Math.random() * 3 + 2) + 's';
					
					// Tamaño aleatorio
					const size = Math.random() * 10 + 5;
					confeti.style.width = size + 'px';
					confeti.style.height = size + 'px';
					
					// Forma aleatoria (círculo o cuadrado)
					if (Math.random() > 0.5) {
						 confeti.style.borderRadius = '50%';
					}
					
					document.body.appendChild(confeti);
					
					// Eliminar el confeti después de que cae
					setTimeout(() => {
						 confeti.remove();
					}, 5000);
			  }, i * 50); // Crear un confeti cada 50ms
		 }
	}
</script>
	</head>
	<body class="is-preload">

	<!-- 🔹 AGREGA ESTO: Librería canvas-confetti -->
	<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
	<script>
		// Efecto de confeti cuando se muestra el mensaje de agradecimiento
		document.addEventListener('DOMContentLoaded', function() {
			 // Verificar si el div de agradecimiento existe
			 const graciasDiv = document.querySelector('h1');
			 if (graciasDiv && graciasDiv.textContent.includes('Gracias por contactarse')) {
				  
				  // Lanzar confeti inicial
				  lanzarConfeti();
				  
				  // Lanzar ráfagas adicionales por 3 segundos
				  let duracion = 3 * 1000;
				  let fin = Date.now() + duracion;
				  
				  (function frame() {
						lanzarConfeti();
						if (Date.now() < fin) {
							 requestAnimationFrame(frame);
						}
				  }());
			 }
		});
		
		function lanzarConfeti() {
			 var count = 200;
			 var defaults = {
				  origin: { y: 0.7 }
			 };
			 
			 function fire(particleRatio, opts) {
				  confetti(Object.assign({}, defaults, opts, {
						particleCount: Math.floor(count * particleRatio)
				  }));
			 }
			 
			 fire(0.25, {
				  spread: 26,
				  startVelocity: 55,
			 });
			 fire(0.2, {
				  spread: 60,
			 });
			 fire(0.35, {
				  spread: 100,
				  decay: 0.91,
				  scalar: 0.8
			 });
			 fire(0.1, {
				  spread: 120,
				  startVelocity: 25,
				  decay: 0.92,
				  scalar: 1.2
			 });
			 fire(0.1, {
				  spread: 120,
				  startVelocity: 45,
			 });
		}
	</script>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="/" class="logo"><strong>EcoSystems</strong> <span></span></a>
						<nav class="col-1 align-content-end">
                            <?php if(auth()->check()): ?>
							    <a href="<?php echo e(route('empresas')); ?>">Ingresar</a>
                            <?php else: ?>
							    <a href="<?php echo e(route('login')); ?>">Ingresar</a>
                            <?php endif; ?>
							<a href="#menu">Menú</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="/">Home</a></li>
							<li><a href="/home/landing.html">Landing</a></li>
							<li><a href="/home/generic.html">Generic</a></li>
							<li><a href="/home/elements.html">Elements</a></li>
							<li><a href="<?php echo e(route('register')); ?>">REGISTRARSE</a></li>
						</ul>
						<ul class="actions stacked">
							<li><a href="<?php echo e(route('login')); ?>" class="button primary fit">Comenzar</a></li>
							<li><a href="<?php echo e(route('login')); ?>" class="button fit">Ingresar</a></li>
						</ul>
					</nav>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>Hola, bienvenido a EcoSystems</h1>
							</header>
							<div class="content">
								<p>Un sitio en el que podrá organizar<br />
									todas sus proyectos.</p>
								<ul class="actions">
									<li><a href="<?php echo e(route('register')); ?>" class="button next scrolly" style="border-radius: 5px;">Comenzar</a></li>
								</ul>
							</div>
							<div style="justify-content:center; text-align:center; display: flex" class="gracias-container">
								<h1 class="gracias-mensaje">
								Gracias por contactarse con nosotros.<br>
								Nos pondremos en contacto a la brevedad!!!
								</h1>
							</div>
						</div>
					</section>

				<!-- Footer -->
                <footer id="footer">
                    <div class="inner">
                        <ul class="icons">							
                            <li>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">   
								<a href="https://x.com/ecosystems_ar" class="icon brands alt fab fa-x"><span class="label">X ( ex Twitter )</span></a>
							</li>
                            <li><a href="https://www.tiktok.com/@ecosystems.ar" class="icon brands alt fa-tiktok"><span class="label">TikTok</span></a></li>
                            <li><a href="https://www.facebook.com/people/Ecosystemsar/61588336885375/?rdid=fZybKpOohoXnebB3&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F18J9AvGAcv%2F" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                            <li><a href="https://www.instagram.com/ecosystems.mail" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                            
                            <li><a href="https://www.linkedin.com/company/ecosystems-ar/" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                        </ul>
                        <ul class="copyright">
                            <li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </footer>
			</div>

		<!-- Scripts -->
			<script src="/home/assets/js/jquery.min.js"></script>
			<script src="/home/assets/js/jquery.scrolly.min.js"></script>
			<script src="/home/assets/js/jquery.scrollex.min.js"></script>
			<script src="/home/assets/js/browser.min.js"></script>
			<script src="/home/assets/js/breakpoints.min.js"></script>
			<script src="/home/assets/js/util.js"></script>
			<script src="/home/assets/js/main.js"></script>

	</body>
</html>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/gracias.blade.php ENDPATH**/ ?>