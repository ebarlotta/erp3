<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $almacen_id ? 'Editar Almacén' : 'Nuevo Almacén' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModalPopover"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" wire:model="name" class="form-control" placeholder="Nombre del almacén">
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" wire:model="direccion" class="form-control" placeholder="Opcional">
                        @error('direccion') <span class="text-danger small">{{ $message }}</span> @enderror
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