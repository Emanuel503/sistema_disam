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
<h3 class="mb-4">Ubicación de equipos</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva ubicación</button>

@include('layouts.alerts')
@include('ubicacion-equipo.alerts')

@if (sizeof($ubicaciones) > 0)
<div class="table-responsive">
    <table id="ubicacionEquipo" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Ubicación</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ubicaciones as $ubicacion)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$ubicacion->ubicacion}}</td>
                <td>
                    <form action="{{ route('ubicacion-equipo.destroy' , ['ubicacion_equipo' => $ubicacion->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                            <a class="btn btn-info btn-sm mb-1" href="{{ route('ubicacion-equipo.show' , ['ubicacion_equipo' => $ubicacion->id])}}">Ver</a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('ubicacion-equipo.edit' , ['ubicacion_equipo' => $ubicacion->id])}}">Modificar</a>
                            <input name="_method" type="hidden" value="DELETE"><input name="_method" type="hidden" value="DELETE">
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
<br><span class="badge bg-secondary">No hay ubicaciones registradas</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registra nueva ubicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ubicacion-equipo.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ubicacion" class="col-form-label">Ubicación:</label>
                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}" required>
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
        $('#ubicacionEquipo tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
        });

        $('#ubicacionEquipo').DataTable({
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