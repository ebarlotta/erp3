@props(['titulo'])
<div>
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header ui-sortable-handle flex" style="cursor: move; justify-content: space-between;">
            <h3 class="card-title ml-3" style="justify-content: right;"><b>{{ $titulo }}</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <div class="card sm:col-11 shadow-md rounded-l-md mx-2"
                style="margin: 10px 10px; box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;">

                <div class="card-body" style="height: 100%; padding: 0.25rem;">
                    <div style="justify-content: center; display: flex"><h1>Costos por Menú c/2 semanas</h1></div>
                    <table class="table table-striped">
                        {{-- <tr><td colspan="5">Resúmen de elementos necesarios</td></tr> --}}
                        <tr>
                            <td style="font-size:18px; align:center"><b>Nombre del menú</b></td>
                            <td style="font-size:18px; align:center"><b>Tiempo de preparación necesario</b></td>
                            <td style="font-size:18px; align:center"><b>Costos</b></td>
                        </tr>

                        @foreach ($this->Resumen['costomenues1'] as $costo)
                            <tr>
                                <td>{{ $costo->nombremenu }}</td>
                                <td>{{ $costo->tiempototal }}</td>
                                <td style="justify-content: right; display: grid; padding-right: 20%;">$ {{ number_format($costo->costototal,2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="card-body" style="height: 100%; padding: 0.25rem;">
                    <div style="justify-content: center; display: flex"><h1>Costos por Menú c/2 semanas</h1></div>
                    <table class="table table-striped">
                        {{-- <tr><td colspan="5">Resúmen de elementos necesarios</td></tr> --}}
                        <tr>
                            <td style="font-size:18px; align:center"><b>Nombre del menú</b></td>
                            <td style="font-size:18px; align:center"><b>Nombre ingrediente</b></td>
                            <td style="font-size:18px; align:center"><b>Cantidad de ingrediente Necesaria</b></td>
                            <td style="font-size:18px; align:center"><b>Tiempo de preparación necesario</b></td>
                            <td style="font-size:18px; align:center"><b>Costos</b></td>
                        </tr>

                        @foreach ($this->Resumen['costomenues'] as $costo)
                            <tr>
                                <td>{{ $costo->nombremenu }}</td>
                                <td>{{ $costo->name }}</td>
                                <td>{{ $costo->cantidadelementos }} - {{ $costo->unidad }}</td>
                                <td>{{ $costo->tiempototal }}</td>
                                <td style="justify-content: right; display: grid; padding-right: 20%;">$ {{ number_format($costo->costototal,2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="card-body mt-4" style="height: 100%; padding: 0.25rem;">
                    <div style="justify-content: center; display: flex"><h1>Costos por Ingredientes c/2 semanas</h1></div>
                    <table class="table table-striped">
                        <tr>
                            <td style="font-size:18px; align:center"><b>Nombre ingrediente</b></td>
                            <td style="font-size:18px; align:center"><b>Cantidad ingredientes necesarios</b></td>
                            <td style="font-size:18px; justify-content: center; display: grid;"><b>$ Costo Total</b></td>
                            {{-- <td>Tiempo de preparación Necesaria</td> --}}
                        </tr>

                        <?php $c = 0; ?>
                        @foreach ($this->Resumen['costoingredientes'] as $costo)
                            <tr>
                                <td>{{ $costo->name }}</td>
                                <td>{{ $costo->cantidadelementos }} - {{ $costo->unidad }}</td>
                                {{-- <td>{{ $costo->tiempototal }}</td> --}}
                                <td style="justify-content: right; display: grid; padding-right: 20%;">$ {{ number_format($costo->costototal,2, ',', '.') }}</td>
                                <?php $c = $c + $costo->costototal ?>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="background-color: lightgray; font-size:18px;"><b>Costo total</b></td>
                            <td style="background-color: lightgray;font-size:18px; justify-content: center; display: grid;"><b>$ {{ number_format($c,2, ',', '.') }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
