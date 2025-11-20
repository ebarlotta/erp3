<div>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
            integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </head>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item p-3 bg-red-100 rounded-3 ml-2" role="presentation">
            <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Menúes</a>
        </li>
        <li class="nav-item p-3 bg-red-200 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Medicamentos</a>
        </li>
        <li class="nav-item p-3 bg-red-300 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Descartables</a>
        </li>
        <li class="nav-item p-3 bg-red-400 rounded-3 ml-2" role="presentation">
            <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Gráficos</a>
        </li>
    </ul>

    <div class="tab-content pt-5" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header ui-sortable-handle" style="cursor: move; justify-content: space-between;">
                    <h3 class="card-title ml-3">Datos de Expediciones</h3>
                    <div class="flex ml-4" style="padding-left: 60px;">
                        Fecha: <input type="date" wire:model="fecha" wire:change="CargarMenues()"
                            style="background-color: lightgreen; border-radius: 5px; padding: 0px 5px 0px 5px; margin-left: 7px;">
                        {{ $fecha }}
                    </div>
                </div>
            </div>

            <x-expedirMomento momento="1" cerrado="{{ $cerradoDesayuno }}" titulo="Desayuno"></x-expedirMomento>
            <x-expedirMomento momento="2" cerrado="{{ $cerradoAlmuerzo }}" titulo="Almuerzo"></x-expedirMomento>
            <x-expedirMomento momento="3" cerrado="{{ $cerradoMerienda }}" titulo="Merienda"></x-expedirMomento>
            <x-expedirMomento momento="4" cerrado="{{ $cerradoCena }}" titulo="Cena"></x-expedirMomento>

        </div>

        {{-- <x-dialog-modal class="max-w-lg w-full mt-10" wire:model="confirmacion" style="margin-top: 100px">
            <x-slot name="title" style="margin-top: 100px; padding-top: 100px;">
                Cerrar Servicio
            </x-slot>
            <x-slot name="content">
                <x-label>Está seguro de que quiere cerrar el servicio de {{ $servicioacerrar }} del día
                    {{ date('d-m-Y', strtotime($fecha)) }}?</x-label>
            </x-slot>
            <x-slot name="footer">
                <x-button class="btn bg-yellow-300 btn-warning mr-2"
                    wire:click="CambiarEstado({{ $servicioacerrar }})">Si, cerrar</x-button>
                <x-button class="btn btn-info" wire:click="$set('confirmacion',false)">Volver sin cerrar</x-button>
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal class="max-w-lg w-full mt-10" wire:model="agregar" style="margin-top: 100px">
            <x-slot name="title" style="margin-top: 100px; padding-top: 100px;">
                Agregar Servivio
            </x-slot>
            <x-slot name="content">
                <x-label>Seleccione los menúes a agregar</x-label>
                <div class="flex d-flex">
                    <div class="col-5">
                        <x-label>Actor</x-label>
                        <select class="form-control" wire:model="actor_id_agregar">
                            <option value="">Seleccione un actor</option>
                            @foreach ($agregarActores as $actor)
                                <option value="{{ $actor['id'] }}">{{ $actor['nombre'] }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-5">
                        <x-label>Menú</x-label>
                        <select class="form-control" wire:model="menu_id_agregar">
                            <option value="">Seleccione un menú</option>
                            @foreach ($agregarMenu as $menu)
                                <option value="{{ $menu['id'] }}">{{ $menu['nombremenu'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <x-label>Cantidad</x-label>
                        <x-input type="number" class="form-control" wire:model="cantidad_agregar"
                            value="1"></x-input>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-button class="btn bg-yellow-300 btn-warning mr-2" wire:click="AgregarMenu()">Agregar</x-button>
                <x-button class="btn btn-info" wire:click="$set('agregar',false)">Cerrar</x-button>
            </x-slot>
        </x-dialog-modal> --}}
        <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">Medicamentos
            Expedidos</div>
        <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">Descartables
            Expedidos</div>
        {{-- Comienza Gráficas --}}
        <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
            {{-- <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
            </script> --}}


            {{-- En tu vista --}}
            <div class="flex d-flex flex-wrap">

                <div class="col-md-6 col-xl-4  ">
                    <x-chart
                        type="pie"
                        title="Ventas Mensuales 12"
                        :labels="['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']"
                        :data="[12, 19, 3, 5, 2, 3]"
                        height="320px"
                        class="mt-2"
                    />
                </div>

                <!-- Gráfico de Barras -->
                <div class="col-md-6 col-xl-4  ">
                    <x-chart
                        type="bar"
                        title="Ventas Mensuales"
                        :labels="['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']"
                        :data="[12000, 19000, 15000, 18000, 22000]"
                        height="320px"
                        class="mt-2"
                    />
                </div>

                <!-- Gráfico de Línea -->
                <div class="col-md-6 col-xl-4  ">
                    <x-chart
                        type="line"
                        title="Crecimiento de Usuarios"
                        :labels="['2020', '2021', '2022', '2023', '2024']"
                        :data="[100, 250, 500, 1200, 2000]"
                        height="320px"
                        class="mt-2"
                    />
                </div>

                <!-- Colores personalizados -->
                <div class="col-md-6 col-xl-4  ">
                    <x-chart
                        type="pie"
                        title="Satisfacción del Cliente"
                        :labels="['Muy Satisfecho', 'Satisfecho', 'Neutral', 'Insatisfecho']"
                        :data="[60, 25, 10, 5]"
                        :colors="['#10B981', '#3B82F6', '#6B7280', '#EF4444']"
                        height="320px"
                        class="mt-2"
                    />
                </div>

                <!-- Tema corporativo -->
                <div class="col-md-6 col-xl-4  ">
                    <x-chart
                        type="bar"
                        title="Metas Cumplidas 2024"
                        :labels="['Ene', 'Feb', 'Mar', 'Abr', 'May']"
                        :data="[85, 92, 78, 95, 88]"
                        :colors="['#1E40AF', '#1D4ED8', '#2563EB', '#3B82F6', '#60A5FA']"
                        height="320px"
                        class="mt-2"
                    />

                </div>
                {{-- Termina Gráficas --}}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</div>

