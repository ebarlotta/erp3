<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fabricar Producto</h5>
                <button type="button" class="btn-close" wire:click="$set('isModalOpen', false)"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    @if($errors->has('general'))
                        <div class="alert alert-danger">{{ $errors->first('general') }}</div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Almacén (Origen y Destino)</label>
                            <select wire:model.live="almacen_id" class="form-control round shadow-md">
                                <option value="">Seleccione...</option>
                                @foreach($almacenes as $alm)
                                    <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                                @endforeach
                            </select>
                            @error('almacen_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Producto a Fabricar</label>
                            <select wire:model.live="producto_terminado_id" class="form-control round shadow-md">
                                <option value="">Seleccione...</option>
                                @foreach(\App\Models\Elementos\ElementoProducto::whereHas('recetas')->get() as $pt)
                                    <option value="{{ $pt->id }}">{{ $pt->descripcion }}</option>
                                @endforeach
                            </select>
                            @error('producto_terminado_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Cantidad a Fabricar</label>
                            <input type="number" step="0.01" wire:model.live="cantidad_a_fabricar" class="form-control">
                            @error('cantidad_a_fabricar') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    @if(count($detalle_receta) > 0)
                        <div class="card bg-light mt-3">
                            <div class="card-header py-2"><strong>Consumo de Materias Primas</strong></div>
                            <ul class="list-group list-group-flush">
                                @foreach($detalle_receta as $ing)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                        <span>{{ $ing['nombre'] }}</span>
                                        <span>
                                            Requerido: <strong>{{ $ing['necesario'] }}</strong> | 
                                            Disponible: 
                                            <span class="{{ $ing['suficiente'] ? 'text-success' : 'text-danger fw-bold' }}">
                                                {{ $ing['disponible'] }}
                                            </span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('isModalOpen', false)">Cancelar</button>
                    <button type="submit" class="btn btn-success" @if($error_stock) disabled @endif>Confirmar Fabricación</button>
                </div>
            </form>
        </div>
    </div>
</div>