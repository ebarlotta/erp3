<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Trazabilidad de Lotes</h4>
            <div class="d-flex gap-2">
                         <button wire:click="create" class="btn btn-primary btn-sm sombreado"><i class="fas fa-plus me-2"></i> Nuevo Lote</button>
                                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><i class="fas fa-arrow-left"></i> Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3 sombreado py-2 px-2">
            <div class="col-md-4">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" class="form-control" placeholder="Buscar producto o lote...">
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
                <select wire:model="filtro_estado" wire:change="Filtrar" class="form-control round shadow-md">
                    <option value="">Todos los vencimientos</option>
                    <option value="por_vencer">Por vencer (< 30 días)</option>
                    <option value="vencidos">Vencidos</option>
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
                        <th>Lote</th>
                        <th>Vencimiento</th>
                        <th class="text-end">Existencia</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lotes as $item)
                        <tr>
                            <td>{{ $item->elementoProducto->descripcion ?? '—' }}</td>
                            <td>{{ $item->almacen->name ?? '—' }}</td>
                            <td><span class="badge bg-secondary" style="font-size: 1.1rem;">{{ $item->lote }}</span></td>
                            <td>
                                @if($item->vencimiento)
                                    @if($item->vencimiento->isPast())
                                        <span class="text-danger fw-bold">{{ $item->vencimiento->format('d/m/Y') }} (Vencido)</span>
                                    @elseif($item->vencimiento->diffInDays(now()) <= 30)
                                        <span class="text-warning fw-bold">{{ $item->vencimiento->format('d/m/Y') }} (Próximo)</span>
                                    @else
                                        {{ $item->vencimiento->format('d/m/Y') }}
                                    @endif
                                @else
                                    —
                                @endif
                            </td>
                            <td class="text-end">{{ number_format($item->existencia, 2) }}</td>
                            <td class="text-end">
                                <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-warning sombreado">Editar</button>
                                <button wire:click="delete({{ $item->id }})" wire:confirm="¿Eliminar este lote?" class="btn btn-sm btn-danger sombreado">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted">No hay lotes registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $lotes->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createlote')
        @endif
    </div>
</div>