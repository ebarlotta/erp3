<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Ajuste de Inventario</h5>
                <button type="button" class="btn-close" wire:click="$set('isModalOpen', false)"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body flex flex-wrap">
                    
                    @if($errors->has('general'))
                        <div class="alert alert-danger">{{ $errors->first('general') }}</div>
                    @endif

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Almacén</label>
                        <select wire:model.live="almacen_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($almacenes as $alm)
                                <option value="{{ $alm->id }}">{{ $alm->name }}</option>
                            @endforeach
                        </select>
                        @error('almacen_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Producto</label>
                        <select wire:model.live="elemento_producto_id" class="form-control round shadow-md">
                            <option value="">Seleccione...</option>
                            @foreach($productos as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('elemento_producto_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    {{-- Panel de Stock Teórico y Diferencia --}}
                    <div class="card bg-light mb-3 shadow-sm border-0 col-md-6">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">Stock en Sistema:</span>
                                <span class="fs-5 fw-bold">{{ number_format($stock_teorico, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Diferencia:</span>
                                @if($diferencia > 0)
                                    <span class="fs-5 fw-bold text-success">+{{ number_format($diferencia, 2) }} (Sobra)</span>
                                @elseif($diferencia < 0)
                                    <span class="fs-5 fw-bold text-danger">{{ number_format($diferencia, 2) }} (Falta)</span>
                                @else
                                    <span class="fs-5 fw-bold text-muted">0.00</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Cantidad Real Contada</label>
                        <input type="number" step="0.01" wire:model.live="cantidad_real" class="form-control" placeholder="Ingrese el stock físico real">
                        @error('cantidad_real') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Motivo del Ajuste</label>
                        <select wire:model="motivo" class="form-control round shadow-md">
                            <option value="">Seleccione un motivo...</option>
                            <option value="Conteo Físico">Conteo Físico</option>
                            <option value="Merma / Rotura">Merma / Rotura</option>
                            <option value="Vencimiento">Vencimiento</option>
                            <option value="Error de Carga">Error de Carga</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('motivo') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('isModalOpen', false)">Cancelar</button>
                    <button type="submit" class="btn btn-primary" @if($diferencia == 0) disabled @endif>Aplicar Ajuste</button>
                </div>
            </form>
        </div>
    </div>
</div>