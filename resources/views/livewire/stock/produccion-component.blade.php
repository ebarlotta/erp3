<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Módulo de Fabricación</h4>
            <div class="d-flex gap-2">
                <button wire:click="create" class="btn btn-primary btn-sm sombreado"><i class="fas fa-plus me-2"></i> Fabricar Producto</button>
                <a href="{{ route('stock.dashboard') }}"><button class="btn btn-primary btn-sm sombreado"><i class="fas fa-arrow-left"></i> Volver</button></a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3 sombreado px-2 py-2">
            <div class="col-md-10">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar producto fabricable...">
            </div>
            <div class="col-md-2">
                <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </div>

        <div class="table-responsive sombreado">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr class="fondo_encabezado">
                        <th>Producto Terminado</th>
                        <th>Ingredientes (Materia Prima)</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productosFabricables as $prod)
                        <tr>
                            <td>{{ $prod->descripcion }}</td>
                            <td>
                                <ul class="list-unstyled mb-0 small">
                                    @foreach($prod->recetas as $rec)
                                        <li>• {{ $rec->cantidad }} x {{ $rec->materiaPrima->descripcion }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-end">
                                <button wire:click="create" class="btn btn-sm btn-success sombreado">Fabricar</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted">No hay productos con recetas armadas. Ve a Productos -> Editar -> Receta.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $productosFabricables->links() }}

        @if($isModalOpen)
            @include('livewire.stock.createproduccion')
        @endif
    </div>
</div>