<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Movimiento</h5>
                <button type="button" class="btn-close" wire:click="closeModalPopover"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body flex flex-wrap">
                    
                    @if($errors->has('general'))
                        <div class="alert alert-danger">{{ $errors->first('general') }}</div>
                    @endif

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tipo de Movimiento</label>
                        <select wire:model="tipo" class="form-control round shadow-md">
                            <option value="entrada">Entrada (+)</option>
                            <option value="salida">Salida (-)</option>
                            <option value="ajuste">Ajuste (Fijar Stock)</option>
                        </select>
                        @error('tipo') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Almacén</label>
                        <select wire:model="almacen_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($almacenes as $alm)
                                <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                            @endforeach
                        </select>
                        @error('almacen_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Producto</label>
                        <select wire:model="elemento_producto_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($productos as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('elemento_producto_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">
                            {{ $tipo === 'ajuste' ? 'Nuevo Stock Real (Fijar a)' : 'Cantidad' }}
                        </label>
                        <input type="number" step="0.01" wire:model="cantidad" class="form-control">
                        @error('cantidad') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label">Motivo / Nota (Opcional)</label>
                        <input type="text" wire:model="motivo" class="form-control" placeholder="Ej: Compra factura #123, Merma, etc.">
                        @error('motivo') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModalPopover">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>