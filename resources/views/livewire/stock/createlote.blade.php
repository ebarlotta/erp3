<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $lote_id ? 'Editar Lote' : 'Nuevo Lote' }}</h5>
                <button type="button" class="btn-close" wire:click="$set('isModalOpen', false)"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Almacén</label>
                        <select wire:model="almacen_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($almacenes as $alm)
                                <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                            @endforeach
                        </select>
                        @error('almacen_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Producto</label>
                        <select wire:model="elemento_producto_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($productos as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('elemento_producto_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Código de Lote</label>
                            <input type="text" wire:model="lote" class="form-control" placeholder="Ej: L-2024A">
                            @error('lote') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Vencimiento</label>
                            <input type="date" wire:model="vencimiento" class="form-control">
                            @error('vencimiento') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Existencia Inicial (Opcional)</label>
                        <input type="number" step="0.01" wire:model="existencia" class="form-control">
                        @error('existencia') <span class="text-danger small">{{ $message }}</span> @enderror
                        <small class="text-muted">Nota: Lo ideal es que el stock de lotes se cargue desde el módulo de Movimientos (Entradas).</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('isModalOpen', false)">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>