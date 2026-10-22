@extends('layouts.reparaya')

@section('content')
<div class="max-w-2xl mx-auto p-4 space-y-4">
    <h1 class="text-xl font-bold">Nueva solicitud</h1>
    @livewire('reparaya.solicitud-form')
</div>
@endsection