<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Stock por Almacén</h4>
            <div class="d-flex gap-2">
                         <button wire:click="create" class="btn btn-primary btn-sm sombreado"><i class="fas fa-plus me-2"></i> Nuevo Movimiento</button>
                <a href="{{ route('stock.productos') }}"><button class="btn btn-primary btn-sm sombreado">Productos</button></a>
                                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><i class="fas fa-arrow-left"></i> Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3 sombreado py-2">
            <div class="col-5 col-md-4">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar producto...">
            </div>
            <div class="col-4 col-md-4">
                <select wire:model="filtro_almacen" wire:change="Filtrar" class="form-control round shadow-md">
                    <option value="">Todos los almacenes</option>
                    @foreach($almacenes as $alm)
                        <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 col-md-2">
                <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </div>
{{-- <style>
/* CSS para obligar a las columnas a ir abajo */
.tabla-hibrida tr {
    display: flex;
    flex-wrap: wrap;
}
.tabla-hibrida th, .tabla-hibrida td {
    flex: 1 1 33.33%; /* Ocupan un tercio del espacio horizontal */
} --}}
</style>
        <div class="table-responsive sombreado mb-2">
            <table class="table table-striped table-sm tabla-hibrida">
                <thead>
                    <tr class="fondo_encabezado">
                        <th>Almacén</th>
                        <th>Producto</th>
                        <th>Existencia</th>
                        <th>Mínimo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
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
                                    <span class="badge bg-danger sombreado" style="font-size: 1.1rem;">Bajo mínimo</span>
                                @elseif($stock->stock_minimo > 0 && $stock->existencia > $stock->stock_minimo * 3)
                                    <span class="badge bg-warning text-dark sombreado" style="font-size: 1.1rem;">Sobrestock</span>
                                @else
                                    <span class="badge bg-success sombreado" style="font-size: 1.1rem;">OK</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="flex justify-center">
                                    <div class="sm:flex justify-center">
                                        <!-- Desde 640 en adelante -->
                                        <button wire:click="edit({{ $stock->id }})" class="hidden lg:flex bg-green-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-4 mr-2 rounded sombreado">
                                            <i class="fas fa-archive mr-1 mt-1"></i> Kardex
                                        </button>
                                        <!-- Menos 640 en adelante -->
                                        <button wire:click="edit({{ $stock->id }})" class="lg:hidden bg-green-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-2 mt-1 ml-1 rounded sombreado">
                                            <i class="fas fa-archive"></i>
                                        </button>
                                        {{-- <a href="{{ route('stock.movimientos', $stock->elemento_producto_id) }}" class="btn btn-sm btn-info text-white sombreado" title="Kardex"><i class="fas fa-archive"></i> Kardex</a> --}}
                                    </div>
                                    <div class="sm:flex justify-center">
                                        <!-- Desde 640 en adelante -->
                                        <button wire:click="edit({{ $stock->id }})" class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-4 mr-2 rounded sombreado">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                            Editar
                                        </button>
                                        <!-- Menos 640 en adelante -->
                                        <button wire:click="edit({{ $stock->id }})" class="lg:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-1 mt-1 ml-1 rounded sombreado">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                        {{-- <button wire:click="edit({{ $stock->id }})" class="btn btn-sm btn-warning sombreado">Editar</button> --}}
                                    </div>
                                    <div class="sm:flex justify-center">
                                        <!-- Eliminar -->
                                        <div class="flex justify-center">
                                        <!-- Desde 640 en adelante -->
                                        <button wire:click="delete({{ $stock->id }})" wire:confirm="¿Eliminar registro de stock?" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-4 rounded mt-1w sombreado">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Eliminar
                                        </button>
                                        <!-- Menos 640 en adelante -->
                                        <button wire:click="delete({{ $stock->id }})" wire:confirm="¿Eliminar registro de stock?" class="lg:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1 ml-1 sombreado">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- <button wire:click="delete({{ $stock->id }})" wire:confirm="¿Eliminar registro de stock?" class="btn btn-sm btn-danger sombreado">Eliminar</button> --}}
                                </div>
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