@extends('layouts.reparaya')

@section('content')
<div class="max-w-3xl mx-auto p-4 space-y-4">
    <div class="bg-white rounded-xl shadow p-5">
        <h1 class="text-xl font-bold">{{ $solicitud->titulo }}</h1>
        {{ $solicitud->categoria }}
        {{-- <p class="text-sm text-gray-500">{{ $solicitud->categoria->nombrecategoria }} · {{ $solicitud->created_at->format('d/m/Y') }}</p> --}}
        <p class="text-sm text-gray-600 mt-3">{{ $solicitud->descripcion }}</p>
    </div>

    @if (auth()->user()->role === 'reparador')
        @livewire('reparaya.presupuesto-form', ['solicitud' => $solicitud])
    @else
        @livewire('reparaya.presupuesto-list', ['solicitud' => $solicitud])
    @endif
</div>
@endsection