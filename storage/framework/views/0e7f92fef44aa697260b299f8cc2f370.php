<?php
$biorritmos = null;
$error = null;
$datos_grafico = null;

if (isset($_GET['fecha_nacimiento']) && !empty($_GET['fecha_nacimiento'])) {
    $fecha_nacimiento = $_GET['fecha_nacimiento'];
    
    // Validar fecha
    $fecha_nac = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);
    $hoy = new DateTime();
    
    if (!$fecha_nac) {
        $error = "Formato de fecha inválido.";
    } elseif ($fecha_nac > $hoy) {
        $error = "La fecha de nacimiento no puede ser futura.";
    } else {
        // Calcular días transcurridos
        $diferencia = $hoy->diff($fecha_nac);
        $dias = $diferencia->days;
        
        // Calcular biorritmos usando función seno
        $frecuencia_fisica = sin(2 * M_PI * $dias / 23) * 100;
        $frecuencia_emocional = sin(2 * M_PI * $dias / 28) * 100;
        $frecuencia_intelectual = sin(2 * M_PI * $dias / 33) * 100;
        
        $biorritmos = [
            'dias' => $dias,
            'fecha_nacimiento' => $fecha_nac->format('d/m/Y'),
            'fecha_actual' => $hoy->format('d/m/Y'),
            'fisico' => round($frecuencia_fisica, 2),
            'emocional' => round($frecuencia_emocional, 2),
            'intelectual' => round($frecuencia_intelectual, 2)
        ];
        
        // Generar datos para el gráfico (30 días antes y 30 días después)
        $labels = [];
        $fisico_data = [];
        $emocional_data = [];
        $intelectual_data = [];
        
        for ($i = -30; $i <= 30; $i++) {
            $fecha_punto = (clone $hoy)->modify("{$i} days");
            $labels[] = $fecha_punto->format('d/m');
            
            $dias_punto = $dias + $i;
            $fisico_data[] = round(sin(2 * M_PI * $dias_punto / 23) * 100, 2);
            $emocional_data[] = round(sin(2 * M_PI * $dias_punto / 28) * 100, 2);
            $intelectual_data[] = round(sin(2 * M_PI * $dias_punto / 33) * 100, 2);
        }
        
        $datos_grafico = [
            'labels' => $labels,
            'fisico' => $fisico_data,
            'emocional' => $emocional_data,
            'intelectual' => $intelectual_data,
            'dia_actual_index' => 30 // El índice del día actual en el array
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Biorritmos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            font-size: 2em;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 0.9em;
        }
        
        .form-group {
            margin-bottom: 25px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }
        
        input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="date"]:focus {
            outline: none;
            border-color: #667eea;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .error {
            background: #fee;
            color: #c33;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #c33;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .resultados {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid #f0f0f0;
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            align-items: start;
        }
        
        .info-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .info-fechas {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        
        .info-fechas p {
            margin: 5px 0;
            color: #555;
        }
        
        .biorritmo {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .biorritmo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .biorritmo-nombre {
            font-weight: 600;
            color: #333;
            font-size: 1.1em;
        }
        
        .biorritmo-valor {
            font-weight: 700;
            font-size: 1.2em;
        }
        
        .barra-container {
            background: #e0e0e0;
            height: 20px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }
        
        .barra {
            height: 100%;
            transition: width 0.5s ease;
            border-radius: 10px;
        }
        
        .fisico .biorritmo-valor { color: #e74c3c; }
        .fisico .barra { background: linear-gradient(90deg, #e74c3c, #ff6b6b); }
        
        .emocional .biorritmo-valor { color: #3498db; }
        .emocional .barra { background: linear-gradient(90deg, #3498db, #5dade2); }
        
        .intelectual .biorritmo-valor { color: #2ecc71; }
        .intelectual .barra { background: linear-gradient(90deg, #2ecc71, #58d68d); }
        
        .estado {
            margin-top: 8px;
            font-size: 0.9em;
            color: #666;
        }
        
        .grafico-column {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            position: sticky;
            top: 20px;
        }
        
        .grafico-titulo {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1em;
        }
        
        .grafico-container {
            position: relative;
            height: 400px;
        }
        
        @media (max-width: 900px) {
            .resultados {
                grid-template-columns: 1fr;
            }
            
            .grafico-column {
                position: static;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌟 Calculadora de Biorritmos</h1>
        <p class="subtitle">Inspirada en la Kosmos 1 (1977)</p>
        
        <form method="GET" action="">
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <button type="submit">Calcular Biorritmos</button>
            </div>
        </form>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if ($biorritmos): ?>
            <div class="resultados">
                <!-- Columna izquierda: Información -->
                <div class="info-column">
                    <div class="info-fechas">
                        <p><strong>Fecha de nacimiento:</strong> <?= $biorritmos['fecha_nacimiento'] ?></p>
                        <p><strong>Fecha actual:</strong> <?= $biorritmos['fecha_actual'] ?></p>
                        <p><strong>Días vividos:</strong> <?= $biorritmos['dias'] ?></p>
                    </div>
                    
                    <div class="biorritmo fisico">
                        <div class="biorritmo-header">
                            <span class="biorritmo-nombre">💪 Físico (23 días)</span>
                            <span class="biorritmo-valor"><?= $biorritmos['fisico'] ?>%</span>
                        </div>
                        <div class="barra-container">
                            <div class="barra" style="width: <?= ($biorritmos['fisico'] + 100) / 2 ?>%"></div>
                        </div>
                        <p class="estado"><?= obtenerEstado($biorritmos['fisico']) ?></p>
                    </div>
                    
                    <div class="biorritmo emocional">
                        <div class="biorritmo-header">
                            <span class="biorritmo-nombre">❤️ Emocional (28 días)</span>
                            <span class="biorritmo-valor"><?= $biorritmos['emocional'] ?>%</span>
                        </div>
                        <div class="barra-container">
                            <div class="barra" style="width: <?= ($biorritmos['emocional'] + 100) / 2 ?>%"></div>
                        </div>
                        <p class="estado"><?= obtenerEstado($biorritmos['emocional']) ?></p>
                    </div>
                    
                    <div class="biorritmo intelectual">
                        <div class="biorritmo-header">
                            <span class="biorritmo-nombre">🧠 Intelectual (33 días)</span>
                            <span class="biorritmo-valor"><?= $biorritmos['intelectual'] ?>%</span>
                        </div>
                        <div class="barra-container">
                            <div class="barra" style="width: <?= ($biorritmos['intelectual'] + 100) / 2 ?>%"></div>
                        </div>
                        <p class="estado"><?= obtenerEstado($biorritmos['intelectual']) ?></p>
                    </div>
                </div>
                
                <!-- Columna derecha: Gráfico -->
                <div class="grafico-column">
                    <h3 class="grafico-titulo">📈 Evolución de tus biorritmos (±30 días)</h3>
                    <div class="grafico-container">
                        <canvas id="graficoBiorritmos"></canvas>
                    </div>
                </div>
            </div>
            
            <script>
                const datosGrafico = <?= json_encode($datos_grafico) ?>;
                
                const ctx = document.getElementById('graficoBiorritmos').getContext('2d');
                
                // Plugin para dibujar línea vertical en el día actual
                const lineaHoyPlugin = {
                    id: 'lineaHoy',
                    afterDraw: (chart) => {
                        const ctx = chart.ctx;
                        const xAxis = chart.scales.x;
                        const yAxis = chart.scales.y;
                        const x = xAxis.getPixelForValue(datosGrafico.dia_actual_index);
                        
                        ctx.save();
                        ctx.beginPath();
                        ctx.moveTo(x, yAxis.top);
                        ctx.lineTo(x, yAxis.bottom);
                        ctx.lineWidth = 2;
                        ctx.strokeStyle = '#333';
                        ctx.setLineDash([5, 5]);
                        ctx.stroke();
                        
                        // Etiqueta "HOY"
                        ctx.fillStyle = '#333';
                        ctx.font = 'bold 12px sans-serif';
                        ctx.textAlign = 'center';
                        ctx.fillText('HOY', x, yAxis.top - 5);
                        ctx.restore();
                    }
                };
                
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: datosGrafico.labels,
                        datasets: [
                            {
                                label: '💪 Físico (23 días)',
                                data: datosGrafico.fisico,
                                borderColor: '#e74c3c',
                                backgroundColor: 'rgba(231, 76, 60, 0.1)',
                                borderWidth: 2,
                                tension: 0.4,
                                pointRadius: 0,
                                pointHoverRadius: 5,
                                fill: false
                            },
                            {
                                label: '❤️ Emocional (28 días)',
                                data: datosGrafico.emocional,
                                borderColor: '#3498db',
                                backgroundColor: 'rgba(52, 152, 219, 0.1)',
                                borderWidth: 2,
                                tension: 0.4,
                                pointRadius: 0,
                                pointHoverRadius: 5,
                                fill: false
                            },
                            {
                                label: '🧠 Intelectual (33 días)',
                                data: datosGrafico.intelectual,
                                borderColor: '#2ecc71',
                                backgroundColor: 'rgba(46, 204, 113, 0.1)',
                                borderWidth: 2,
                                tension: 0.4,
                                pointRadius: 0,
                                pointHoverRadius: 5,
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    font: { size: 12 }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: { size: 13 },
                                bodyFont: { size: 12 },
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y.toFixed(1) + '%';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                min: -100,
                                max: 100,
                                ticks: {
                                    callback: function(value) {
                                        return value + '%';
                                    },
                                    stepSize: 25
                                },
                                grid: {
                                    color: function(context) {
                                        if (context.tick.value === 0) {
                                            return 'rgba(0, 0, 0, 0.3)';
                                        }
                                        return 'rgba(0, 0, 0, 0.05)';
                                    },
                                    lineWidth: function(context) {
                                        return context.tick.value === 0 ? 2 : 1;
                                    }
                                }
                            },
                            x: {
                                ticks: {
                                    maxTicksLimit: 12,
                                    maxRotation: 0
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    },
                    plugins: [lineaHoyPlugin]
                });
            </script>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
function obtenerEstado($valor) {
    if ($valor > 50) {
        return "✨ Excelente - Alta energía";
    } elseif ($valor > 20) {
        return "👍 Positivo - Buen momento";
    } elseif ($valor > -20) {
        return "⚠️ Crítico - Día de transición";
    } elseif ($valor > -50) {
        return "👎 Negativo - Energía baja";
    } else {
        return "⚡ Muy bajo - Descansa y recarga";
    }
}
?><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/bioritmos/principal.blade.php ENDPATH**/ ?>