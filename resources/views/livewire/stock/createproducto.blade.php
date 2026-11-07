<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog modal-lg" style="width: 80%; max-width: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $producto_id ? 'Editar Producto' : 'Nuevo Producto' }}</h5>
                <button type="button" class="btn-close" wire:click="$set('isModalOpen', false)"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    @if($errors->has('general'))
                        <div class="alert alert-danger">{{ $errors->first('general') }}</div>
                    @endif

                    <h6 class="text-primary border-bottom pb-2 mb-3">Datos Base (Elemento)</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label small">Nombre Genérico</label>
                            <input type="text" wire:model="name" class="form-control" placeholder="Ej: Azúcar, Café">
                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Categoría</label>
                            <select wire:model="categoria_id" class="form-control round shadow-md">
                                <option value="" @selected(true)>Seleccione...</option>
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->nombrecategoria }}</option>
                                @endforeach
                            </select>
                            @error('categoria_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Unidad</label>
                            <select wire:model="unidad_id" class="form-control round shadow-md">
                                <option value="">Seleccione...</option>
                                @foreach($unidades as $uni)
                                    <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                                @endforeach
                            </select>
                            @error('unidad_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-1 mb-3">
                            <label class="form-label small">Precio Compra</label>
                            <input type="number" step="0.01" wire:model="precio_compra" class="form-control">
                        </div>
                        <div class="col-md-1 mb-3">
                            <label class="form-label small">Stock Mínimo</label>
                            <input type="number" step="0.01" wire:model="stock_minimo" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Vencimiento</label>
                            <input type="date" wire:model="vencimiento" class="form-control">
                            @error('vencimiento') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <h6 class="text-primary border-bottom pb-2 mt-3 mb-3">Datos del Producto</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label small">Descripción del Producto</label>
                            <input type="text" wire:model="descripcion" class="form-control" placeholder="Ej: Azúcar Ledesma 1kg">
                            @error('descripcion') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Lote Base</label>
                            <input type="text" wire:model="lote" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Código de Barra</label>
                            <input type="text" wire:model="barra" class="form-control" placeholder="Opcional">
                            @error('barra') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Precio Venta</label>
                            <input type="number" step="0.01" wire:model="precio_venta" class="form-control">
                            @error('precio_venta') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Descuento (%)</label>
                            <input type="number" step="0.01" wire:model="descuento" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Desc. Especial ($)</label>
                            <input type="number" step="0.01" wire:model="descuento_especial" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Calificación (0 a 5)</label>
                            <input type="number" step="0.1" wire:model="calificacion" class="form-control" max="5">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Proveedor</label>
                            <select wire:model="proveedor_id" class="form-control round shadow-md">
                                <option value="">Seleccione...</option>
                                @foreach($proveedores as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                            @error('proveedor_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label small">Estado</label>
                            <select wire:model="estado_id" class="form-control round shadow-md">
                                <option value="">Seleccione...</option>
                                @foreach($estados as $est)
                                    <option value="{{ $est->id }}">{{ $est->name }}</option>
                                @endforeach
                            </select>
                            @error('estado_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4 mb-3 flex">
                            <div class="col-md-6">
                                <label class="form-label small">Imagen del Producto</label>
                                <input type="file" wire:model="imagen" class="form-control" accept="image/*" class="col-md-2">
                            
                                <div wire:loading wire:target="imagen" class="text-primary small mt-1">Subiendo imagen...</div>
                            </div>
                            <div class="col-md-6">
                                @error('imagen') <span class="text-danger small">{{ $message }}</span> @enderror
                                <!-- Vista previa de la imagen -->
                                @if ($imagen)
                                    <img src="{{ $imagen->temporaryUrl() }}" class="img-thumbnail mt-2" style="max-height: 100px;" class="col-md-2">
                                @elseif($ruta)
                                    <img src="{{ asset('storage/' . $ruta) }}" class="img-thumbnail mt-2" style="max-height: 100px;" class="col-md-2">
                                @endif
                            </div>
                        </div>

                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('isModalOpen', false)">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>