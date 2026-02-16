<!DOCTYPE HTML>
<html>
	<head>
		<title>EcoSystems</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/home/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="/home/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="/" class="logo"><strong>EcoSystems</strong> <span></span></a>
						<nav class="col-1 align-content-end">
                            @if(auth()->check())
							    <a href="{{ route('empresas') }}">Ingresar</a>
                            @else
							    <a href="{{ route('login') }}">Ingresar</a>
                            @endif
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
							<li><a href="{{ route('register') }}">REGISTRARSE</a></li>
						</ul>
						<ul class="actions stacked">
							<li><a href="{{ route('login') }}" class="button primary fit">Comenzar</a></li>
							<li><a href="{{ route('login') }}" class="button fit">Ingresar</a></li>
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
									<li><a href="{{ route('register') }}" class="button next scrolly" style="border-radius: 5px;">Comenzar</a></li>
								</ul>
							</div>
							<div style="justify-content:center; text-align:center; display: flex">
								<h1>
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
                            {{-- <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li> --}}
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
