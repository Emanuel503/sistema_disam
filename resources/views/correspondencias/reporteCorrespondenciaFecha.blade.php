@extends('layouts.app')

@section('content')
<h3 class="mb-4">Reporte de correspondencia por fecha</h3>

@include('layouts.alerts')

<div class="modal-dialog modal-lg">
    <div class="modal-content bg-secondary bg-opacity-25 shadow">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generar reporte</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('correspondencias.reporteFecha')}}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="fecha" class="col-form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">PDF</button>
            </form>
        </div>
    </div>
</div>
@endsection