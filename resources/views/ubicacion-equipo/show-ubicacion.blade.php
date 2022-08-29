@php
    if (Auth::user()->rol->rol != "Administrador"){
        header("Location: home");
        die();
    }
@endphp

@extends('layouts.app')

@section('content')
<h3 class="my-4">Detalles de la ubicación</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('ubicacion-equipo.index')}}">Regresar</a>

<div class="mb-3">
    <label for="ubicacion" class="col-form-label">Ubicación:</label>
    <input class="form-control" name="ubicacion" id="ubicacion" value="{{$ubicaciones->ubicacion}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
    <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$ubicaciones->created_at}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
    <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$ubicaciones->updated_at}}" readonly>
</div>

<form action="{{ route('ubicacion-equipo.destroy' , ['ubicacion_equipo' => $ubicaciones->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <a class="btn btn-success" href="{{ route('ubicacion-equipo.edit' , ['ubicacion_equipo' => $ubicaciones->id])}}">Modificar</a>
    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
</form>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection