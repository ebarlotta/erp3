@extends('layouts.reparaya')

@section('content')
<div class="max-w-3xl mx-auto p-4 space-y-4">
    <h1 class="text-xl font-bold">Solicitudes</h1>
    @livewire('reparaya.solicitud-list')
</div>
@endsection