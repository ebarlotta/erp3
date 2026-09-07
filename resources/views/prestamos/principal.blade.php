<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Préstamo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 700px;
            max-width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .fila {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }
        .columna {
            flex: 1;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }
        input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        button:hover {
            background-color: #555;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f4fd;
            border-radius: 8px;
            text-align: center;
            display: none;
        }
        .resultado p {
            margin: 5px 0;
            font-size: 14px;
            color: #333;
        }
        .resultado .cuota {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .tabla-cuotas {
            margin-top: 20px;
            display: none;
        }
        .tabla-cuotas table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .tabla-cuotas th, .tabla-cuotas td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .tabla-cuotas th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        .tabla-cuotas td:first-child {
            font-weight: bold;
        }
        .tabla-cuotas .total-cuota {
            font-weight: bold;
            color: #007bff;
        }
        .seccion-checkbox {
            margin-top: 20px;
            display: none;
        }
        .seccion-checkbox label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: normal;
            color: #333;
        }
        .seccion-checkbox input[type="checkbox"] {
            width: auto;
            margin-bottom: 0;
        }
        .seccion-checkbox .total-pago {
            font-size: 20px;
            font-weight: bold;
            color: #d9534f;
            margin-top: 10px;
            text-align: center;
        }
        .total-tabla {
            font-size: 14px;
            font-weight: bold;
            color: #d9534f;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Préstamo</h2>

        <div class="fila">
            <div class="columna">
                <label for="capital">Capital ($)</label>
                <input type="number" id="capital" placeholder="Ej: 500000" value="500000">
            </div>
            <div class="columna">
                <label for="tna">TNA (%)</label>
                <input type="number" id="tna" placeholder="Ej: 69" value="69">
            </div>
        </div>

        <div class="fila">
            <div class="columna">
                <label for="cuotas">Número de Cuotas</label>
                <input type="number" id="cuotas" placeholder="Ej: 6" value="6">
            </div>
            <div class="columna">
                <label for="fecha">Fecha vencimiento 1ra cuota</label>
                <input type="date" id="fecha" value="2026-09-10">
            </div>
        </div>

        <button onclick="calcular()">Calculate</button>

        <div class="resultado" id="resultado">
            <p>Cuota mensual fija:</p>
            <p class="cuota" id="cuotaValor"></p>
            <p id="totalPagado"></p>
        </div>

        <div class="tabla-cuotas" id="tablaCuotas">
            <table>
                <thead>
                    <tr>
                        <th>Cuota</th>
                        <th>Vencimiento</th>
                        <th>Monto cuota</th>
                        <th>Interés cuota</th>
                        <th>IVA 21% (s/ interés)</th>
                        <th>Total cuota</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody id="tbodyCuotas"></tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><b>Totales</b></td>
                        <td id="totalMonto"></td>
                        <td id="totalInteres"></td>
                        <td id="totalIva"></td>
                        <td id="totalTodo"></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="seccion-checkbox" id="seccionCheckbox">
            <div class="total-pago" id="totalPagoAdelantado"></div>
        </div>
    </div>

    <script>
        // Función para convertir a formato argentino: 123.456.789,12
        function formatoArg(numero) {
            return numero.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        // Función para calcular el número de días entre dos fechas
        function diasEntre(fecha1, fecha2) {
            var unDia = 24 * 60 * 60 * 1000;
            return Math.round((fecha2 - fecha1) / unDia);
        }

        function calcular() {
            var capital = parseFloat(document.getElementById('capital').value);
            var tna = parseFloat(document.getElementById('tna').value);
            var cuotas = parseInt(document.getElementById('cuotas').value);
            var fecha = document.getElementById('fecha').value;

            if (!capital || !tna || !cuotas || !fecha) {
                alert("Please fill all fields");
                return;
            }

            // Convertir TNA a tasa mensual (proporcional simple)
            var i = (tna / 100) / 12;

            // Fecha de hoy
            var hoy = new Date();
            hoy.setHours(0, 0, 0, 0);

            // Fecha de la primera cuota
            var fechaPrimeraCuota = new Date(fecha);
            fechaPrimeraCuota.setHours(0, 0, 0, 0);

            // Si la fecha de la primera cuota ya pasó, usar la fecha de hoy
            if (fechaPrimeraCuota < hoy) {
                fechaPrimeraCuota = hoy;
            }

            // Calcular el número de días entre hoy y la primera cuota
            var diasPrimeraCuota = diasEntre(hoy, fechaPrimeraCuota);

            // Si son menos de 1 día, usar 1 día como mínimo
            if (diasPrimeraCuota < 1) {
                diasPrimeraCuota = 1;
            }

            // Convertir días a fracción de mes (30 días = 1 mes)
            var fraccionPrimerMes = diasPrimeraCuota / 30;

            // Cuota fija mensual (sistema francés con interés compuesto mensual)
            // Nota: La cuota se calcula con una tasa mensual y un plazo de n meses (asumiendo que la primera cuota es a 1 mes)
            // Para simplificar, mantenemos la cuota calculada con la tasa mensual y el plazo n, pero el interés se ajusta con el período real.
            var cuota = capital * (i / (1 - Math.pow(1 + i, -cuotas)));

            // Total pagado
            var total = cuota * cuotas;

            // Anexar resultados
            document.getElementById('cuotaValor').textContent = '$' + formatoArg(cuota);
            document.getElementById('totalPagado').textContent = 'Total pagado: $' + formatoArg(total);
            document.getElementById('resultado').style.display = 'block';

            // Calculamos cada cuota con su interés e IVA
            var saldo = capital;
            var tablaHTML = '';
            var fechaActual = hoy;

            var totalMonto = 0;
            var totalInteres = 0;
            var totalIva = 0;
            var totalTodo = 0;

            for (var n = 1; n <= cuotas; n++) {
                // Fecha de vencimiento de la cuota n
                // Para la primera cuota, usamos la fecha exacta
                // Para las siguientes, sumamos 1 mes a la fecha anterior
                var fechaCuota;
                if (n === 1) {
                    fechaCuota = fechaPrimeraCuota;
                } else {
                    fechaCuota = new Date(fechaActual);
                    fechaCuota.setMonth(fechaCuota.getMonth() + 1);
                }

                // Interés del período
                // Para la primera cuota, interés = saldo * i * fraccionPrimerMes
                // Para las siguientes, interés = saldo * i (porque ya pasó un mes completo)
                var interes;
                if (n === 1) {
                    interes = saldo * i * fraccionPrimerMes;
                } else {
                    interes = saldo * i;
                }

                // IVA 21% sobre el interés
                var iva = interes * 0.21;

                // Cuota sin IVA
                var montoCuota = cuota;

                // Total cuota con IVA
                var totalCuota = montoCuota + iva;

                // Amortización de capital
                // Para la primera cuota, la amortización se ajusta por la fracción del mes
                var amortizacion;
                if (n === 1) {
                    amortizacion = cuota - interes;
                } else {
                    amortizacion = cuota - interes;
                }

                saldo = saldo - amortizacion;

                totalMonto = totalMonto + montoCuota;
                totalInteres = totalInteres + interes;
                totalIva = totalIva + iva;
                totalTodo = totalTodo + totalCuota;

                // Fecha de vencimiento en formato argentino
                var fechaTexto = fechaCuota.toLocaleDateString('es-AR', {day: '2-digit', month: '2-digit', year: 'numeric'});

                tablaHTML += '<tr>'
                    + '<td>' + n + '</td>'
                    + '<td>' + fechaTexto + '</td>'
                    + '<td>$' + formatoArg(montoCuota) + '</td>'
                    + '<td>$' + formatoArg(interes) + '</td>'
                    + '<td>$' + formatoArg(iva) + '</td>'
                    + '<td class="total-cuota">$' + formatoArg(totalCuota) + '</td>'
                    + '<td><input type="checkbox" class="chkCuota" value="' + totalCuota.toFixed(2) + '" onchange="sumarSeleccionadas()"></td>'
                    + '</tr>';

                // Actualizar fecha actual para la siguiente cuota
                fechaActual = fechaCuota;
            }

            document.getElementById('tbodyCuotas').innerHTML = tablaHTML;
            document.getElementById('totalMonto').textContent = '$' + formatoArg(totalMonto);
            document.getElementById('totalInteres').textContent = '$' + formatoArg(totalInteres);
            document.getElementById('totalIva').textContent = '$' + formatoArg(totalIva);
            document.getElementById('totalTodo').textContent = '$' + formatoArg(totalTodo);
            document.getElementById('tablaCuotas').style.display = 'block';

            // Mostrar sección de checkbox
            document.getElementById('seccionCheckbox').style.display = 'block';
            document.getElementById('totalPagoAdelantado').textContent = '';
        }

        function sumarSeleccionadas() {
            var checkboxes = document.querySelectorAll('.chkCuota');
            var total = 0;
            var cuotasSeleccionadas = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    total += parseFloat(checkboxes[i].value);
                    cuotasSeleccionadas++;
                }
            }

            if (cuotasSeleccionadas > 0) {
                document.getElementById('totalPagoAdelantado').textContent = 'Total a pagar por ' + cuotasSeleccionadas + ' cuotas: $' + formatoArg(total);
            } else {
                document.getElementById('totalPagoAdelantado').textContent = '';
            }
        }

        // Esta función ya no es necesaria porque le total dinámico se calcula con sumarSeleccionadas()
        // pero la dejamos por si quieres usarla como respaldo.
        function calcularTotalAdelantado() {
            var cuotas = parseInt(document.getElementById('cuotas').value);
            var tna = parseFloat(document.getElementById('tna').value);
            var capital = parseFloat(document.getElementById('capital').value);

            if (!capital || !tna || !cuotas) {
                alert("Please fill all fields");
                return;
            }

            // Convertir TNA a tasa mensual
            var i = (tna / 100) / 12;

            // Cuota francesa
            var cuota = capital * (i / (1 - Math.pow(1 + i, -cuotas)));

            var totalAdelantado = 0;
            var saldo = capital;

            // Se calcula la cuota y el IVA para todas las cuotas que el usuario quiera pagar
            var n = 0;
            while (n < cuotas) {
                n++;
                var interes = saldo * i;
                var iva = interes * 0.21;
                var totalCuota = cuota + iva;
                totalAdelantado = totalAdelantado + totalCuota;
                var amortizacion = cuota - interes;
                saldo = saldo - amortizacion;
            }

            document.getElementById('totalPagoAdelantado').textContent = 'Si pagás todas las cuotas, el total a pagar es: $' + formatoArg(totalAdelantado);
        }
    </script>
</body>
</html>