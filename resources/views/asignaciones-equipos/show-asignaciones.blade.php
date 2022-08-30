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
<h3 class="my-4">Detalles de equipos asignados</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('asignaciones-equipos.index')}}">Regresar</a>

@if (sizeof($asignaciones) > 0)
<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha de asignación</th>
                <th>Observación</th>
                <th>Utilizado por el usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asignaciones as $asignacion)
            <tr>
                <td>{{$asignacion->codigo}}</td>
                <td>{{$asignacion->descripcion}}</td>
                <td>{{$asignacion->fecha_asignacion}}</td>
                <td>{{$asignacion->observacion}}</td>
                <td>{{$asignacion->estado}}</td>
                <td>
                    <div>
                        <form action="{{ route('asignaciones-equipos.destroy' , ['asignaciones_equipo' => $asignacion->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('asignaciones-equipos.edit' , ['asignaciones_equipo' => $asignacion->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<br><span class="badge bg-secondary">No hay equipos asignados</span>
@endif
@endsection

@section('js')
   @include('layouts.confirmar-eliminar')
   @include('layouts.data-table-js')
@endsection