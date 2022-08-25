@php
if (Auth::user()->rol->rol != "Administrador"){
header("Location: home");
die();
}
@endphp

@section('css-data-table')
<link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')

<h3 class="mb-4">Movimiento de activo Fijo</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo movimiento</button>

@include('layouts.alerts')
@include('movimientos-equipos.alerts')

@if (sizeof($movimientos) > 0)
<div class="table-responsive">
    <table id="movimientos" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Fecha de la orden</th>
                <th>Tecnico Autorizado</th>
                <th>Motivo de salida</th>
                <th>Asignacion de equipo</th>
                <th>Equipo entregado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$movimiento->fecha_orden}}</td>
                <td>{{$movimiento->usuarios->nombres}} {{$movimiento->usuarios->apellidos}}</td>
                <td>{{$movimiento->motivos->motivo}}</td>
                <td class="text-center"><a class="btn btn-outline-primary btn-sm" href="{{ route('asignacion-movimiento-equipo.edit', ['asignacion_movimiento_equipo' => $movimiento->id ]) }}">Asignar</a></td>
                <td class="text-center">{{$movimiento->estado}}</td>
                <td>
                    <form action="{{ route('movimiento-equipos.destroy' , ['movimiento_equipo' => $movimiento->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                            <a class="btn btn-info btn-sm mb-1" href="{{ route('movimiento-equipos.show' , ['movimiento_equipo' => $movimiento->id])}}">Ver</a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('movimiento-equipos.edit' , ['movimiento_equipo' => $movimiento->id])}}">Modificar</a>
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<br><span class="badge bg-secondary">No hay movimientos de activos fijos registrados</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registrar nuevo movimiento de activo fijo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('movimiento-equipos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_usuario" class="col-form-label">Tenico autorizado:</label>
                        <select id="id_usuario" class="form-select" name="id_usuario">
                            @foreach ($usuarios as $usuario)
                            <option @selected(old('id_usuario')==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_motivo" class="col-form-label">Motivo de salida:</label>
                        <select id="id_motivo" class="form-select" name="id_motivo">
                            @foreach ($motivos as $motivo)
                            <option @selected(old('id_motivo')==$motivo->id) value="{{$motivo->id}}">{{$motivo->motivo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_orden" class="col-form-label">Fecha de la orden:</label>
                        <input type="date" class="form-control" name="fecha_orden" id="fecha_orden" value="{{ old('fecha_orden') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_fin" class="col-form-label">Fecha final:</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="hora_salida" class="col-form-label">Hora de salida:</label>
                        <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{ old('hora_salida') }}" required>
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

@section('js-data-table')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#movimientos tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
        });

        $('#movimientos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection

@section('js-alert-delete')
<script src="{{ asset('js/alert-delete.js') }}"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `¿Seguro que desea borrar este registro?`,
                text: "Si elimina este registro no se podra recuperar.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endsection