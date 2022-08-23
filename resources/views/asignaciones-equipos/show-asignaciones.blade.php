@php
if (Auth::user()->rol->rol != "Administrador"){
header("Location: home");
die();
}
@endphp

@extends('layouts.app')

@section('content')
<h3 class="my-4">Detalles de equipos asignados</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('asignaciones-equipos.index')}}">Regresar</a>

@if (sizeof($asignaciones) > 0)
<div class="table-responsive">
    <table id="asignaciones" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha de asignación</th>
                <th>Observación</th>
                <th>Utilizado por el usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asignaciones as $asignacion)
            <tr>
                <td>{{$asignacion->codigo}}</td>
                <td>{{$asignacion->descripcion}}</td>
                <td>{{$asignacion->fecha_asignacion}}</td>
                <td>{{$asignacion->observacion}}</td>
                <td>{{$asignacion->estado}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<br><span class="badge bg-secondary">No hay equipos asignados</span>
@endif
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