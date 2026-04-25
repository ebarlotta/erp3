<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-white">
            {{ $project ? 'Editar Proyecto' : 'Nuevo Proyecto' }}
        </h2>
        <a href="{{ route('projects.index') }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Volver
            </button>
        </a>
        {{-- <a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-white">
            ← Volver
        </a> --}}
    </div>

    <form wire:submit="save" class="space-y-6">
        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Nombre</label>
            <input
                type="text"
                wire:model="name"
                class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                placeholder="Nombre del proyecto"
            >
            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Descripción</label>
            <textarea
                wire:model="description"
                rows="3"
                class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                placeholder="Descripción opcional"
            ></textarea>
        </div>

        <!-- Status & Priority -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Estado</label>
                <select
                    wire:model="status"
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                >
                    @foreach($statuses as $status)
                        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Prioridad</label>
                <select
                    wire:model="priority"
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                >
                    @foreach($priorities as $priority)
                        <option value="{{ $priority }}">{{ ucfirst($priority) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Color -->
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Color</label>
            <div class="flex gap-3">
                @foreach($colors as $hex => $name)
                    <button
                        type="button"
                        wire:click="$set('color', '{{ $hex }}')"
                        class="w-8 h-8 rounded-lg transition-transform hover:scale-110 {{ $color === $hex ? 'ring-2 ring-white ring-offset-2 ring-offset-slate-900' : '' }}"
                        style="background-color: {{ $hex }}"
                        title="{{ $name }}"
                    ></button>
                @endforeach
            </div>
        </div>

        <!-- Dates -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Fecha de Inicio</label>
                <input
                    type="date"
                    wire:model="start_date"
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Fecha Objetivo</label>
                <input
                    type="date"
                    wire:model="target_date"
                    class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                >
            </div>
        </div>

        <!-- Submit -->
        <div class="flex gap-4 pt-4">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium"
            >
                {{ $project ? 'Actualizar' : 'Crear Proyecto' }}
            </button>
            <a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-white px-6 py-2">
                Cancelar
            </a>
        </div>
    </form>

    @if(session('message'))
        <div class="mt-4 p-4 bg-green-500/20 text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif
</div>
