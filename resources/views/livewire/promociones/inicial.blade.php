<div>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PromoMax - Aprovecha las Mejores Promociones</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            :root {
                --primary: #2575fc;
                --secondary: #2ec4b6;
                --terceary: #d4926e;
                --dark: #2d3047;
                --light: #f8f9fa;
            }

            body {
                font-family: 'Segoe UI', system-ui, sans-serif;
            }

            .hero-section {
                background: linear-gradient(135deg, var(--primary) 0%, #ff8e53 100%);
                color: white;
                padding: 100px 0;
            }

            .promo-card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
                margin-bottom: 30px;
            }

            .promo-card:hover {
                transform: translateY(-5px);
            }

            .discount-badge {
                background: var(--primary);
                color: white;
                padding: 10px 20px;
                border-radius: 25px;
                font-weight: bold;
                position: absolute;
                top: -15px;
                right: 20px;
            }

            .category-icon {
                font-size: 5.5rem;
                color: var(--primary);
                margin-bottom: 15px;
            }

            .category-icon:hover {
                font-size: 4.5rem;
                color: var(--terceary);
                margin-bottom: 15px;
            }
            .resaltar:hover {
                padding-top: 10px;
                border: black solid 1px;
                transition: border-color 3s ease;
            }
            .newsletter-section {
                background: var(--dark);
                color: white;
                padding: 80px 0;
            }

            .btn-primary {
                background: var(--primary);
                border: none;
                padding: 12px 30px;
                border-radius: 25px;
            }

            .btn-primary:hover {
                background: #e55a2b;
            }

            .feature-icon {
                font-size: 3rem;
                color: var(--secondary);
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#" style="color: var(--primary);">
                    <i class="fas fa-tags me-2"></i>PromoMax {{ $rubro }}
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#ofertas">Ofertas</a>
                    <a class="nav-link" href="#categorias">Categorías</a>
                    <a class="nav-link" href="#app">App Móvil</a>
                    <a class="btn btn-primary ms-3" href="#newsletter">Comenzar</a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-secundary ms-3">Logout 3</button>
                        </form>
                    @else
                        <a class="btn btn-secundary ms-3" href="{{ route('login') }}">Login / Registro</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section text-center">
            <div class="container">
                <h1 class="display-4 fw-bold mb-4">Aprovecha Promociones Exclusivas</h1>
                <p class="lead mb-4">Descubre cupones de descuento, ofertas especiales y promociones que realmente funcionan</p>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="¿Qué estás buscando? Ej: Restaurantes, Ropa, Tecnología...">
                            <button class="btn btn-light btn-lg" type="button">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">15,000+</h3>
                        <p>Cupones Activos</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">2,500+</h3>
                        <p>Tiendas Asociadas</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">500K+</h3>
                        <p>Usuarios Satisfechos</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">$10M+</h3>
                        <p>En Ahorros Generados</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Promotions -->
        <section id="ofertas" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Ofertas Destacadas del Día</h2>
                <div class="row">
                    <!-- Promo 1 -->
                    <div class="col-md-4">
                        <div class="card promo-card">
                            <span class="discount-badge">-50%</span>
                            <img src="https://via.placeholder.com/300x200/ff6b35/ffffff?text=Restaurante" class="card-img-top" alt="Oferta Restaurante">
                            <div class="card-body">
                                <h5 class="card-title">Cena para 2 personas</h5>
                                <p class="text-muted">Restaurante La Buena Mesa</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-danger"><del>$120.000</del></span>
                                    <span class="fw-bold fs-5">$60.000</span>
                                </div>
                                <button class="btn btn-primary w-100 mt-3">
                                    <i class="fas fa-ticket-alt me-2"></i>Obtener Cupón
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Promo 2 -->
                    <div class="col-md-4">
                        <div class="card promo-card">
                            <span class="discount-badge">-30%</span>
                            <img src="https://via.placeholder.com/300x200/2ec4b6/ffffff?text=Electrónica" class="card-img-top" alt="Oferta Electrónica">
                            <div class="card-body">
                                <h5 class="card-title">Smartphone Galaxy S23</h5>
                                <p class="text-muted">TecnoShop</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-danger"><del>$2.500.000</del></span>
                                    <span class="fw-bold fs-5">$1.750.000</span>
                                </div>
                                <button class="btn btn-primary w-100 mt-3">
                                    <i class="fas fa-ticket-alt me-2"></i>Obtener Cupón
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Promo 3 -->
                    <div class="col-md-4">
                        <div class="card promo-card">
                            <span class="discount-badge">-25%</span>
                            <img src="https://via.placeholder.com/300x200/ff9e00/ffffff?text=Moda" class="card-img-top" alt="Oferta Ropa">
                            <div class="card-body">
                                <h5 class="card-title">Todo el almacén</h5>
                                <p class="text-muted">Fashion Store</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-danger"><del>$200.000</del></span>
                                    <span class="fw-bold fs-5">$150.000</span>
                                </div>
                                <button class="btn btn-primary w-100 mt-3">
                                    <i class="fas fa-ticket-alt me-2"></i>Obtener Cupón
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section id="categorias" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Explora por Categorías</h2>
                <div class="row text-center">
                    <div class="col-md-2 mb-4 resaltar">
                        <a href="{{ route('buscar_promociones', ['rubro' => 'Restaurantes']) }}">
                            <div class="category-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h6>Restaurantes</h6>
                        </a>
                    </div>
                    <div class="col-md-2 mb-4 resaltar">
                        <a href="{{ route('buscar_promociones', ['rubro' => 'moda']) }}">
                            <div class="category-icon">
                                <i class="fas fa-tshirt"></i>
                            </div>
                            <h6>Moda</h6>
                        </a>
                    </div>
                    <div class="col-md-2 mb-4 resaltar">
                        <a href="{{ route('buscar_promociones', ['rubro' => 'Tecnología']) }}">
                            <div class="category-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <h6>Tecnología</h6>
                        </a>
                    </div>
                    <div class="col-md-2 mb-4 resaltar">
                        <a href="{{ route('buscar_promociones', ['rubro' => 'Belleza']) }}">
                            <div class="category-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h6>Belleza</h6>
                        </a>
                    </div>
                    <div class="col-md-2 mb-4 resaltar">
                        <a href="{{ route('buscar_promociones', ['rubro' => 'Hogar']) }}">
                            <div class="category-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <h6>Hogar</h6>
                        </a>
                    </div>
                    <div class="col-md-2 mb-4 resaltar">
                        <a href="{{ route('buscar_promociones', ['rubro' => 'Automóviles']) }}">
                            <div class="category-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <h6>Automóviles</h6>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- App Section -->
        <section id="app" class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Descarga Nuestra App</h2>
                        <p class="lead">Lleva las mejores promociones contigo a donde vayas.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Notificaciones de ofertas flash</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Cupones disponibles offline</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Geolocalización de promociones cercanas</li>
                        </ul>
                        <div class="mt-4">
                            <button class="btn btn-dark me-3">
                                <i class="fab fa-apple me-2"></i>App Store
                            </button>
                            <button class="btn btn-dark">
                                <i class="fab fa-google-play me-2"></i>Google Play
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="https://via.placeholder.com/300x600/e9ecef/2d3047?text=App+Preview" alt="App Preview" class="img-fluid" style="max-height: 500px;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section id="newsletter" class="newsletter-section">
            <div class="container text-center">
                <h2 class="mb-4">¡No Te Pierdas Ninguna Oferta!</h2>
                <p class="lead mb-4">Recibe las mejores promociones directamente en tu email</p>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg" placeholder="tu.email@ejemplo.com">
                            <button class="btn btn-primary btn-lg" type="button">Suscribirme</button>
                        </div>
                        <small class="text-muted mt-2">Podrás cancelar la suscripción en cualquier momento</small>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-dark text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5><i class="fas fa-tags me-2"></i>PromoMax</h5>
                        <p>Encuentra las mejores promociones y ahorra en tus compras.</p>
                    </div>
                    <div class="col-md-3">
                        <h6>Enlaces</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white-50">Inicio</a></li>
                            <li><a href="#" class="text-white-50">Ofertas</a></li>
                            <li><a href="#" class="text-white-50">App Móvil</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6>Contacto</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-envelope me-2"></i> info@promomax.com</li>
                            <li><i class="fas fa-phone me-2"></i> +1 234 567 890</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <small>&copy; 2024 PromoMax. Todos los derechos reservados.</small>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</div>
