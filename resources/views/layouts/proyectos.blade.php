<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

    <title>@yield('title', 'Dashboard')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background-color: #0f172a; }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #1e293b; }
        ::-webkit-scrollbar-thumb { background: #475569; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #64748b; }

        /* Card hover effect */
        .project-card { transition: all 0.2s ease; }
        .project-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px -5px rgba(0,0,0,0.3); }

        /* Focus widget glow */
        .focus-glow { box-shadow: 0 0 40px rgba(59, 130, 246, 0.15); }

        /* Timer pulse */
        @keyframes pulse-green { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
        .timer-active { animation: pulse-green 2s ease-in-out infinite; }

        /* Sidebar active */
        .sidebar-item.active { background: linear-gradient(90deg, #3b82f6 0%, transparent 100%); border-left: 3px solid #60a5fa; }

        /* Transición suave para el menú lateral */
        .sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
        }
        .sidebar.open {
            transform: translateX(0);
        }
        /* Overlay oscuro cuando el menú está abierto */
        .overlay {
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            pointer-events: none;
        }
        .overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

    @livewireStyles
    @stack('styles')
</head>
<body class="bg-slate-900">
    <!-- CSRF Token (importante para Livewire) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <main>
        @yield('content')
    </main>

    <!-- Scripts necesarios -->
    @livewireScripts
    
    <!-- Alpine.js (opcional pero recomendado para Livewire) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
</body>
</html>