<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $stock_id ? 'Editar Stock' : 'Nuevo Stock' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModalPopover"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body flex flex-wrap">
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label">Almacén</label>
                        <select wire:model="almacen_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($almacenes as $alm)
                                <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                            @endforeach
                        </select>
                        @error('almacen_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label">Producto (Elemento)</label>
                        <select wire:model="elemento_producto_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($elementos as $el)
                                <option value="{{ $el->id }}">{{ $el->elemento_name }}</option>
                            @endforeach
                        </select>
                        @error('elemento_producto_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="row flex">
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Existencia</label>
                            <input type="number" step="0.01" wire:model="existencia" class="form-control" onfocus="this.select();">
                            @error('existencia') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Stock mínimo</label>
                            <input type="number" step="0.01" wire:model="stock_minimo" class="form-control" onfocus="this.select();">
                            @error('stock_minimo') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModalPopover">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>