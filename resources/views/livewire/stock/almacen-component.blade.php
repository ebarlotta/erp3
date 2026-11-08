<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Almacenes</h4>
            <div class="d-flex gap-2">
                         <button wire:click="create" class="btn btn-primary btn-sm sombreado"><i class="fas fa-plus me-2"></i> Nuevo Almacén</button>
                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><i class="fas fa-arrow-left"></i> Volver</button></a>
            </div>  
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="input-group mb-3 sombreado py-2 px-2">
            <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar por nombre...">
            <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
        </div>

        <div class="table-responsive sombreado">
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="fondo_encabezado">
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($almacenes as $almacen)
                        <tr>
                            <td>{{ $almacen->name }}</td>
                            <td>{{ $almacen->direccion ?? '—' }}</td>
                            <td class="text-end">
                                <button wire:click="edit({{ $almacen->id }})" class="btn btn-sm btn-warning sombreado">Editar</button>
                                <button wire:click="delete({{ $almacen->id }})" wire:confirm="¿Eliminar almacén?" class="btn btn-sm btn-danger sombreado">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted">Sin almacenes registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $almacenes->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createalmacen')
        @endif
    </div>
</div>