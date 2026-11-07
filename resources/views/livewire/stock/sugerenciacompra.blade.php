<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Sugerencia de Compra</h5>
                <button type="button" class="btn-close btn-close-white sombreado" wire:click="closeModalPopover"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>Producto:</strong></span>
                        <span>{{ $producto_nombre }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>Almacén:</strong></span>
                        <span>{{ $almacen_nombre }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>Stock Actual:</strong></span>
                        <span class="text-danger">{{ $existencia_actual }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>Stock Mínimo:</strong></span>
                        <span>{{ $stock_minimo }}</span>
                    </li>
                </ul>

                <div class="alert alert-info text-center">
                    <p class="mb-1">Cantidad sugerida a comprar:</p>
                    <h2 class="mb-0">{{ $cantidad_sugerida }} <small class="fs-6">unidades</small></h2>
                    <small class="text-muted">(Calculado para cubrir el mínimo + stock de seguridad)</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModalPopover">Cerrar</button>
                <!-- Acá podrías agregar un botón para generar Orden de Compra en el futuro -->
                <!-- <button type="button" class="btn btn-success">Generar Orden de Compra</button> -->
            </div>
        </div>
    </div>
</div>