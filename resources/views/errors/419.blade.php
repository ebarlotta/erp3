{{-- @extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired')) --}}

@extends('layouts.adminlte')
@section('content')
   <h2>Sesión expirada</h2>
   <p>Por seguridad tu sesión caducó.</p>
   <a class="btn btn-info" href="{{ url()->previous() }}">Volver e intentar de nuevo</a>
@endsection