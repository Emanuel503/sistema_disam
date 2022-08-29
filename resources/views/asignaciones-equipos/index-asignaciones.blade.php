@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<style>
    #Bueno {
        color: #198754;
        font-weight: bold;
    }

    #Malo {
        color: #dc3545;
        font-weight: bold;
    }

    #Regular {
        color: grey;
        font-weight: bold;
    }
</style>
<h3 class="mb-4">Asignación de equipos</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Asignar equipo</button>

@include('layouts.alerts')

@if (sizeof($asignaciones) > 0)
<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Profesión</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asignaciones as $asignacion)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$asignacion->nombres}}</td>
                <td>{{$asignacion->apellidos}}</td>
                <td>{{$asignacion->nombre}}</td>
                <td>{{$asignacion->cargo}}</td>
                <td>
                    <a class="btn btn-primary btn-sm mb-1" href="{{ route('asignaciones-equipos.show' , 
                        ['asignaciones_equipo' => $asignacion->id_usuario])}}">Ver equipo asignado</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<br><span class="badge bg-secondary">No hay equipos asignados</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Asignar equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('asignaciones-equipos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="usuario" class="col-form-label">Usuario:</label>
                        <select id="usuario" class="form-select" name="usuario">
                            @foreach ($usuarios as $usuario)
                            <option @selected(old('usuario')==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="equipo" class="col-form-label">Equipo:</label>
                        <select id="equipo" class="form-select" name="equipo">
                            @foreach ($equipos as $equipo)
                            <option @selected(old('equipo')==$equipo->id) value="{{$equipo->id}}">{{$equipo->codigo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_asignacion" class="col-form-label">Fecha de asignación:</label>
                        <input type="date" class="form-control" name="fecha_asignacion" id="fecha_asignacion" value="{{ old('fecha_asignacion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="observaciones" class="col-form-label">Observaciones:</label>
                        <input type="text" class="form-control" name="observaciones" id="observaciones" value="{{ old('observaciones') }}" required>
                    </div>
                    <label for="serie" class="col-form-label">Estado del equipo:</label>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="estado" id="si" value="Si" checked @checked(old('estado')=='Si' )>
                        <label class="form-check-label" for="si">Utilizado</label>

                        <input class="form-check-input" type="radio" name="estado" id="no" value="No" @checked(old('estado')=='No' ))>
                        <label class="form-check-label" for="no">No utilizado</label>
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
   @include('layouts.data-table-js')
@endsection