<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">
            <h1 class="h-5">No tiene permiso para acceder a este módulo.</h1>
            @if(is_null(session('empresa_id')))
                <h1 class="h-5">Asegurese de seleccionar la empresa.</h1> 
            @endif
        </div>
    </div>
</div>