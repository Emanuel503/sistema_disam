@section('css-data-table')
<link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">Actividades</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva actividad</button>

@include('layouts.alerts')
@include('actividades.alerts')

@if (sizeof($actividades) > 0)
<div class="table-responsive">
    <table id="actividades" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>Fecha de incio y finalizacion</th>
                <th>Evento / Actividad</th>
                <th>Usuario</th>
                <th>Hora inicio y finalizacion</th>
                <th>Coordinador / Asistente</th>
                <th>Nombre del lugar</th>
                <th>Estado actividad</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades->reverse() as $actividad)
            <tr>
                <td>
                    {{$actividad->fecha_inicio}}<br>
                    {{$actividad->fecha_finalizacion}}
                </td>
                <td>{{$actividad->title}}</td>
                <td>{{$actividad->usuario->nombres}} {{$actividad->usuario->apellidos}}</td>
                <td>
                    {{$actividad->hora_inicio}}<br>
                    {{$actividad->hora_finalizacion}}
                </td>
                <td>{{$actividad->coordinador->nombres}} {{$actividad->coordinador->apellidos}}</td>
                <td>{{$actividad->lugar->nombre}}</td>
                <td>{{$actividad->estado->tipo_estado}}</td>
                <td>
                    <div>
                        <a class="btn btn-info btn-sm mb-1" href="{{ route('actividades.show' , ['actividade' => $actividad->id])}}">Ver</a>
                        @if ($actividad->id_usuario == Auth::user()->id)
                        <form action="{{ route('actividades.destroy' , ['actividade' => $actividad->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('actividades.edit' , ['actividade' => $actividad->id])}}">Modificar</a>
                            <input name="_method" type="hidden" value="DELETE"><input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<br><span class="badge bg-secondary">No hay actividades registradas</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registra nueva actividad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actividades.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_organizador" class="col-form-label">Organizador del evento:</label>
                        <select id="id_organizador" class="form-select" name="id_organizador">
                            @foreach ($organizadores as $organizador )
                            <option @selected(old('id_organizador')==$organizador->id) value="{{$organizador->id}}">{{$organizador->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_coordinador" class="col-form-label">Coordinador / Asistente:</label>
                        <select id="id_coordinador" class="form-select" name="id_coordinador">
                            @foreach ($usuarios as $usuario )
                            <option @selected(old('id_coordinador')==$usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_lugar" class="col-form-label">Lugar:</label>
                        <select id="id_lugar" class="form-select" name="id_lugar">
                            @foreach ($lugares as $lugar )
                            <option @selected(old('id_lugar')==$lugar->id) value="{{$lugar->id}}">{{$lugar->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="col-form-label">Nombre de actividad:</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="col-form-label">Fecha inicio:</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_finalizacion" class="col-form-label">Fecha finalizacion:</label>
                        <input type="date" class="form-control" name="fecha_finalizacion" id="fecha_finalizacion" value="{{ old('fecha_finalizacion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="hora_inicio" class="col-form-label">Hora inicio:</label>
                        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="hora_finalizacion" class="col-form-label">Hora finalizacion:</label>
                        <input type="time" class="form-control" name="hora_finalizacion" id="hora_finalizacion" value="{{ old('hora_finalizacion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="objetivo" class="col-form-label">Objetivo:</label>
                        <textarea required class="form-control" name="objetivo" id="objetivo">{{ old('objetivo') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="observaciones" class="col-form-label">Observaciones:</label>
                        <textarea required class="form-control" name="observaciones" id="observaciones">{{ old('observaciones') }}</textarea>
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
        $('#actividades tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
        });

        $('#actividades').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            order: [
                [0, 'desc']
            ],
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