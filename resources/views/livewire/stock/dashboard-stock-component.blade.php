<div>
    <div class="container-fluid pt-3">
        <h4 class="mb-3">Stock — Panel General</h4>

        {{-- Tarjetas por almacén --}}
        <div class="row">
            @forelse($almacenes as $almacen)
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body">
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
        <div class="card mb-3">
            <div class="card-header"><strong>⚠ Alertas</strong></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $bajoMinimo }} productos bajo stock mínimo</span>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver</a>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $porVencer }} productos vencen en &lt; 30 días</span>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver</a>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $sinMovimiento }} productos sin movimiento (90 días)</span>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver</a>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $sobrestock }} productos con sobrestock</span>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver</a>
                </li>
            </ul>
        </div>

        {{-- Últimos movimientos --}}
        <div class="card">
            <div class="card-header"><strong>Últimos movimientos</strong></div>
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
                                <td>{{ $mov->elemento->name ?? '—' }}</td>
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