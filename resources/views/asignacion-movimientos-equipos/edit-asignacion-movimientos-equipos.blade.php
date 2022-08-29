@php
    if (Auth::user()->rol->rol != "Administrador"){
        header("Location: home");
        die();
    }
@endphp

@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="my-4">Asignar equipos</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('movimiento-equipos.index')}}">Regresar</a>

@include('layouts.alerts')

<fieldset class="form-control p-3">
    <h6 class="text-center">ORDEN DE SALIDA DE MOBILARIO Y/O EQUIPO</h6>
    <div class="row">
        <div class="col-sm-4">
            <label for="fecha_orden" class="col-form-label">Fecha de la orden:</label>
            <input type="date" class="form-control" name="fecha_orden" id="fecha_orden" value="{{ $movimientos->fecha_orden }}" readonly>
        </div>
        <div class="col-sm-4">
            <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ $movimientos->fecha_inicio }}" readonly>
        </div>

        <div class="col-sm-4">
            <label for="fecha_fin" class="col-form-label">Fecha final:</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ $movimientos->fecha_fin }}" readonly>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-4">
            <label for="id_usuario" class="col-form-label">Tecnico Autorizado:</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" value="{{$movimientos->usuarios->nombres}} {{ $movimientos->usuarios->apellidos}}" readonly>
        </div>
        <div class="col-sm-4">
            <label for="id_usuario" class="col-form-label">Motivo de salida:</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" value="{{$movimientos->motivos->motivo}}" readonly>
        </div>

        <div class="col-sm-4">
            <label for="hora_salida" class="col-form-label">Hora de salida:</label>
            <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{$movimientos->hora_salida}}" readonly>
        </div>
    </div>
</fieldset>

<button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Agregar equipo</button>

<h6 class="text-center">LISTADO DE EQUIPO Y MOBILIARIO</h6>

<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Descripcion</th>
                <th>Marca</th>
                <th>Serie</th>
                <th>Inventario</th>
                <th>Destino</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asignacion_equipos as $asignacion_equipo)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$asignacion_equipo->descripcion}}</td>
                <td>{{$asignacion_equipo->marca}}</td>
                <td>{{$asignacion_equipo->serie}}</td>
                <td>{{$asignacion_equipo->codigo}}</td>
                <td>{{$asignacion_equipo->destino}}</td>
                <td>
                    <form action="{{ route('asignacion-movimiento-equipo.destroy' , ['asignacion_movimiento_equipo' => $asignacion_equipo->id, 'registro' => $movimientos->id ]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                            <a class="btn btn-sm btn-info" href="{{route('equipos.show', ['equipo' => $asignacion_equipo->id_equipo])}}">Ver</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Agregar equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('asignacion-movimiento-equipo.store') }}" method="POST">
                    @csrf
                    <input name="id_movimiento" value="{{$movimientos->id}}" hidden>
                    <div class="mb-3">
                        <label for="id_equipo" class="col-form-label">Equipo:</label>
                        <select id="id_equipo" class="form-select" name="id_equipo">
                            @foreach ($equipos as $equipo)
                            <option @selected(old('id_equipo')==$equipo->id) value="{{$equipo->id}}">{{$equipo->codigo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="destino" class="col-form-label">Destino:</label>
                        <input type="text" class="form-control" name="destino" id="destino" value="{{ old('destino') }}" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
   @include('layouts.confirmar-eliminar')
   @include('layouts.data-table-js')
@endsection