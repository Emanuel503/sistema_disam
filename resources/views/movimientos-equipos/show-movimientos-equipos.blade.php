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
<h3 class="my-4">Detalles del movimiento del activo fijo</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('movimiento-equipos.index')}}">Regresar</a>
<fieldset class="form-control p-3">

    <h6 class="text-center">ORDEN DE SALIDA DE MOBILARIO Y/O EQUIPO</h6>

    <div class="row">
        <div class="col-sm-4">
            <label for="fecha_orden" class="col-form-label">Fecha de la orden:</label>
            <input type="date" class="form-control" name="fecha_orden" id="fecha_orden" value="{{ $movimientos->fecha_orden }}" readonly>
        </div>
        <div class="col-sm-4">
            <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ $movimientos->fecha_inicio }}" readonly>
        </div>

        <div class="col-sm-4">
            <label for="fecha_fin" class="col-form-label">Fecha final:</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ $movimientos->fecha_fin }}" readonly>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-4">
            <label for="id_usuario" class="col-form-label">Tecnico Autorizado:</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" value="{{$movimientos->usuarios->nombres}} {{ $movimientos->usuarios->apellidos}}" readonly>
        </div>
        <div class="col-sm-4">
            <label for="id_usuario" class="col-form-label">Motivo de salida:</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" value="{{$movimientos->motivos->motivo}}" readonly>
        </div>

        <div class="col-sm-4">
            <label for="hora_salida" class="col-form-label">Hora de salida:</label>
            <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{$movimientos->hora_salida}}" readonly>
        </div>
    </div>
</fieldset>

<h6 class="text-center mt-4">LISTADO DE EQUIPO Y MOBILIARIO</h6>

<div class="table-responsive">
    <table id="asignacion_equipos" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Descripcion</th>
                <th>Marca</th>
                <th>Serie</th>
                <th>Inventario</th>
                <th>Destino</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asignacion_equipos as $asignacion_equipo)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$asignacion_equipo->descripcion}}</td>
                <td>{{$asignacion_equipo->marca}}</td>
                <td>{{$asignacion_equipo->serie}}</td>
                <td>{{$asignacion_equipo->codigo}}</td>
                <td>{{$asignacion_equipo->destino}}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{route('equipos.show', ['equipo' => $asignacion_equipo->id_equipo])}}">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js-data-table')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#asignacion_equipos tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            $('#asignacion_equipos').DataTable({
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