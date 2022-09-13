@extends('layouts.app')

@section('content')
<h3 class="mb-4">Reporte de correspondencia por usuario</h3>

@include('layouts.alerts')

<div class="modal-dialog modal-lg">
    <div class="modal-content bg-secondary bg-opacity-25 shadow">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generar reporte</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('correspondencias.reporteUsuario')}}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="id_usuario" class="col-form-label">Usuario:</label>
                    <select id="id_usuario" class="form-select" name="id_usuario">
                        @foreach ($usuarios as $usuario)
                        <option @selected(old('usuario')==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">PDF</button>
            </form>
        </div>
    </div>
</div>
@endsection