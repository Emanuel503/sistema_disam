@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')

<style>
    #Bueno {
        color: #198754;
        font-weight: bold;
    }

    #Malo {
        color: #dc3545;
        font-weight: bold;
    }

    #Regular {
        color: grey;
        font-weight: bold;
    }
</style>

<h3 class="mb-4">Equipos y Mobiliarios</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo equipo</button>

@include('layouts.alerts')

@if (sizeof($equipos) > 0)
<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>Código</th>
                <th>Descripción</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Imagen</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
            <tr>
                <td>{{$equipo->codigo}}</td>
                <td>{{$equipo->descripciones->descripcion}}</td>
                <td>{{$equipo->marca}}</td>
                <td>{{$equipo->modelo}}</td>
                <td id="{{$equipo->estados->estado}}">{{$equipo->estados->estado}}</td>
                <td class="text-center"> @if ($equipo->imagen == null) __ @else <img class="img-fluid" src="{{ url('images/'.$equipo->imagen) }}" width="100px">@endif </td>
                <td>
                    <form action="{{ route('equipos.destroy' , ['equipo' => $equipo->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div>
                            <a class="btn btn-info btn-sm mb-1" href="{{ route('equipos.show' , ['equipo' => $equipo->id])}}">Ver</a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('equipos.edit' , ['equipo' => $equipo->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<br><span class="badge bg-secondary">No hay equipos registrados</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registra nuevo equipo o mobiliario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="codigo" class="col-form-label">Código del equipo:</label>
                        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ old('codigo') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="col-form-label">Descripción del equipo:</label>
                        <select id="descripcion" class="form-select" name="descripcion">
                            @foreach ($descripciones as $descripcion)
                            <option @selected(old('descripcion')==$descripcion->id) value="{{$descripcion->id}}">{{$descripcion->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="unidad" class="col-form-label">Unidad del equipo:</label>
                        <select id="unidad" class="form-select" name="unidad">
                            @foreach ($unidades as $unidad)
                            <option @selected(old('unidad')==$unidad->id) value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="col-form-label">Ubicación del equipo:</label>
                        <select id="ubicacion" class="form-select" name="ubicacion">
                            @foreach ($ubicaciones as $ubicacion)
                            <option @selected(old('ubicacion')==$ubicacion->id) value="{{$ubicacion->id}}">{{$ubicacion->ubicacion}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="marca" class="col-form-label">Marca del equipo:</label>
                        <input type="text" class="form-control" name="marca" id="marca" value="{{ old('marca') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="col-form-label">Modelo del equipo:</label>
                        <input type="text" class="form-control" name="modelo" id="modelo" value="{{ old('modelo') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="serie" class="col-form-label">Serie del equipo:</label>
                        <input type="text" class="form-control" name="serie" id="serie" value="{{ old('serie') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="col-form-label">Color del equipo:</label>
                        <input type="text" class="form-control" name="color" id="color" value="{{ old('color') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="col-form-label">Estado del equipo:</label>
                        <select id="estado" class="form-select" name="estado">
                            @foreach ($estados as $estado)
                            <option @selected(old('estado')==$estado->id) value="{{$estado->id}}">{{$estado->estado}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fuente" class="col-form-label">Fuente del equipo:</label>
                        <select id="fuente" class="form-select" name="fuente">
                            @foreach ($fuentes as $fuente)
                            <option @selected(old('fuente')==$fuente->id) value="{{$fuente->id}}">{{$fuente->fuente}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_adquisicion" class="col-form-label">Fecha de adquisición:</label>
                        <input type="date" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion" value="{{ old('fecha_adquisicion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="valor_adquisicion" class="col-form-label">Valor de adquisición:</label>
                        <input type="number" step="any" class="form-control" name="valor_adquisicion" id="valor_adquisicion" value="{{ old('valor_adquisicion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="valor_actual" class="col-form-label">Valor actual:</label>
                        <input type="number" step="any" class="form-control" name="valor_actual" id="valor_actual" value="{{ old('valor_actual') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="observacion" class="col-form-label">Observación:</label>
                        <input type="text" class="form-control" name="observacion" id="observacion" value="{{ old('observacion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="col-form-label">Imagen (Opcional):</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
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
   @include('layouts.confirmar-eliminar')
   @include('layouts.data-table-js')
@endsection