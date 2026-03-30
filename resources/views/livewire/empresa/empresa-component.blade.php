<div>
    <div class="content-center">
        <div class="flex-wrap bg-white p-2 text-center rounded-lg shadow-lg w-full flex justify-center">
            @if ($empresas)
                @foreach ($empresas as $empresa)
                    <div wire:click="cargamodulos({{ $empresa['id'] ? $empresa['id'] : 0 }})" class="bg-gray-200 p-2 text-center rounded-lg w-auto m-4 justify-center px-3 feature-card" style="box-shadow: 10px 10px 10px rgb(63, 62, 62);cursor: pointer;">
                        <div wire:click="configurarempresa({{ $empresa['id'] }})" class="flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <p class="relative -bottom-1 left-0 mx-2">
                            {{ $empresa['name'] }}
                            <img class="rounded-md" src="{{ asset('/' . $empresa['imagen']) }}" style="margin: auto; margin-top: 10px; width: 150px; height: 150px;">
                        </p>
                    </div>
                @endforeach
            @else
                <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1">
                    <p class="relative -bottom-11 left-0">
                        No hay empresas relacionadas con este usuario.
                    </p>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <button style="background-color: indianred; width:100%;">
                                {{ __('Log Out') }}
                            </button>
                        </a>
                    </form>
                </div>
            @endif

            {{-- <div class="chart-container" style="position: relative;"> --}}
            {{-- <div style="width: 80%; margin: auto; height:300px; width:40%">
                <canvas id="compras"></canvas>
            </div>
            <div style="width: 80%; margin: auto; height:40vh; width:40%">
                <canvas id="ventas"></canvas>
            </div> --}}
            {{-- </div> --}}

        </div>

    <div class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="background-container">
            <img class="background-image" src="{{ asset('images/fondo.jpeg') }}" alt="Fondo">
        </div>

        <section class="hero mt-4" style="justify-content: center;">
            <div class="flex d-flex">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/empresas') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            > Dashboard </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" style="width: max-content;"> {{ __('Login') }}                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" style="width: max-content;"> {{ __('Register') }}
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
                <nav>
                    {{-- @include('menubar') --}}
            <style>
                :root {
                --primary: #2563eb;
                --secondary: #1e40af;
                --text: #1f2937;
                --bg: #f9fafb;
                --card-bg: #ffffff;
                --nav-bg: rgba(255, 255, 255, 0.95);
                --footer-bg: #1f2937;
                --footer-text: #f9fafb;
                }

                .dark-mode {
                    --primary: #3b82f6;
                    --secondary: #1d4ed8;
                    --text: #e5e7eb;
                    --bg: #111827;
                    --card-bg: #1f2937;
                    --nav-bg: rgba(31, 41, 55, 0.95);
                    --footer-bg: #030712;
                    --footer-text: #f9fafb;
                }

                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: var(--bg);
                    color: var(--text);
                    transition: all 0.3s ease;
                }

                /* Header */
                header {
                    background-color: var(--nav-bg);
                    backdrop-filter: blur(10px);
                    position: fixed;
                    width: 100%;
                    top: 0;
                    z-index: 1000;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }

                nav {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 1.5rem 5%;
                    max-width: 1400px;
                    margin: 0 auto;
                }

                .logo {
                    font-size: 1.8rem;
                    font-weight: 700;
                    color: var(--primary);
                    text-decoration: none;
                }

                .nav-links {
                    display: flex;
                    gap: 2rem;
                }

                .nav-links a {
                    color: white;
                    /* color: var(--text); */
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.3s;
                }

                .nav-links a:hover {
                    color: var(--primary);
                }

                .theme-toggle {
                    background: none;
                    border: none;
                    color: var(--text);
                    font-size: 1.2rem;
                    cursor: pointer;
                }

                /* Hero Section */
                .hero {
                    /* height: 100vh; */
                    display: flex;
                    align-items: center;
                    padding: 0 5%;
                    /* margin-top: -80px; */
                    /* background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); */
                    background: linear-gradient(135deg, #4d6391 0%, var(--secondary) 100%);
                    color: white;
                    border-radius: 10px;
                }

                .hero-content {
                    max-width: 600px;
                }

                .hero h1 {
                    font-size: 3.5rem;
                    margin-bottom: 1rem;
                }

                .hero p {
                    font-size: 2.2rem;
                    margin-bottom: 2rem;
                    line-height: 1.6;
                }

                p {
                    /* font-size: 1.8rem; */
                    margin-bottom: 2rem;
                    line-height: 1.6;
                }
                p1 {
                    font-size: 1.3rem;
                    margin-bottom: 2rem;
                    line-height: 1.6;
                }
                .cta-button {
                    display: inline-block;
                    background-color: white;
                    color: var(--primary);
                    padding: 0.8rem 2rem;
                    border-radius: 50px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s;
                }

                .cta-button:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                }

                /* Features */
                .features {
                    padding: 5rem 5%;
                    max-width: 1400px;
                    margin: 0 auto;
                }

                .section-title {
                    text-align: center;
                    margin-bottom: 3rem;
                }
                .img {
                    background-attachment: fixed;
                    background-size: cover;
                }

                .section-title h2 {
                    font-size: 2.5rem;
                    color: var(--primary);
                    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
                }

                .section-title h3 {
                    font-size: 1.5rem;
                    color: var(--primary);
                    font-style: italic;
                    text-shadow: 2px 2px #d5d5d5;
                    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);

                }

                .features-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                    gap: 2rem;
                }

                .feature-card {
                    background-color: var(--card-bg);
                    border-radius: 10px;
                    padding: 2rem;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                    transition: transform 0.3s;
                    box-shadow: 10px 10px 10px #888;
                    border: 2px solid lightskyblue;
                }

                .feature-card:hover {
                    /* transform: translateY(-4px); */
                    background: #88be83;
                    /* background-color: linear-gradient(90deg,rgb(68, 119, 132) 1%, rgb(87, 144, 112) 21%, rgb(56, 80, 127) 97%); */
                    /* background-color: linear-gradient(90deg,rgba(222, 246, 252, 1) 1%, rgba(186, 230, 205, 1) 21%, rgba(133, 168, 237, 1) 97%); */
                    -webkit-transition: background-color 1000ms linear;
                    -ms-transition: background-color 1000ms linear;
                    -moz-transition: background-color 1000ms linear;
                    -o-transition: background-color 1000ms linear;
                    transition: background-color 1000ms linear;

                }

                .feature-icon {
                    font-size: 2.5rem;
                    color: var(--primary);
                    margin-bottom: 1.5rem;
                }

                .background-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
            }

                .background-image {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    opacity: 0.5;
                }

                .content {
                    position: relative;
                    z-index: 1;
                    padding: 20px;
                    /* Estilos adicionales para tu contenido */
                }
                    /* Responsive */
                    @media (max-width: 768px) {
                        .nav-links {
                            display: none;
                        }

                    .hero h1 {
                        font-size: 2.5rem;
                    }

                    .hero p {
                        font-size: 1rem;
                    }

                }


        </style>
    <a href="/empresas" class="logo flex">
        <span class="text-green-500">ECO</span>
        <span style="color: #ba6820; text-shadow: 5px 5px 4px#0307123f">Systems.ar</span>
    </a>
