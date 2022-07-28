@extends('layouts.app')

@section('content')
<h3 class="mb-4">Reporte de permisos DISAM</h3>

@if (session('errorDatos'))
<div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('errorDatos')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="modal-dialog modal-lg">
    <div class="modal-content bg-secondary bg-opacity-25 shadow">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generar reporte</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('permisos.reportePdf')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="col-form-label">Usuario:</label>
                    <select id="usuario" class="form-select" name="usuario">
                        @foreach ($usuarios as $usuario)
                        <option @selected( old('usuario')==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_finalizacion" class="col-form-label">Fecha de finalización:</label>
                    <input type="date" class="form-control" name="fecha_finalizacion" id="fecha_finalizacion" value="{{ old('fecha_finalizacion') }}" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">PDF</button>
            </form>
        </div>
    </div>
</div>
@endsection