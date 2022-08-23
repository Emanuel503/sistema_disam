@php
if (Auth::user()->rol->rol != "Administrador"){
header("Location: home");
die();
}
@endphp

@extends('layouts.app')

@section('content')

<h3 class="my-4">Modificar ubicación</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('ubicacion-equipo.index')}}">Regresar</a>

@include('layouts.alerts')
@include('ubicacion-equipo.alerts')

<form action="{{ route('ubicacion-equipo.update', ['ubicacion_equipo' => $ubicaciones->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="ubicacion" class="col-form-label">Nombre dependencia:</label>
        <input class="form-control" name="ubicacion" id="ubicacion" value="{{$ubicaciones->ubicacion}}" required>
    </div>

    <button type="submit" class="btn btn-success mt-4">Modificar</button>
    <a href="{{route('ubicacion-equipo.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
</form>
@endsection