

<div>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones - Grilla Adaptativa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .main-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .main-card {
            width: 90%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            /* box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25); */
            margin-bottom: 30px;
            box-shadow: 5px 5px 10px #000
        }
        
        .card-header {
            text-align: center;
            padding: 25px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
        }
        
        h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        .subtitle {
            font-size: 1.4rem;
            font-weight: 300;
            margin-bottom: 15px;
        }
        
        .month {
            font-size: 2rem;
            font-weight: bold;
            background-color: #ff6b6b;
            display: inline-block;
            padding: 8px 25px;
            border-radius: 30px;
            margin-top: 15px;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            padding: 30px;
        }
        
        .grid-item {
            background: #f8f9fa;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-shadow: 5px 5px 10px #000;
        }
        
        .grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .discount-badge {
            /* background-color: #4cd137; */
            background-color: #70c762;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
        }
    
        .item-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .bank-name {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c3e50;
            text-align: center;
        }
        
        .promotion-details {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }
        
        .promotion-details p {
            margin: 8px 0;
            font-size: 1rem;
            color: #555;
        }
        
        .terms {
            font-size: 0.9rem;
            color: #888;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #eee;
        }
        
        .footer {
            text-align: center;
            color: white;
            margin-top: 20px;
            font-size: 1.1rem;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .grid-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        @media (max-width: 992px) {
            .grid-container {
                grid-template-columns: repeat(3, 1fr);
            }
            
            h1 {
                font-size: 2.4rem;
            }
            
            .subtitle {
                font-size: 1.2rem;
            }
            
            .month {
                font-size: 1.7rem;
            }
        }
        
        @media (max-width: 768px) {
            .main-card {
                width: 90%;
                box-shadow: 5px 5px 10px #000
            }
            
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
                padding: 20px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .month {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 20px 15px;
            }
            
            .main-card {
                width: 99%;
                box-shadow: 5px 5px 10px #000
            }
            
            .grid-container {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 15px;
            }
            
            .card-header {
                padding: 20px 15px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .subtitle {
                font-size: 1.1rem;
            }
            
            .month {
                font-size: 1.4rem;
                padding: 6px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="main-card mt-3">
            <div class="card-header">
                <h1>PRINCIPALES PROMOCIONES</h1>
                <div class="subtitle">EN FARMACIAS Y PERFUMERÍAS*</div>
                <div class="month">SEPTIEMBRE</div>
            </div>
            
            <div class="grid-container">
                <!-- Tarjeta 1 -->
                <div class="grid-item">
                    <div class="discount-badge">20%</div>
                    <div class="item-content">
                        <div class="bank-name">Banco Nación</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 y 6 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 2 -->
                <div class="grid-item">
                    <div class="discount-badge">25%</div>
                    <div class="item-content">
                        <div class="bank-name">Visa</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3, 6 y 12 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 3 -->
                <div class="grid-item">
                    <div class="discount-badge">20%</div>
                    <div class="item-content">
                        <div class="bank-name">Mastercard</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 y 6 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 4 -->
                <div class="grid-item">
                    <div class="discount-badge">25%</div>
                    <div class="item-content">
                        <div class="bank-name">American Express</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3, 6 y 12 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 5 -->
                <div class="grid-item">
                    <div class="discount-badge">20%</div>
                    <div class="item-content">
                        <div class="bank-name">Cabal</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 y 6 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 6 -->
                <div class="grid-item">
                    <div class="discount-badge">15%</div>
                    <div class="item-content">
                        <div class="bank-name">Banco Provincia</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 7 -->
                <div class="grid-item">
                    <div class="discount-badge">15%</div>
                    <div class="item-content">
                        <div class="bank-name">Santander</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 8 -->
                <div class="grid-item">
                    <div class="discount-badge">10%</div>
                    <div class="item-content">
                        <div class="bank-name">Galicia</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $50.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 9 -->
                <div class="grid-item">
                    <div class="discount-badge">30%</div>
                    <div class="item-content">
                        <div class="bank-name">BBVA</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $45.000</p>
                            <p><i class="fas fa-credit-card"></i> 6 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta 10 -->
                <div class="grid-item">
                    <div class="discount-badge">18%</div>
                    <div class="item-content">
                        <div class="bank-name">HSBC</div>
                        <div class="promotion-details">
                            <p><i class="fas fa-money-bill-wave"></i> Tope: $55.000</p>
                            <p><i class="fas fa-credit-card"></i> 3 y 9 cuotas sin interés</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="terms">
                *Promociones válidas hasta agotar stock. Consultar términos y condiciones en cada establecimiento.
            </div>
        </div>
        
        <div class="footer">
            <p>© 2023 Promociones en Farmacias sssssy Perfumerías. Todos los derechos reservados.</p>
        </div>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/promociones/promociones-component5.blade.php ENDPATH**/ ?>