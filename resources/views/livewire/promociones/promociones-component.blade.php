<div>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grid Items con Íconos Temáticos</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            body {
                background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 50%, #fdbb2d 100%);
                color: #333;
                padding: 40px 20px;
                min-height: 100vh;
            }
            
            .container {
                max-width: 100%;
                /* max-width: 95%; */
                /* max-width: 1400px; */
                margin: 0 auto;
            }
            
            header {
                text-align: center;
                margin-bottom: 40px;
                color: white;
            }
            
            h1 {
                font-size: 2.8rem;
                margin-bottom: 15px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }
            
            .subtitle {
                font-size: 1.3rem;
                opacity: 0.9;
                max-width: 800px;
                margin: 0 auto;
            }
            
            .card-header {
                text-align: center;
                padding: 25px;
                background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
                color: white;
                border-radius: 20px;
                box-shadow: 5px 5px 10px #2a0303;
            }

            .main-card {
                width: 100%;
                background: white;
                border-radius: 20px;
                overflow: hidden;
                /* box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25); */
                margin-bottom: 30px;
                box-shadow: 5px 5px 10px #999393;
                padding: 15px;
                /* box-shadow: 5px 5px 10px #665f5f; */
            }

            . content {
                padding: 0px !important;
            }
            .grid-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 25px;
                margin-bottom: 40px;
            }
            
            .grid-item {
                background: white;
                border-radius: 18px;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                box-shadow: 5px 5px 10px #2a0303;
            }
            
            .grid-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
                box-shadow: 5px 5px 10px #b44b4b;
            }
            
            .item-header {
                padding: 20px;
                text-align: center;
                background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
                color: white;
                display: flex;
                justify-content: center;

            }
            
            .icon {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }
            
            .item-title {
                font-size: 1.4rem;
                font-weight: bold;
                margin-top: 16px;
                margin-left: 14px;
            }
            
            .item-content {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }
            
            .item-desc {
                margin-bottom: 20px;
                color: #555;
                line-height: 1.5;
                flex-grow: 1;
            }
            
            .item-details {
                background-color: #f8f9fa;
                padding: 15px;
                border-radius: 8px;
                border-left: 4px solid #2575fc;
            }
            
            .item-details p {
                margin: 5px 0;
                font-size: 0.95rem;
            }
            
            .tag {
                display: inline-block;
                background: #e9ecef;
                padding: 5px 10px;
                border-radius: 15px;
                font-size: 0.8rem;
                color: #495057;
                margin-top: 15px;
            }
            
            footer {
                text-align: center;
                color: white;
                padding: 20px;
                margin-top: 40px;
                font-size: 1.1rem;
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
            
            @media (max-width: 768px) {
                .grid-container {
                    grid-template-columns: 1fr;
                }
                
                h1 {
                    font-size: 2.2rem;
                }
                
                .subtitle {
                    font-size: 1.1rem;
                }
            }
        </style>
    </head>
    <div class="container">
        <header style="color:brown">
            <h1>Grid Items con Íconos Temáticos</h1>
            <p class="subtitle">Cada item representa un concepto diferente con su ícono correspondiente según los temas solicitados</p>
        </header>
        


        <div class="main-card mt-3">
            <div class="card-header mb-4">
                <h1>PRINCIPALES PROMOCIONES</h1>
                {{-- <div class="subtitle">EN FARMACIAS Y PERFUMERÍAS*</div> --}}
                <div class="month">SEPTIEMBRE</div>
            </div>


            <div class="grid-container">
                <!-- Zonas -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
                        <div class="item-title">Zonas</div>
                        <div class="item-title">20%</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Áreas geográficas donde aplica la promoción. Pueden ser barrios, ciudades o regiones específicas.</p>
                        <div class="item-details">
                            <p><i class="fas fa-check-circle"></i> Aplica en CABA y GBA</p>
                            <p><i class="fas fa-times-circle"></i> No aplica en interior</p>
                        </div>
                        <span class="tag">Geolocalización</span>
                    </div>
                </div>
                
                <!-- TipoDeCompra -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="item-title">Tipo de Compra</div>
                        <div class="item-title">20%</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Categorías de productos o servicios que son elegibles para la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-pills"></i> Farmacia</p>
                            <p><i class="fas fa-spray-can"></i> Perfumería</p>
                            <p><i class="fas fa-times-circle"></i> No aplica para electrónica</p>
                        </div>
                        <span class="tag">Categorización</span>
                    </div>
                </div>
                
                <!-- MontoFijoDESCUENTO -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-tags"></i></div>
                        <div class="item-title">Monto Fijo DESCUENTO</div>
                        <div class="item-title">20%</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Descuento de valor fijo aplicado al total de la compra, independientemente del monto.</p>
                        <div class="item-details">
                            <p><i class="fas fa-money-bill-wave"></i> Descuento: $500</p>
                            <p><i class="fas fa-shopping-bag"></i> Mínimo de compra: $2000</p>
                        </div>
                        <span class="tag">Descuento fijo</span>
                    </div>
                </div>
                
                <!-- PorcentajeDESCUENTO -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-percent"></i></div>
                        <div class="item-title">Porcentaje DESCUENTO</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Descuento calculado como un porcentaje del total de la compra.</p>
                        <div class="item-details">
                            <p><i class="fas fa-chart-pie"></i> 25% de descuento</p>
                            <p><i class="fas fa-chart-line"></i> Aplicado al total</p>
                        </div>
                        <span class="tag">Descuento porcentual</span>
                    </div>
                </div>
                
                <!-- TopePorTransaccion -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                        <div class="item-title">Tope por Transacción</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Límite máximo de descuento aplicable en una sola transacción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-money-bill"></i> Máximo: $5.000</p>
                            <p><i class="fas fa-receipt"></i> Por transacción</p>
                        </div>
                        <span class="tag">Límite transaccional</span>
                    </div>
                </div>
                
                <!-- PeriodoDesde -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        <div class="item-title">Periodo Desde</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Fecha de inicio en la que la promoción comienza a estar vigente.</p>
                        <div class="item-details">
                            <p><i class="fas fa-play-circle"></i> Inicio: 01/09/2023</p>
                            <p><i class="fas fa-clock"></i> 00:00 hs</p>
                        </div>
                        <span class="tag">Fecha inicial</span>
                    </div>
                </div>
                
                <!-- PeriodoHasta -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-calendar-times"></i></div>
                        <div class="item-title">Periodo Hasta</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Fecha de finalización de la vigencia de la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-stop-circle"></i> Fin: 30/09/2023</p>
                            <p><i class="fas fa-clock"></i> 23:59 hs</p>
                        </div>
                        <span class="tag">Fecha final</span>
                    </div>
                </div>
                
                <!-- TopePorPeriodo -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-chart-bar"></i></div>
                        <div class="item-title">Tope por Periodo</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Límite máximo de descuento acumulable durante un período específico.</p>
                        <div class="item-details">
                            <p><i class="fas fa-calendar-week"></i> Por semana: $10.000</p>
                            <p><i class="fas fa-calendar-month"></i> Por mes: $40.000</p>
                        </div>
                        <span class="tag">Límite periódico</span>
                    </div>
                </div>
                
                <!-- TopePorTipoPeriodo -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-filter"></i></div>
                        <div class="item-title">Tope por Tipo de Periodo</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Límites específicos según diferentes tipos de períodos (diario, semanal, mensual).</p>
                        <div class="item-details">
                            <p><i class="fas fa-calendar-day"></i> Diario: $2.000</p>
                            <p><i class="fas fa-calendar-week"></i> Semanal: $10.000</p>
                        </div>
                        <span class="tag">Límite segmentado</span>
                    </div>
                </div>
                
                <!-- ListaDeProductos -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-list"></i></div>
                        <div class="item-title">Lista de Productos</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Productos específicos que participan en la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-pills"></i> Medicamentos</p>
                            <p><i class="fas fa-soap"></i> Productos de higiene</p>
                            <p><i class="fas fa-spray-can"></i> Perfumes</p>
                        </div>
                        <span class="tag">Productos elegibles</span>
                    </div>
                </div>
                
                <!-- FormaDePago -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-credit-card"></i></div>
                        <div class="item-title">Forma de Pago</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Métodos de pago aceptados para la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-credit-card"></i> Tarjeta de crédito</p>
                            <p><i class="fas fa-credit-card"></i> Tarjeta de débito</p>
                            <p><i class="fas fa-money-bill"></i> Efectivo</p>
                        </div>
                        <span class="tag">Medios de pago</span>
                    </div>
                </div>
                
                <!-- MedioDePago -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-money-check-alt"></i></div>
                        <div class="item-title">Medio de Pago</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Instrumentos específicos de pago que participan en la promoción.</p>
                        <div class="item-details">
                            <p><i class="fab fa-cc-visa"></i> Visa</p>
                            <p><i class="fab fa-cc-mastercard"></i> Mastercard</p>
                            <p><i class="fas fa-university"></i> Banco Nación</p>
                        </div>
                        <span class="tag">Instrumentos financieros</span>
                    </div>
                </div>
                
                <!-- Requisito -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-tasks"></i></div>
                        <div class="item-title">Requisito</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Condiciones que deben cumplirse para acceder a la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-id-card"></i> Cliente registrado</p>
                            <p><i class="fas fa-shopping-bag"></i> Compra mínima: $2.000</p>
                            <p><i class="fas fa-credit-card"></i> Pago con tarjeta</p>
                        </div>
                        <span class="tag">Condiciones</span>
                    </div>
                </div>
                
                <!-- DíaDeLaSemana -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-calendar-day"></i></div>
                        <div class="item-title">Día de la Semana</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Días específicos en los que aplica la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-calendar-check"></i> Lunes a Viernes</p>
                            <p><i class="fas fa-calendar-times"></i> Excepto feriados</p>
                        </div>
                        <span class="tag">Días hábiles</span>
                    </div>
                </div>
                
                <!-- Moneda -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-coins"></i></div>
                        <div class="item-title">Moneda</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Tipo de moneda en la que se realiza la transacción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-dollar-sign"></i> Pesos Argentinos (ARS)</p>
                            <p><i class="fas fa-dollar-sign"></i> Dólares Estadounidenses (USD)</p>
                        </div>
                        <span class="tag">Divisas</span>
                    </div>
                </div>
                
                <!-- Información -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-info-circle"></i></div>
                        <div class="item-title">Información</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Detalles adicionales y aclaraciones sobre la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-exclamation-triangle"></i> Sujeto a disponibilidad</p>
                            <p><i class="fas fa-store"></i> Válido en locales adheridos</p>
                        </div>
                        <span class="tag">Aclaraciones</span>
                    </div>
                </div>
                
                <!-- Retira -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-box-open"></i></div>
                        <div class="item-title">Retira</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Modalidad de retiro de productos adquiridos con la promoción.</p>
                        <div class="item-details">
                            <p><i class="fas fa-store"></i> Retiro en sucursal</p>
                            <p><i class="fas fa-truck"></i> Envío a domicilio</p>
                        </div>
                        <span class="tag">Modalidad de entrega</span>
                    </div>
                </div>
                
                <!-- Reintegro -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="item-title">Reintegro</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Devolución de un porcentaje o monto fijo de la compra realizada.</p>
                        <div class="item-details">
                            <p><i class="fas fa-undo"></i> 15% de reintegro</p>
                            <p><i class="fas fa-calendar"></i> Acreditado en 72hs</p>
                        </div>
                        <span class="tag">Devolución</span>
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <p>Grid de conceptos con íconos temáticos - Diseño responsivo</p>
        </footer>
    </div>
</div>
