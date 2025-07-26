@props(['title','mostrar'])
<div class="col-6">
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title"><b>{{ $title }}</b></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($mostrar=='papeles') 
                <x-imprenta.card-table-component listado="{{ $mostrar }}"></x-imprenta.card-table-component>
                @if($this->vpseudo_modal=='papeles')
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-3">
                            <div>Tamaño</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-3">
                            <div>Gramaje</div>
                            <div><input type="text" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-3">
                            <div>Precio</div>
                            <div><input type="number" class="form-control" value="" wire:model="param3"></div>
                        </div>
                        <div class="col-3">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('papeles')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                @endif
            @endif
            @if($mostrar=='lados') 
                <x-imprenta.card-table-component listado="{{ $mostrar }}"></x-imprenta.card-table-component> 
                @if($this->vpseudo_modal=='lados')
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-4">
                            <div>Lados</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-4">
                            <div>Factor</div>
                            <div><input type="number" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('lados')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                @endif
            @endif
            @if($mostrar=='sistemas') 
                <x-imprenta.card-table-component listado="{{ $mostrar }}"></x-imprenta.card-table-component> 
                @if($this->vpseudo_modal=='sistemas')
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-4">
                            <div>Sistema</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-4">
                            <div>Factor</div>
                            <div><input type="number" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('sistemas')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                @endif            
            @endif
            @if($mostrar=='tipos') 
                <x-imprenta.card-table-component listado="{{ $mostrar }}"></x-imprenta.card-table-component> 
                @if($this->vpseudo_modal=='tipos')
                    <div class="flex d-flex col-12 m-1 border p-2 ml-2 mr-2">
                        <div class="col-4">
                            <div>Nombre</div>
                            <div><input type="text" class="form-control" value="" wire:model="param1"></div>
                        </div>
                        <div class="col-4">
                            <div>Factor</div>
                            <div><input type="number" class="form-control" value="" wire:model="param2"></div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-green-300 mt-1" wire:click="agregar('tipos')">Aceptar</button>
                            <button type="button" class="col-12 text-center mx-2 rounded-md bg-red-300 mt-2" wire:click="hide_pseudo_modal()">Cancelar</button>
                        </div>
                    </div>
                @endif 
            @endif
        </div>
    </div>
</div>
