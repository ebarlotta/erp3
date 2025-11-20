@extends('adminlte::page')

@section('title', '<?php session('nombre_empresa') ? echo session('nombre_empresa') : echo "BarBer"; ?>')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}
