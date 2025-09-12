<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Compra Exitosa!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .congratulations-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            animation: fadeIn 0.6s ease-in-out;
        }
        
        .checkmark {
            width: 80px;
            height: 80px;
            background: #4CAF50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            animation: scaleIn 0.5s ease-in-out;
        }
        
        .checkmark::after {
            content: "✓";
            font-size: 40px;
            color: white;
            font-weight: bold;
        }
        
        h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 2em;
        }
        
        p {
            color: #666;
            margin-bottom: 25px;
            font-size: 1.1em;
            line-height: 1.6;
        }
        
        .order-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #ff0;
            opacity: 0;
            pointer-events: none;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
        
        @media (max-width: 480px) {
            .congratulations-card {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.5em;
            }
            
            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="congratulations-card">
        <div class="checkmark"></div>
        
        <h1>¡Felicitaciones!</h1>
        <p>Tu compra se ha realizado exitosamente. Hemos enviado los detalles a tu email.</p>
        
        <div class="order-details">
            <div class="detail-item">
                <span>Número de orden:</span>
                <strong>#ORD-{{ rand(1000, 9999) }}</strong>
            </div>
            <div class="detail-item">
                <span>Fecha:</span>
                <strong id="current-date"></strong>
            </div>
            <div class="detail-item">
                <span>Total:</span>
                <strong>${{ number_format(rand(50, 500), 2) }}</strong>
            </div>
            <div class="detail-item">
                <span>Estado:</span>
                <strong style="color: #4CAF50;">Completado</strong>
            </div>
        </div>
        
        <p>¡Gracias por tu compra! Tu pedido está siendo procesado y será enviado pronto.</p>
        <p>El número de id es {{ $preferenceId }}</p>
        <a href="/registro" class="btn-back">Volver al Inicio</a>
    </div>

    <script>
        // Mostrar fecha actual
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('es-ES', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        // Efecto de confetti simple
        function createConfetti() {
            const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'];
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-10px';
                confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                document.body.appendChild(confetti);
                
                const animation = confetti.animate([
                    { opacity: 1, top: '-10px' },
                    { opacity: 1, top: '100vh' }
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(0.1, 0.8, 0.1, 1)'
                });
                
                animation.onfinish = () => confetti.remove();
            }
        }
        
        // Ejecutar confetti al cargar la página
        setTimeout(createConfetti, 500);
        
        // Opcional: Volver atrás con JavaScript
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>