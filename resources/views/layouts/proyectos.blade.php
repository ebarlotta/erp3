  <!DOCTYPE html>
   <html lang="es">
   <head>
      <title>@yield('title', 'Dashboard')</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project Manager - Dashboard</title>
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
      </style>

    @livewireStyles
   </head>
   <body>
    @yield('content')
    @livewireScripts
   </body>
   </html>
