@php
if (Auth::user()->rol->rol != "Administrador"){
header("Location: home");
die();
}
@endphp

@extends('layouts.app')

@section('content')

<h3 class="my-4">Modificar dependencia</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('dependencias.index')}}">Regresar</a>

@include('layouts.alerts')
@include('dependencias.alerts')

<form action="{{ route('dependencias.update', ['dependencia' => $dependencias->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="nombre" class="col-form-label">Nombre dependencia:</label>
        <input class="form-control" name="nombre" id="nombre" value="{{$dependencias->nombre}}" required>
    </div>

    <button type="submit" class="btn btn-success mt-4">Modificar</button>
    <a href="{{route('dependencias.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
</form>
@endsection