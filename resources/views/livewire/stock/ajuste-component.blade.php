<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Historial de Ajustes de Inventario</h4>
            <div class="d-flex gap-2">
                         <button wire:click="create" class="btn btn-primary btn-sm sombreado"><i class="fas fa-plus me-2"></i> Nuevo Ajuste</button>
                                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><i class="fas fa-arrow-left"></i> Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3 px-2 py-2 sombreado">
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
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr class="fondo_encabezado">
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Almacén</th>
                        <th>Motivo</th>
                        <th class="text-end">Diferencia</th>
                        <th class="text-end">Stock Final</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ajustes as $ajuste)
                        <tr>
                            <td>{{ $ajuste->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $ajuste->elementoProducto->descripcion ?? '—' }}</td>
                            <td>{{ $ajuste->almacen->name ?? '—' }}</td>
                            <td>{{ $ajuste->motivo }}</td>
                            <td class="text-end fw-bold {{ $ajuste->cantidad > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $ajuste->cantidad > 0 ? '+' : '' }}{{ number_format($ajuste->cantidad, 2) }}
                            </td>
                            <td class="text-end">{{ number_format($ajuste->saldo, 2) }}</td>
                            <td>{{ $ajuste->usuario->name ?? 'Sistema' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">No hay ajustes registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $ajustes->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createajuste')
        @endif
    </div>
</div>