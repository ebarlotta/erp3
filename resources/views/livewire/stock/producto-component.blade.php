<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Catálogo de Productos</h4>
            <div class="d-flex gap-2">
                <button wire:click="create" class="btn btn-primary btn-sm sombreado">+ Nuevo Producto</button>
                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><- Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3 sombreado">
            <div class="col-md-6">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar por nombre, descripción o código de barra...">
            </div>
            <div class="col-md-2">
                <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </div>

        <div class="table-responsive sombreado">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre (Elemento)</th>
                        <th>Descripción (Prod)</th>
                        <th>Barra</th>
                        <th>Categoría</th>
                        <th class="text-end">P. Compra</th>
                        <th class="text-end">P. Venta</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $prod)
                        <tr>
                            <td>
                                @if($prod->ruta)
                                    <img src="{{ asset('storage/' . $prod->ruta) }}" alt="Img" style="height: 40px; width: 40px; object-fit: cover;" class="rounded">
                                @else
                                    <span class="badge bg-secondary">Sin foto</span>
                                @endif
                            </td>
                            <td>{{ $prod->elemento->name ?? '—' }}</td>
                            <td>{{ $prod->descripcion }}</td>
                            <td><span class="badge bg-secondary">{{ $prod->barra }}</span></td>
                            <td>{{ $prod->elemento->categoria->nombrecategoria ?? '—' }}</td>
                            <td class="text-end">${{ number_format($prod->elemento->precio_compra ?? 0, 2) }}</td>
                            <td class="text-end">${{ number_format($prod->precio_venta, 2) }}</td>
                            <td class="text-end">
                                <!-- Botón para gestionar recetas -->
                                <button wire:click="gestionarReceta({{ $prod->id }})" class="btn btn-sm btn-info text-white sombreado">Receta</button>

                                <button wire:click="edit({{ $prod->id }})" class="btn btn-sm btn-warning sombreado">Editar</button>
                                <button wire:click="delete({{ $prod->id }})" wire:confirm="¿Eliminar este producto? Se borrará también su registro base." class="btn btn-sm btn-danger sombreado">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">No hay productos registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $productos->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createproducto')
        @endif

        <!-- NUEVO MODAL DE RECETA -->
        @if($isRecetaModalOpen)
            @include('livewire.stock.recetaproducto')
        @endif
    </div>
</div>