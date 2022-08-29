@section('css')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4 text-center">Calendario de actividades de Dirección de Salud Ambiental</h3>
<div class="bg-dark mt-3 p-3 bg-opacity-25 rounded col-sm-12 col-sm-10 col-xl-8 mx-auto" id="calendar"></div>

<div class="d-grid gap-2 d-md-flex justify-content-md-center mt-3">
    <a class="btn btn-primary" href="{{route('solicitudes-sala.index')}}">Solicitar Sala</a>
    <a class="btn btn-primary" href="{{route('actividades.index')}}">Registrar Actividad</a>
    <a class="btn btn-primary" href="{{route('registros-salida.index')}}">Registrar Salida</a>
</div>

<div class="modal fade" id="actividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actividades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="formularioActividad">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Titulo:</label>
                        <input type="text" name="title" id="title" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="form-label">Fecha inicio y finalización:</label>
                        <input type="text" name="fecha" id="fecha" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hora" class="form-label">Hora inicio y finalización:</label>
                        <input type="text" name="hora" id="hora" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="objetivo" class="form-label">Objetivo:</label>
                        <input type="text" name="objetivo" id="objetivo" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="observaciones" class="form-label">Observaciones:</label>
                        <input type="text" name="observaciones" id="observaciones" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" rel="nofollow" id="enlaceActividad" class="btn btn-primary">Ver más detalles</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="salida" tabindex="-1" aria-labelledby="salidaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="salidaLabel">Registro de salida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="formularioSalida">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Titulo:</label>
                        <input type="text" name="title" id="title" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="text" name="fecha" id="fecha" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hora_inicio" class="form-label">Hora de inicio:</label>
                        <input type="text" name="hora_inicio" id="hora_inicio" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hora_final" class="form-label">Hora final:</label>
                        <input type="text" name="hora_final" id="hora_final" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="objetivo" class="form-label">Objetivo:</label>
                        <input type="text" name="objetivo" id="objetivo" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" rel="nofollow" id="enlaceSalida" class="btn btn-primary">Ver más detalles</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="solicitudSala" tabindex="-1" aria-labelledby="solicitudSalaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solicitudSala">Solicitud de sala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="formularioSolicitudSala">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Titulo:</label>
                        <input type="text" name="title" id="title" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="text" name="fecha" id="fecha" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hora_inicio" class="form-label">Hora de inicio:</label>
                        <input type="text" name="hora_inicio" id="hora_inicio" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hora_finalizacion" class="form-label">Hora final:</label>
                        <input type="text" name="hora_finalizacion" id="hora_finalizacion" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="actividad" class="form-label">Actividad:</label>
                        <input type="text" name="actividad" id="actividad" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" rel="nofollow" id="enlaceSolicitudSala" class="btn btn-primary">Ver más detalles</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/agenda.js') }}" defer></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/locales-all.js') }}"></script>
@endsection