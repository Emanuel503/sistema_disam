@extends('layouts.app')

@section('content')

<h3 class="my-4">Detalles de la actividad</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('actividades.index')}}">Regresar</a>

<div class="mb-3">
    <label for="id_organizador" class="col-form-label">Organizador del evento:</label>
    <input class="form-control" name="id_organizador" id="id_organizador" value="{{$actividades->organizador->nombre}}" readonly>
</div>

<div class="mb-3">
    <label for="id_usuario" class="col-form-label">Usuario:</label>
    <input class="form-control" name="id_usuario" id="id_usuario" value="{{$actividades->usuario->nombres}} {{$actividades->usuario->apellidos}}" readonly>
</div>

<div class="mb-3">
    <label for="id_coordinador" class="col-form-label">Coordinador / Asistente:</label>
    <input class="form-control" name="id_coordinador" id="id_coordinador" value="{{$actividades->coordinador->nombres}} {{$actividades->coordinador->apellidos}}" readonly>
</div>

<div class="mb-3">
    <label for="id_lugar" class="col-form-label">Lugar:</label>
    <input class="form-control" name="id_lugar" id="id_lugar" value="{{$actividades->lugar->nombre}}" readonly>
</div>

<div class="mb-3">
    <label for="title" class="col-form-label">Nombre de actividad:</label>
    <input type="text" class="form-control" name="title" id="title" value="{{$actividades->title}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_inicio" class="col-form-label">Fecha inicio:</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{$actividades->fecha_inicio}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_finalizacion" class="col-form-label">Fecha finalizacion:</label>
    <input type="date" class="form-control" name="fecha_finalizacion" id="fecha_finalizacion" value="{{$actividades->fecha_finalizacion}}" readonly>
</div>

<div class="mb-3">
    <label for="hora_inicio" class="col-form-label">Hora inicio:</label>
    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" value="{{$actividades->hora_inicio}}" readonly>
</div>

<div class="mb-3">
    <label for="hora_finalizacion" class="col-form-label">Hora finalizacion:</label>
    <input type="time" class="form-control" name="hora_finalizacion" id="hora_finalizacion" value="{{$actividades->hora_finalizacion}}" readonly>
</div>

<div class="mb-3">
    <label for="objetivo" class="col-form-label">Objetivo:</label>
    <textarea readonly class="form-control" name="objetivo" id="objetivo">{{$actividades->objetivo}}</textarea>
</div>

<div class="mb-3">
    <label for="observaciones" class="col-form-label">Observaciones:</label>
    <textarea readonly class="form-control" name="observaciones" id="observaciones">{{$actividades->observaciones}}</textarea>
</div>

<div class="mb-3">
    <label for="id_estado" class="col-form-label">Estado:</label>
    <input type="text" class="form-control" name="id_estado" id="id_estado" value="{{$actividades->estado->tipo_estado}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
    <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$actividades->created_at}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
    <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$actividades->updated_at}}" readonly>
</div>

@if ($actividades->id_usuario == Auth::user()->id)
<form action="{{ route('actividades.destroy' , ['actividade' => $actividades->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <a class="btn btn-success" href="{{ route('actividades.edit' , ['actividade' => $actividades->id])}}">Modificar</a>
    <input name="_method" type="hidden" value="DELETE"><input name="_method" type="hidden" value="DELETE">
    <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
</form>
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