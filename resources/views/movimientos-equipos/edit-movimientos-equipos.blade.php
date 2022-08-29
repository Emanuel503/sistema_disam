@php
    if (Auth::user()->rol->rol != "Administrador"){
        header("Location: home");
    die();
}
@endphp

@extends('layouts.app')

@section('content')

<h3 class="my-4">Modificar movimiento del activo fijo</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('movimiento-equipos.index')}}">Regresar</a>

@include('layouts.alerts')

<form action="{{ route('movimiento-equipos.update', ['movimiento_equipo' => $movimientos->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="id_usuario" class="col-form-label">Tenico autorizado:</label>
        <select id="id_usuario" class="form-select" name="id_usuario">
            @foreach ($usuarios as $usuario)
                <option @selected($movimientos->id_usuario==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_motivo" class="col-form-label">Motivo de salida:</label>
        <select id="id_motivo" class="form-select" name="id_motivo">
            @foreach ($motivos as $motivo)
                <option @selected($movimientos->id_motivo==$motivo->id) value="{{$motivo->id}}">{{$motivo->motivo}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="fecha_orden" class="col-form-label">Fecha de la orden:</label>
        <input type="date" class="form-control" name="fecha_orden" id="fecha_orden" value="{{ $movimientos->fecha_orden }}" required>
    </div>

    <div class="mb-3">
        <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ $movimientos->fecha_inicio }}" required>
    </div>

    <div class="mb-3">
        <label for="fecha_fin" class="col-form-label">Fecha final:</label>
        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ $movimientos->fecha_fin }}" required>
    </div>

    <div class="mb-3">
        <label for="hora_salida" class="col-form-label">Hora de salida:</label>
        <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{ $movimientos->hora_salida }}" required>
    </div>

    <label class="col-form-label">Equipo entregado:</label>
    <div class="mb-3">
        <input class="form-check-input" type="radio" name="estado" id="si" value="Si" @checked($movimientos->estado=='Si' )>
        <label class="form-check-label" for="si">Si</label>

        <input class="form-check-input" type="radio" name="estado" id="no" value="No" @checked($movimientos->estado=='No' )>
        <label class="form-check-label" for="no">No</label>
    </div>

    <button type="submit" class="btn btn-success mt-4">Modificar</button>
    <a href="{{route('movimiento-equipos.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
</form>
@endsection