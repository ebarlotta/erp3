<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Stock por Almacén</h4>
            <div class="d-flex gap-2">
                <button wire:click="create" class="btn btn-primary btn-sm sombreado">+ Nuevo Movimiento</button>
                <a href="{{ route('stock.productos') }}"><button class="btn btn-primary btn-sm sombreado">Productos</button></a>
                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><- Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3 sombreado">
            <div class="col-md-4">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar producto...">
            </div>
            <div class="col-md-4">
                <select wire:model="filtro_almacen" wire:change="Filtrar" class="form-control round shadow-md">
                    <option value="">Todos los almacenes</option>
                    @foreach($almacenes as $alm)
                        <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </div>

        <div class="table-responsive sombreado">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Almacén</th>
                        <th>Producto</th>
                        <th class="text-end">Existencia</th>
                        <th class="text-end">Mínimo</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stocks as $stock)
                        <tr>
                            <td>{{ $stock->almacen->name ?? '—' }}</td>
                            <td>{{ $stock->elementoProducto->descripcion ?? '—' }}</td>
                            <td class="text-end">{{ number_format($stock->existencia, 2) }}</td>
                            <td class="text-end">{{ number_format($stock->stock_minimo, 2) }}</td>
                            <td>
                                @if($stock->existencia < $stock->stock_minimo)
                                    <span class="badge bg-danger">Bajo mínimo</span>
                                @elseif($stock->stock_minimo > 0 && $stock->existencia > $stock->stock_minimo * 3)
                                    <span class="badge bg-warning text-dark">Sobrestock</span>
                                @else
                                    <span class="badge bg-success">OK</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('stock.movimientos', $stock->elemento_producto_id) }}" class="btn btn-sm btn-info text-white sombreado">Kardex</a>
                                <button wire:click="edit({{ $stock->id }})" class="btn btn-sm btn-warning sombreado">Editar</button>
                                <button wire:click="delete({{ $stock->id }})" wire:confirm="¿Eliminar registro de stock?" class="btn btn-sm btn-danger sombreado">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">Sin registros de stock.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $stocks->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createstockalmacen')
        @endif
    </div>
</div>