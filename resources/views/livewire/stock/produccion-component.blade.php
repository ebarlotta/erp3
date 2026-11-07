<div>
    <div class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Módulo de Fabricación</h4>
            <button wire:click="create" class="btn btn-primary btn-sm sombreado">+ Fabricar Producto</button>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" wire:model="search" wire:keydown.enter="Filtrar" wire:keyup="Filtrar" class="form-control" placeholder="Buscar producto fabricable...">
            </div>
            <div class="col-md-2">
                <button wire:click="Filtrar" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
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
                                <button wire:click="create" class="btn btn-sm btn-success">Fabricar</button>
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