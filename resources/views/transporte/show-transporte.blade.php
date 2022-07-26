@extends('layouts.app')

@section('content')

    <h3 class="my-4">Detalles de transporte</h3>

    <a target="_blank" class="btn btn-danger float-end" href="{{route('transporte.pdf', ['id' => $transportes->id])}}">PDF</a>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('transporte.index')}}">Regresar</a>

    <h5>Datos de la hoja de Control de trasnporte</h5>

    <div class="mb-3">
        <label for="id_dependencia" class="col-form-label">Dependencia de transporte:</label>
        <input class="form-control" name="id_dependencia" id="id_dependencia" value="{{$transportes->dependencias->nombre}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_conductor" class="col-form-label">Conductor:</label>
        <input class="form-control" name="id_conductor" id="id_conductor" value="{{$transportes->conductor->nombres}} {{$transportes->conductor->apellidos}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_placa" class="col-form-label">Placa:</label>
        <input class="form-control" name="id_placa" id="id_placa" value="{{$transportes->vehiculo->placa}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha" class="col-form-label">Fecha:</label>
        <input type="text" class="form-control" name="fecha" id="fecha" value="{{$transportes->fecha}}" readonly>
    </div>

    <h5>Datos de salida</h5>

    <div class="mb-3">
        <label for="hora_salida" class="col-form-label">Hora salida:</label>
        <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{$transportes->hora_salida}}" readonly>
    </div>

    <div class="mb-3">
        <label for="km_salida" class="col-form-label">Kilometraje salida:</label>
        <input type="text" class="form-control" name="km_salida" id="km_salida" value="{{$transportes->km_salida}}" readonly>
    </div>

    <div class="mb-3">
        <label for="lugar_salida" class="col-form-label">Lugar salida:</label>
        <input type="text" class="form-control" name="lugar_salida" id="lugar_salida" value="{{$transportes->lugar_s->nombre}}" readonly>
    </div>

    <h5>Datos de destino</h5>

    <div class="mb-3">
        <label for="hora_destino" class="col-form-label">Hora destino:</label>
        <input type="time" class="form-control" name="hora_destino" id="hora_destino" value="{{$transportes->hora_destino}}" readonly>
    </div>

    <div class="mb-3">
        <label for="km_destino" class="col-form-label">Kilometraje destino:</label>
        <input type="text" class="form-control" name="km_destino" id="km_destino" value="{{$transportes->km_destino}}" readonly>
    </div>

    <div class="mb-3">
        <label for="lugar_destino" class="col-form-label">Lugar destino:</label>
        <input type="text" class="form-control" name="lugar_destino" id="lugar_destino" value="{{$transportes->lugar_d->nombre}}" readonly>
    </div>

    <h5>Otros datos</h5>

    <div class="mb-3">
        <label for="distancia_recorrida" class="col-form-label">Distancia recorrida:</label>
        <input type="text" class="form-control" name="distancia_recorrida" id="distancia_recorrida" value="{{$transportes->distancia_recorrida}}" readonly>
    </div>

    <div class="mb-3">
        <label for="combustible" class="col-form-label">Combustible GLS de: <span style="font-weight: bold;">{{$transportes->tipo_combustible}}</span> </label>
        <input type="text" class="form-control" name="combustible" id="combustible" value="{{$transportes->combustible}}" readonly>
    </div>

    <div class="mb-3">
        <label for="pasajero" class="col-form-label">Pasajero:</label>
        <input type="text" class="form-control" name="pasajero" id="pasajero" value="{{$transportes->pasajeros->nombres}} {{$transportes->pasajeros->apellidos}}" readonly>
    </div>

    <div class="mb-3">
        <label for="objetivo" class="col-form-label">Objetivo:</label>
        <textarea readonly class="form-control" name="objetivo" id="objetivo">{{$transportes->objetivo}}</textarea>
    </div>

    <div class="mb-3">
        <label for="numero" class="col-form-label">Numero:</label>
        <textarea readonly class="form-control" name="numero" id="numero">{{$transportes->correlativo}}</textarea>
    </div>

    <div class="mb-3">
        <label for="nivel_tanque" class="col-form-label">Nivel en tanque:</label>
        <input readonly class="form-control" name="nivel_tanque" id="nivel_tanque" value="{{$transportes->nivel_tanque}}">
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$transportes->created_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$transportes->updated_at}}" readonly>
    </div>

    <form action="{{ route('transporte.destroy' , ['transporte' => $transportes->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <a class="btn btn-success" href="{{ route('transporte.edit' , ['transporte' => $transportes->id])}}">Modificar</a>
        <input name="_method" type="hidden" value="DELETE"><input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
    </form>
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