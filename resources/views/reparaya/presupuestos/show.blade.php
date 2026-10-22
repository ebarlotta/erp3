@extends('layouts.reparaya')

@section('content')
<div class="max-w-2xl mx-auto p-4 space-y-4">
    <div class="bg-white rounded-xl shadow p-5">
        <h1 class="text-xl font-bold">Presupuesto de {{ $presupuesto->reparador->name }}</h1>
        <p class="text-2xl font-bold text-green-600 mt-2">{{ $presupuesto->moneda->simbolo }}{{ number_format($presupuesto->monto, 2) }}</p>
        <p class="text-sm text-gray-500">Plazo: {{ $presupuesto->plazo_dias }} días</p>
        @if ($presupuesto->comentario)
            <p class="text-sm text-gray-600 mt-3">{{ $presupuesto->comentario }}</p>
        @endif
    </div>

    @if ($presupuesto->estado === 'aceptado' && $presupuesto->cita)
        <a href="{{ route('reparaya.citas.show', $presupuesto->cita) }}" class="block w-full bg-client text-white text-center py-3 rounded-xl font-medium">
            Ver cita confirmada
        </a>
    @elseif ($presupuesto->estado === 'aceptado')
        @livewire('reparaya.selector-horario', ['presupuesto' => $presupuesto])
    @endif
</div>
@endsection