<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Alertas de Stock Mínimo</h4>
            <div class="d-flex gap-2">
                                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><i class="fas fa-arrow-left"></i> Volver</button></a>
            </div>
        </div>

        {{-- Filtros --}}
        <div class="row mb-3 sombreado py-2 px-2">
            <div class="col-md-5">
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
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr class="fondo_encabezado">
                        <th>Producto</th>
                        <th>Almacén</th>
                        <th class="text-end">Existencia Actual</th>
                        <th class="text-end">Mínimo Requerido</th>
                        <th class="text-end">Faltante</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alertas as $alerta)
                        <tr>
                            <td>{{ $alerta->elementoProducto->descripcion ?? '—' }}</td>
                            <td>{{ $alerta->almacen->name ?? '—' }}</td>
                            <td class="text-end text-danger font-weight-bold">{{ number_format($alerta->existencia, 2) }}</td>
                            <td class="text-end">{{ number_format($alerta->stock_minimo, 2) }}</td>
                            <td class="text-end text-danger">{{ number_format($alerta->stock_minimo - $alerta->existencia, 2) }}</td>
                            <td class="text-end">
                                <button wire:click="sugerirCompra({{ $alerta->id }})" class="btn btn-sm btn-primary sombreado">Sugerir Compra</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-success py-4"><strong>¡Todo en orden! No hay productos por debajo del stock mínimo.</strong></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $alertas->links() }}

        @if($isModalOpen)
            @include('livewire.stock.sugerenciacompra')
        @endif
    </div>
</div>