<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-3">Stock — Panel General</h4>
            <div class="d-flex gap-2">
                <a href="{{ route('stock.almacenes') }}"><button class="btn btn-primary btn-sm sombreado">+ Nuevo Almacén</button></a>
                <a href="{{ route('stock.productos') }}"><button class="btn btn-primary btn-sm sombreado">Productos</button></a>
                <a href="{{ route('stock.movimientos') }}"><button class="btn btn-primary btn-sm sombreado">Movimientos</button></a>
                <a href="{{ route('stock.lotes') }}"><button class="btn btn-primary btn-sm sombreado">Lotes</button></a>
                <a href="{{ route('stock.alertas') }}"><button class="btn btn-primary btn-sm sombreado">Alertas Stock mínimo</button></a>
                <a href="{{ route('stock.stock-almacen') }}"><button wire:click="create" class="btn btn-primary btn-sm sombreado">+ Nuevo Movimiento</button></a>
            </div>
        </div>


        {{-- Tarjetas por almacén --}}
        <div class="row">
            @forelse($almacenes as $almacen)
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body sombreado">
                            <h6 class="card-title">{{ $almacen->name }}</h6>
                            <h3 class="mb-0">{{ number_format($almacen->total_existencia ?? 0, 2) }} u</h3>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary">No hay almacenes registrados.</div>
                </div>
            @endforelse
        </div>

        {{-- Alertas --}}
                {{-- Alertas --}}
        <div class="card mb-3 sombreado fondo_encabezado_alerta">
            <div class="card-header"><strong>⚠ Alertas</strong></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $bajoMinimo }} productos bajo stock mínimo</span>
                    <a href="{{ route('stock.alertas') }}" class="btn btn-sm btn-outline-primary sombreado">Ver</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $porVencer }} productos vencen en &lt; 30 días</span>
                    <a href="{{ route('stock.lotes', ['filtro_estado' => 'por_vencer']) }}" class="btn btn-sm btn-outline-primary sombreado">Ver</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $sinMovimiento }} productos sin movimiento (90 días)</span>
                    <a href="{{ route('stock.movimientos') }}" class="btn btn-sm btn-outline-primary sombreado">Ver</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $sobrestock }} productos con sobrestock</span>
                    <a href="{{ route('stock.stock-almacen', ['filtro_estado' => 'sobrestock']) }}" class="btn btn-sm btn-outline-primary sombreado">Ver</a>
                </li>
            </ul>
        </div>

        {{-- Últimos movimientos --}}
        <div class="card sombreado">
            <div class="card-header fondo_encabezado"><strong>Últimos movimientos</strong></div>
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Producto</th>
                            <th class="text-end">Cant.</th>
                            <th>Almacén</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultimosMovimientos as $mov)
                            <tr>
                                <td>{{ $mov->created_at->format('d/m H:i') }}</td>
                                <td>{{ ucfirst($mov->tipo) }}</td>
                                <td>{{ $mov->elementoProducto->descripcion ?? '—' }}</td>
                                <td class="text-end">{{ $mov->cantidad > 0 ? '+' : '' }}{{ $mov->cantidad }}</td>
                                <td>{{ $mov->almacen->name ?? '—' }}</td>
                                <td>{{ $mov->usuario->name ?? 'sistema' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted">Sin movimientos registrados.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>