<div class="nav-links" style="margin-left: 40px">
    <a href="#services">Servicios</a>
    <a href="nosotros">Nosotros</a>
    <a href="portfolio">Portafolio</a>
    <a href="contacto">Contacto</a>
</div>
<button class="theme-toggle ml-4" id="themeToggle">
    <i class="fas fa-moon"></i>
</button>';
                </nav>
            </div>
        </section>
        <section>
            <div class="features-grid" style="background-color: rgba(255, 255, 255, 0.5);">
                <div class="feature-card" style="margin-top: 10px; width: 90%; text-align: center; margin: auto; margin-top: auto; margin-top: 14px;">
                <div class="section-title">
                    <h2 style="text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);">Transformamos Ideas en Experiencias Digitales</h2>
                </div>
                <p style="font-size: 18px">Desarrollamos soluciones web innovadoras que impulsan tu negocio en la era digital con tecnología de vanguardia y diseño centrado en el usuario.</p>
                <a href="register" class="cta-button btn btn-success bg-green-300 text-white" style="background-color: #0080009c; box-shadow: 10px 10px 10px #00000084;">Comienza tu Proyecto</a>
            </div>
        </div>
        </section>
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" style="background-color: rgba(255, 255, 255, 0.5);">
            <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full px-6">

                    <!-- Features Section -->
                    <section class="" id="services" style="padding-top: 30px; padding-bottom: 30px;margin: auto; width: 90%;">
                        <div class="section-title">
                            <h2>Nuestros Servicios</h2>
                            <p>Soluciones tecnológicas a medida para cada necesidad</p>
                        </div>
                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Desarrollo Web</h3>
                                </div>
                                <p1>Sitios web personalizados, rápidos y optimizados para SEO con las últimas tecnologías del mercado.</p1>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Diseño Responsivo</h3>
                                </div>
                                <p1>Experiencias perfectas en todos los dispositivos, desde móviles hasta pantallas de escritorio.</p1>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Optimización</h3>
                                </div>
                                <p1>Maximizamos el rendimiento de tu sitio para garantizar la mejor experiencia de usuario.</p1>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script>
            // Modo Nocturno
            const themeToggle = document.getElementById('themeToggle');
            const body = document.body;

            // Verificar preferencia del usuario
            if (localStorage.getItem('darkMode') === 'enabled') {
                body.classList.add('dark-mode');
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            }

            themeToggle.addEventListener('click', () => {
                body.classList.toggle('dark-mode');

                if (body.classList.contains('dark-mode')) {
                    localStorage.setItem('darkMode', 'enabled');
                    themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                } else {
                    localStorage.setItem('darkMode', 'disabled');
                    themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                }
            });

            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>


                    <footer class="py-1 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </div>


    </div>
