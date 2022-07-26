@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Bitacora recorridos y consumo de combustible</h3>

    @include('layouts.alerts')

    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary bg-opacity-25 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar reporte</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('transporte.bitacoraRecorridosPdf')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_vehiculo" class="col-form-label">Placa:</label>
                        <select id="id_vehiculo" class="form-select" name="id_vehiculo">
                            @foreach ($vehiculos as $vehiculo )
                            <option @selected( old('id_vehiculo')==$vehiculo->id) value="{{$vehiculo->id}}">{{$vehiculo->placa}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="col-form-label">Año Y Mes:</label>
                        <input type="month" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}" placeholder="YYYY-MM" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">PDF</button>
                </form>
            </div>
        </div>
    </div>
@endsection