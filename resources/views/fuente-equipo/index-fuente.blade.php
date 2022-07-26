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
    <h3 class="mb-4">Fuente del equipo</h3>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva fuente</button>

    @include('layouts.alerts')

    @if (sizeof($fuentes) > 0)
    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fuentes as $fuente)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fuente->fuente}}</td>
                    <td>
                        <form action="{{ route('fuente-equipo.destroy' , ['fuente_equipo' => $fuente->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-info btn-sm mb-1" href="{{ route('fuente-equipo.show' , ['fuente_equipo' => $fuente->id])}}">Ver</a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('fuente-equipo.edit' , ['fuente_equipo' => $fuente->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <br><span class="badge bg-secondary">No hay fuentes registradas</span>
    @endif

    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Registrar nueva fuente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fuente-equipo.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="fuente" class="col-form-label">Fuente del equipo:</label>
                            <input type="text" class="form-control" name="fuente" id="fuente" value="{{ old('fuente') }}" required>
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