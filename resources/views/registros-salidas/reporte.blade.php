@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Reporte de registro de salidas</h3>

    @include('layouts.alerts')

    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary bg-opacity-25 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar reporte</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('registros-salida.reportePdf')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_usuario" class="col-form-label">Usuario:</label>
                    <select id="id_usuario" class="form-select" name="id_usuario">
                        @foreach ($usuarios as $usuario)
                            <option @selected( old('id_usuario')==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_final" class="col-form-label">Fecha de final:</label>
                    <input type="date" class="form-control" name="fecha_final" id="fecha_final" value="{{ old('fecha_final') }}" required>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">PDF</button>
                </form>
            </div>
        </div>
    </div>
@endsection