<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Control de Stock — Movimientos</h4>
            <div class="d-flex gap-2">
                <button wire:click="create" class="btn btn-primary btn-sm sombreado">+ Registrar Movimiento</button>
                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><- Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        {{-- Filtros --}}
        <div class="row mb-3 sombreado">
            <div class="col-md-3">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar producto...">
            </div>
            <div class="col-md-3">
                <select wire:model="filtro_almacen" wire:change="Filtrar" class="form-control round shadow-md">
                    <option value="">Todos los almacenes</option>
                    @foreach($almacenes as $alm)
                        <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model="filtro_tipo" wire:change="Filtrar" class="form-control round shadow-md">
                    <option value="">Todos los tipos</option>
                    <option value="entrada">Entradas</option>
                    <option value="salida">Salidas</option>
                    <option value="ajuste">Ajustes</option>
                </select>
            </div>
            <div class="col-md-2">
                <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </div>
@if($filtro_producto)
    <div class="alert alert-info d-flex justify-content-between align-items-center">
        <span>Mostrando el Kardex del producto seleccionado.</span>
        <a href="{{ route('stock.movimientos') }}" class="btn btn-sm btn-outline-dark">Ver todos los movimientos</a>
    </div>
@endif
        <div class="table-responsive sombreado">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Producto</th>
                        <th>Almacén</th>
                        <th>Motivo</th>
                        <th class="text-end">Cant.</th>
                        <th class="text-end">Saldo</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movimientos as $mov)
                        <tr>
                            <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($mov->tipo == 'entrada') 
                                    <span class="badge bg-success">Entrada</span>
                                @elseif($mov->tipo == 'salida') 
                                    <span class="badge bg-danger">Salida</span>
                                @elseif($mov->tipo == 'ajuste') 
                                    @if($mov->cantidad > 0)
                                        <span class="badge bg-info text-dark">Ajuste (+)</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Ajuste (-)</span>
                                    @endif
                                @endif
                            </td>
                            <td>{{ $mov->elementoProducto->descripcion ?? '—' }}</td>
                            <td>{{ $mov->almacen->name ?? '—' }}</td>
                            <td>{{ $mov->motivo }}</td>
                            <td class="text-end {{ $mov->cantidad > 0 ? 'text-success' : ($mov->cantidad < 0 ? 'text-danger' : '') }}">
                                {{ $mov->cantidad > 0 ? '+' : '' }}{{ number_format($mov->cantidad, 2) }}
                            </td>
                            <td class="text-end">{{ number_format($mov->saldo, 2) }}</td>
                            <td>{{ $mov->usuario->name ?? 'Sistema' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center text-muted">Sin movimientos registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $movimientos->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createmovimiento')
        @endif
    </div>
</div>