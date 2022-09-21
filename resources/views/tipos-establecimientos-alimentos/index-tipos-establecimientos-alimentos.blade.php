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
    <h3 class="mb-4">Tipos de establecimientos - Alimentos</h3>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo tipo</button>

    @include('layouts.alerts')

    @if (sizeof($establecimientos) > 0)
    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Tipo de establecimiento</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($establecimientos as $establecimiento)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$establecimiento->nombre}}</td>
                    <td>
                        <form action="{{ route('tipos-establecimientos-alimentos.destroy' , ['tipos_establecimientos_alimento' => $establecimiento->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm mb-1" href="{{ route('tipos-establecimientos-alimentos.show' , ['tipos_establecimientos_alimento' => $establecimiento->id])}}">Ver</a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('tipos-establecimientos-alimentos.edit' , ['tipos_establecimientos_alimento' => $establecimiento->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <br><span class="badge bg-secondary">No hay tipos de establecimientos registrados</span>
    @endif

    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Registrar nueva sala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tipos-establecimientos-alimentos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre del tipo de establecimiento:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
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