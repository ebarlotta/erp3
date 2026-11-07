<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Receta: {{ $receta_producto_nombre }}</h5>
                <button type="button" class="btn-close" wire:click="closeRecetaModal"></button>
            </div>
            <div class="modal-body">
                
                @if (session()->has('message_receta'))
                    <div class="alert alert-success py-2">{{ session('message_receta') }}</div>
                @endif

                {{-- Formulario para agregar ingrediente --}}
                <div class="card bg-light mb-4">
                    <div class="card-body" style="display:grid;">
                        <h6 class="card-title">Agregar / Modificar Materia Prima</h6>
                        <form wire:submit.prevent="agregarIngrediente">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <select wire:model="nueva_materia_id" class="form-control round shadow-md">
                                        <option value="">Seleccione materia prima...</option>
                                        @foreach(\App\Models\Elementos\ElementoProducto::select('elemento_productos.*')
                                            ->join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                                            ->where('elementos.empresa_id', session('empresa_id'))
                                            ->orderBy('elementos.name')->get() as $mp)
                                            <option value="{{ $mp->id }}">{{ $mp->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @error('nueva_materia_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="number" step="0.01" wire:model="nueva_cantidad" class="form-control form-control-sm" placeholder="Cantidad">
                                    @error('nueva_cantidad') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button type="submit" class="btn btn-sm btn-primary w-100">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tabla de ingredientes actuales --}}
                <h6>Ingredientes de la Receta:</h6>
                <table class="table table-sm table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Materia Prima</th>
                            <th class="text-end">Cantidad</th>
                            <th class="text-end">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($receta_actual as $ing)
                            <tr>
                                <td>{{ $ing->materiaPrima->descripcion ?? '—' }}</td>
                                <td class="text-end">{{ number_format($ing->cantidad, 2) }}</td>
                                <td class="text-end">
                                    <button type="button" wire:click="eliminarIngrediente({{ $ing->id }})" class="btn btn-sm btn-danger py-0 px-2" wire:confirm="¿Quitar este ingrediente?">
                                        &times;
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No hay ingredientes cargados en esta receta.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeRecetaModal">Cerrar</button>
            </div>
        </div>
    </div>
</div>