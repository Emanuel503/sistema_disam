@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">Control de correspondencia - seguimiento</h3>

<a href="{{route('correspondencias.index')}}" class="btn btn-outline-secondary mb-4">Regresar</a>

@if (Auth::user()->id == $correspondencia->id_usuario)
    <button type="button" class="btn btn-primary mb-4 float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva seguimiento</button>
@endif

@include('layouts.alerts')

@if (sizeof($seguimientos) > 0)
<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Fecha</th>
                <th>Seguimiento</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seguimientos as $seguimiento)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$seguimiento->created_at}}</td>
                <td>{{$seguimiento->seguimiento}}</td>
                <td>
                    <a class="btn btn-info btn-sm mb-1" href="{{ route('correspondencias.show' , ['correspondencia' => $correspondencia->id])}}">Ver</a>
                    @if (Auth::user()->id == $seguimiento->id_usuario_adiciono)
                        <form action="{{ route('correspondencias-seguimientos.destroy' , ['correspondencia' => $correspondencia->id, 'seguimiento' => $seguimiento->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('correspondencias-seguimientos.edit' , ['correspondencia' => $correspondencia->id, 'seguimiento' => $seguimiento->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <br><span class="badge bg-secondary">No hay seguimientos registrados</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registra nuevo seguimiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('correspondencias-seguimientos.store', ['correspondencia' => $correspondencia->id]) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="seguimiento" class="col-form-label">Seguimiento:</label>
                        <textarea name="seguimiento" id="seguimiento" class="form-control">{{old('seguimiento')}}</textarea>
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