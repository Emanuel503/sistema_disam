@extends('layouts.app')

@section('content')
<h3 class="my-4">Modificar asignación de equipo</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('asignaciones-equipos.index')}}">Regresar</a>

@include('layouts.alerts')
@include('actividades.alerts')

<form action="{{ route('asignaciones-equipos.update', ['asignaciones_equipo' => $asignaciones->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="equipo" class="col-form-label">Equipo:</label>
        <select id="equipo" class="form-select" name="equipo">
            @foreach ($equipos as $equipo)
            <option @selected($asignaciones->id_equipo == $equipo->id) value="{{$equipo->id}}">{{$equipo->codigo}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="fecha_asignacion" class="col-form-label">Fecha de asignación:</label>
        <input type="date" class="form-control" name="fecha_asignacion" id="fecha_asignacion" value="{{$asignaciones->fecha_asignacion}}" required>
    </div>

    <div class="mb-3">
        <label for="observaciones" class="col-form-label">Observaciones:</label>
        <input type="text" class="form-control" name="observaciones" id="observaciones" value="{{$asignaciones->observacion}}" required>
    </div>
    <label for="serie" class="col-form-label">Estado del equipo:</label>
    <div class="mb-3">
        <input class="form-check-input" type="radio" name="estado" id="si" value="Si" @checked($asignaciones->estado == "Si")>
        <label class="form-check-label" for="si">Utilizado</label>
        <input class="form-check-input" type="radio" name="estado" id="no" value="No" @checked($asignaciones->estado == "No")>
        <label class="form-check-label" for="no">No utilizado</label>
    </div>

    <button type="submit" class="btn btn-success mt-4">Modificar</button>
    <a href="{{route('asignaciones-equipos.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
</form>
@endsection