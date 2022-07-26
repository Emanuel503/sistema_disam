@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Detalles de la solicitud de transporte</h3>

    <a href="{{route('solicitudes-transporte.index')}}" class="btn btn-outline-secondary mb-4">Regresar</a>

    <div class="mb-3">
        <label for="id_usuario" class="col-form-label">Usuarios solicitante:</label>
        <input class="form-control" name="id_usuario" value="{{$solicitudesTransportes->usuario->nombres}} {{$solicitudesTransportes->usuario->apellidos}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_dependencia" class="col-form-label">Dependencia:</label>
        <input class="form-control" name="id_dependencia" value="{{$solicitudesTransportes->dependencias->nombre}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_lugar" class="col-form-label">Lugar:</label>
        <input class="form-control" name="id_dependencia" value="{{$solicitudesTransportes->lugar->nombre}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha" class="col-form-label">Fecha del transporte:</label>
        <input type="date" class="form-control" name="fecha" id="fecha" value="{{$solicitudesTransportes->fecha}}" readonly>
    </div>

    <div class="mb-3">
        <label for="hora_salida" class="col-form-label">Hora de salida:</label>
        <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{$solicitudesTransportes->hora_salida}}" readonly>
    </div>

    <div class="mb-3">
        <label for="hora_regreso" class="col-form-label">Hora de regreso:</label>
        <input type="time" class="form-control" name="hora_regreso" id="hora_regreso" value="{{$solicitudesTransportes->hora_regreso}}" readonly>
    </div>

    <div class="mb-3">
        <label for="objetivo" class="col-form-label">Objetivo:</label>
        <textarea readonly class="form-control" name="objetivo" id="objetivo">{{$solicitudesTransportes->objetivo}}</textarea>
    </div>

    <div class="mb-3">
        <label for="observaciones" class="col-form-label">Observaciones:</label>
        <textarea readonly class="form-control" name="observaciones" id="observaciones">{{$solicitudesTransportes->observaciones}}</textarea>
    </div>

    <div class="mb-3">
        <label for="id_autorizacion" class="col-form-label">Autorizacion:</label>
        <input class="form-control" name="id_autorizacion" value="{{$solicitudesTransportes->autorizacion->autorizacion}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_vehiculo" class="col-form-label">Vehiculo:</label>
        <input class="form-control" name="id_vehiculo" id="id_vehiculo" value="@if ($solicitudesTransportes->id_vehiculo == null) Sin asignar @else {{$solicitudesTransportes->vehiculo->placa}} @endif" readonly>
    </div>

    <div class="mb-3">
        <label for="id_motorista" class="col-form-label">Motorista:</label>
        <input class="form-control" name="id_motorista" id="id_motorista" value="@if ($solicitudesTransportes->id_motorista == null) Sin asignar @else {{$solicitudesTransportes->motorista->nombres}} {{$solicitudesTransportes->motorista->apellidos}} @endif" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_solicitud" class="col-form-label">Fecha de la solicitud:</label>
        <input class="form-control" name="fecha_solicitud" id="fecha_solicitud" value="{{$solicitudesTransportes->created_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$solicitudesTransportes->updated_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Lugar de la solicitud:</label>
        <input class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$solicitudesTransportes->lugar_solicitud}}" readonly>
    </div>

    @if(Auth::user()->id_rol == 1 || (Auth::user()->rol->id == $solicitudesTransportes->usuario->id && $solicitudesTransportes->autorizacion->id == 3 ))
        <form action="{{ route('solicitudes-transporte.destroy' , ['solicitudes_transporte' => $solicitudesTransportes->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <a class="btn btn-success" href="{{ route('solicitudes-transporte.edit' , ['solicitudes_transporte' => $solicitudesTransportes->id])}}">Modificar</a>
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