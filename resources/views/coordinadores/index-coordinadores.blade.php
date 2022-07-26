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
    <h3 class="mb-4">Coordinadores</h3>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo coordinador</button>

    @include('layouts.alerts')

    @if (sizeof($coordinadores) > 0)
    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Técnico coordinador</th>
                    <th>Tipo coordinación</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coordinadores as $coordinador)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$coordinador->usuario->nombres}} {{$coordinador->usuario->apellidos}}</td>
                    <td>{{$coordinador->coordinacion->tipo_coordinacion}}</td>
                    <td>
                        <form action="{{ route('coordinadores.destroy' , ['coordinadore' => $coordinador->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-info btn-sm mb-1" href="{{ route('coordinadores.show' , ['coordinadore' => $coordinador->id])}}">Ver</a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('coordinadores.edit' , ['coordinadore' => $coordinador->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <br><span class="badge bg-secondary">No hay coordinadores registrados</span>
    @endif

    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Registrar nuevo coordinador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('coordinadores.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="usuario" class="col-form-label">Técnico usuario:</label>
                            <select id="usuario" class="form-select" name="usuario">
                                @foreach ($usuarios as $usuario )
                                <option @selected( old('usuario')==$usuario->id ) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_coordinacion" class="col-form-label">Tipo de coordinación:</label>
                            <select id="tipo_coordinacion" class="form-select" name="tipo_coordinacion">
                                @foreach ($coordinaciones as $coordinacion )
                                <option @selected( old('tipo_coordinacion')==$coordinacion->id ) value="{{$coordinacion->id}}">{{$coordinacion->tipo_coordinacion}}</option>
                                @endforeach
                            </select>
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
    @include('layouts.confirmar-eliminar')
@endsection