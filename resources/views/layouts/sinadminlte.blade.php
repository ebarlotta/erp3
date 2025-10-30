<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>@yield('title', 'AdminLTE 3')</title> --}}
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    
    @stack('css')
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar principal -->
        {{-- @include('adminlte::partials.navbar.master-navbar') --}}
        
        <!-- Contenido principal -->
        <div class="content-wrapper">
            <!-- Contenido -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        
        <!-- Footer -->
        @include('adminlte::partials.footer.footer')
    </div>

    <!-- Scripts de AdminLTE -->
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
</body>
</html>