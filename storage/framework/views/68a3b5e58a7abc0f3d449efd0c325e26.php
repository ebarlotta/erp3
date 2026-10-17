<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Préstamo</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 900px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin: 0 0 20px 0;
            font-size: 22px;
        }
        .fila {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 5px;
        }
        .columna {
            flex: 1 1 45%;
            min-width: 0;
        }
        .columna-con-select {
            flex: 1 1 45%;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            min-width: 0;
        }
        .columna-con-select > div {
            flex: 1 1 45%;
            min-width: 0;
        }
        .fila-tres {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 5px;
        }
        .fila-tres .columna {
            flex: 1 1 30%;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
            font-size: 13px;
        }
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            background-color: #fff;
            min-width: 0;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.15);
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
        button:hover { background-color: #555; }
        .resultado {
            margin-top: 15px;
            padding: 15px;
            background-color: #e8f4fd;
            border-radius: 8px;
            text-align: center;
            display: none;
        }
        .resultado p { margin: 5px 0; font-size: 14px; color: #333; }
        .resultado .cuota { font-size: 22px; font-weight: bold; color: #007bff; }
        .tabla-cuotas {
            margin-top: 20px;
            display: none;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .tabla-cuotas table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            min-width: 650px;
        }
        .tabla-cuotas th, .tabla-cuotas td {
            border: 1px solid #ddd;
            padding: 6px 4px;
            text-align: center;
            white-space: nowrap;
        }
        .tabla-cuotas th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            font-size: 11px;
        }
        .tabla-cuotas td:first-child { font-weight: bold; }
        .tabla-cuotas .total-cuota { font-weight: bold; color: #007bff; }
        .tabla-cuotas input[type="checkbox"] {
            width: auto; margin: 0; padding: 0;
            transform: scale(1.2); cursor: pointer;
        }
        .seccion-checkbox { margin-top: 20px; display: none; }
        .seccion-checkbox .total-pago {
            font-size: 18px; font-weight: bold;
            color: #d9534f; margin-top: 10px; text-align: center;
        }
        @media (max-width: 700px) {
            body { padding: 10px; }
            .container { padding: 15px; border-radius: 8px; }
            h2 { font-size: 18px; }
            .fila, .fila-tres { flex-direction: column; gap: 0; }
            .columna, .columna-con-select, .columna-con-select > div, .fila-tres .columna {
                flex: 1 1 100%; width: 100%;
            }
            .columna-con-select { flex-direction: column; }
            label { font-size: 12px; }
            input[type="number"], input[type="date"], select {
                padding: 9px; font-size: 13px; margin-bottom: 12px;
            }
            button { padding: 11px; font-size: 15px; }
            .resultado .cuota { font-size: 20px; }
            .tabla-cuotas table { font-size: 11px; min-width: 550px; }
            .tabla-cuotas th, .tabla-cuotas td { padding: 5px 3px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Préstamo</h2>

        <!-- Fila 1: Capital + TNA + Método -->
        <div class="fila">
            <div class="columna">
                <label for="capital">Capital ($)</label>
                <input type="number" id="capital" placeholder="Ej: 106500" value="106500">
            </div>
            <div class="columna-con-select">
                <div>
                    <label for="tna">TNA (%)</label>
                    <input type="number" id="tna" placeholder="Ej: 69" value="69">
                </div>
                <div>
                    <label for="metodo">Método</label>
                    <select id="metodo">
                        <option value="frances">Sistema Francés (Cuota fija)</option>
                        <option value="simple">Interés Simple Diario</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Fila 2: Cuotas + Fecha Inicio + Fecha 1ra Cuota (en la misma fila) -->
        <div class="fila-tres">
            <div class="columna">
                <label for="cuotas">Número de Cuotas</label>
                <input type="number" id="cuotas" placeholder="Ej: 6" value="6">
            </div>
            <div class="columna">
                <label for="fechaInicio">Fecha de inicio</label>
                <input type="date" id="fechaInicio">
            </div>
            <div class="columna">
                <label for="fecha">Fecha vencimiento 1ra cuota</label>
                <input type="date" id="fecha" value="2026-08-16">
            </div>
        </div>

        <button onclick="calcular()">Calcular</button>

        <!-- Resultado -->
        <div class="resultado" id="resultado">
            <p id="tituloCuota">Cuota mensual fija:</p>
            <p class="cuota" id="cuotaValor"></p>
            <p id="totalPagado"></p>
        </div>

        <!-- Tabla de cuotas -->
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
        // Formato argentino: 123.456.789,12
        function formatoArg(numero) {
            return numero.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        // Días entre dos fechas
        function diasEntre(fecha1, fecha2) {
            var unDia = 24 * 60 * 60 * 1000;
            return Math.round((fecha2 - fecha1) / unDia);
        }

        // Inicializar fecha de inicio con la fecha actual
        window.addEventListener('DOMContentLoaded', function() {
            var hoy = new Date();
            var yyyy = hoy.getFullYear();
            var mm = String(hoy.getMonth() + 1).padStart(2, '0');
            var dd = String(hoy.getDate()).padStart(2, '0');
            document.getElementById('fechaInicio').value = yyyy + '-' + mm + '-' + dd;

            document.getElementById('metodo').addEventListener('change', calcular);
        });

        function calcular() {
            var capital = parseFloat(document.getElementById('capital').value);
            var tna = parseFloat(document.getElementById('tna').value);
            var cuotas = parseInt(document.getElementById('cuotas').value);
            var fechaInicioStr = document.getElementById('fechaInicio').value;
            var fechaStr = document.getElementById('fecha').value;
            var metodo = document.getElementById('metodo').value;

            if (!capital || !tna || !cuotas || !fechaInicioStr || !fechaStr) {
                alert("Por favor completá todos los campos");
                return;
            }

            var fechaInicio = new Date(fechaInicioStr);
            fechaInicio.setHours(0, 0, 0, 0);

            var fechaPrimeraCuota = new Date(fechaStr);
            fechaPrimeraCuota.setHours(0, 0, 0, 0);

            // ===== MÉTODO SIMPLE DIARIO (por cuota) =====
            if (metodo === 'simple') {
                var saldo = capital;
                var tablaHTML = '';
                var totalMonto = 0;
                var totalInteres = 0;
                var totalIva = 0;
                var totalTodo = 0;

                for (var n = 1; n <= cuotas; n++) {
                    // Fecha de vencimiento de la cuota n
                    var fechaCuota;
                    if (n === 1) {
                        fechaCuota = new Date(fechaPrimeraCuota);
                    } else {
                        fechaCuota = new Date(fechaPrimeraCuota);
                        fechaCuota.setMonth(fechaCuota.getMonth() + (n - 1));
                    }

                    // Días entre la fecha de inicio y el vencimiento de esta cuota
                    var dias = diasEntre(fechaInicio, fechaCuota);
                    if (dias < 1) dias = 1;

                    // Interés simple diario sobre el capital original (interés corrido)
                    // Nota: Si querés interés sobre saldo, avisame y lo cambio.
                    var interes = capital * (tna / 100 / 365) * dias;

                    // IVA 21% sobre el interés (opcional, lo dejo en 0 para Mercado Pago)
                    var iva = 0;

                    // Monto de la cuota = Capital / cuotas + interés de esa cuota
                    // En interés simple diario, el capital se divide en partes iguales y el interés es corrido.
                    var montoCuota = capital / cuotas;
                    var totalCuota = montoCuota + interes + iva;

                    totalMonto += montoCuota;
                    totalInteres += interes;
                    totalIva += iva;
                    totalTodo += totalCuota;

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
                }

                document.getElementById('tituloCuota').textContent = 'Resumen del préstamo:';
                document.getElementById('cuotaValor').textContent = 'Total: $' + formatoArg(totalTodo);
                document.getElementById('totalPagado').textContent = 'Interés total: $' + formatoArg(totalInteres);
                document.getElementById('resultado').style.display = 'block';

                document.getElementById('tbodyCuotas').innerHTML = tablaHTML;
                document.getElementById('totalMonto').textContent = '$' + formatoArg(totalMonto);
                document.getElementById('totalInteres').textContent = '$' + formatoArg(totalInteres);
                document.getElementById('totalIva').textContent = '$' + formatoArg(totalIva);
                document.getElementById('totalTodo').textContent = '$' + formatoArg(totalTodo);
                document.getElementById('tablaCuotas').style.display = 'block';
                document.getElementById('seccionCheckbox').style.display = 'block';
                document.getElementById('totalPagoAdelantado').textContent = '';
                return;
            }

            // ===== MÉTODO FRANCÉS =====
            var i = (tna / 100) / 12;
            var cuota = capital * (i / (1 - Math.pow(1 + i, -cuotas)));
            var total = cuota * cuotas;

            document.getElementById('tituloCuota').textContent = 'Cuota mensual fija:';
            document.getElementById('cuotaValor').textContent = '$' + formatoArg(cuota);
            document.getElementById('totalPagado').textContent = 'Total pagado: $' + formatoArg(total);
            document.getElementById('resultado').style.display = 'block';

            var saldo = capital;
            var tablaHTML = '';
            var fechaActual = fechaInicio;

            var totalMonto = 0;
            var totalInteres = 0;
            var totalIva = 0;
            var totalTodo = 0;

            for (var n = 1; n <= cuotas; n++) {
                var fechaCuota;
                if (n === 1) {
                    fechaCuota = new Date(fechaPrimeraCuota);
                } else {
                    fechaCuota = new Date(fechaPrimeraCuota);
                    fechaCuota.setMonth(fechaCuota.getMonth() + (n - 1));
                }

                var dias = diasEntre(fechaInicio, fechaCuota);
                if (dias < 1) dias = 1;

                var interes;
                if (n === 1) {
                    interes = saldo * i * (dias / 30);
                } else {
                    interes = saldo * i;
                }

                var iva = interes * 0.21;
                var montoCuota = cuota;
                var totalCuota = montoCuota + iva;
                var amortizacion = cuota - interes;
                saldo = saldo - amortizacion;

                totalMonto += montoCuota;
                totalInteres += interes;
                totalIva += iva;
                totalTodo += totalCuota;

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

                fechaActual = fechaCuota;
            }

            document.getElementById('tbodyCuotas').innerHTML = tablaHTML;
            document.getElementById('totalMonto').textContent = '$' + formatoArg(totalMonto);
            document.getElementById('totalInteres').textContent = '$' + formatoArg(totalInteres);
            document.getElementById('totalIva').textContent = '$' + formatoArg(totalIva);
            document.getElementById('totalTodo').textContent = '$' + formatoArg(totalTodo);
            document.getElementById('tablaCuotas').style.display = 'block';
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
                document.getElementById('totalPagoAdelantado').textContent =
                    'Total a pagar por ' + cuotasSeleccionadas + ' cuota(s): $' + formatoArg(total);
            } else {
                document.getElementById('totalPagoAdelantado').textContent = '';
            }
        }
    </script>
</body>
</html><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/prestamos/principal.blade.php ENDPATH**/ ?>