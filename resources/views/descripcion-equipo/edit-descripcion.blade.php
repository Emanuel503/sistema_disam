@php
if (Auth::user()->rol->rol != "Administrador"){
header("Location: home");
die();
}
@endphp

@extends('layouts.app')

@section('content')

<h3 class="my-4">Modificar descripción</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('descripcion-equipo.index')}}">Regresar</a>

@include('layouts.alerts')
@include('descripcion-equipo.alerts')

<form action="{{ route('descripcion-equipo.update', ['descripcion_equipo' => $descripciones->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="descripcion" class="col-form-label">Nombre dependencia:</label>
        <input class="form-control" name="descripcion" id="descripcion" value="{{$descripciones->descripcion}}" required>
    </div>

    <button type="submit" class="btn btn-success mt-4">Modificar</button>
    <a href="{{route('descripcion-equipo.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
</form>
@endsection