@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO - Actividades</h3>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">PAO</li>
      <li class="breadcrumb-item">Objetivos</li>
      <li class="breadcrumb-item">Seguimientos</li>
      <li class="breadcrumb-item active" aria-current="page">Actividades</li>
    </ol>
</nav>

<a class="btn btn-outline-secondary" href="{{route('seguimientos-pao.index', ['objetivo' => $objetivo, 'pao' => $pao])}}">Regresar</a>

<button type="button" class="btn btn-primary mb-4 float-right float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva actividad</button><br><br>

@include('layouts.alerts')

<h4 class="text-center">{{$pao->dependencia}}</h4>
<p class="text-center">
    <b>Objetivo:</b> {{$objetivo->objetivo}}<br>
    <b>Resultado:</b> {{$seguimiento->resultado}}
</p>

<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Actividad</th>
                <th>Indicador</th>
                <th>Verificador</th>
                <th>Meta</th>
                <th>Fecha inicio</th>
                <th>Fecha Final</th>
                <th>Responsable</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Trimestres</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$actividad->actividad}}</td>
                <td>{{$actividad->indicador}}</td>
                <td>{{$actividad->verificacion}}</td>
                <td>{{$actividad->meta}}</td>
                <td>{{$actividad->fecha_inicio}}</td>
                <td>{{$actividad->fecha_fin}}</td>
                <td>{{$actividad->nombre}}</td>
                <td>{{$actividad->observacion}}</td>
                <td>{{$actividad->estado}}</td>
                <td class="text-center">
                    <a class="btn btn-info btn-sm" href="{{route('trimestres-pao.index', ['actividad' => $actividad->id, 'seguimiento' => $seguimiento->id, 'objetivo' => $objetivo->id, 'pao'=> $pao->id])}}">Ver</a>
                </td>
                <td class="col-2">
                    <form action="{{ route('actividades-pao.destroy' , ['actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-success btn-sm" href="{{route('actividades-pao.edit', ['actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id])}}">Modificar</a>
                        <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registrar nuevo resultado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actividades-pao.store', ['seguimiento' => $seguimiento->id,'objetivo' => $objetivo->id, 'pao' => $pao->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_seguimiento" value="{{$seguimiento->id}}">
                    <div class="mb-3">
                        <label for="actividad" class="col-form-label">Actividad:</label>
                        <textarea class="form-control"name="actividad" id="actividad" required>{{ old('actividad') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="indicador" class="col-form-label">Indicador:</label>
                        <input class="form-control" type="text" name="indicador" id="indicador" required value="{{ old('indicador') }}">
                    </div>

                    <div class="mb-3">
                        <label for="verificacion" class="col-form-label">Verificacion:</label>
                        <input class="form-control" type="text" name="verificacion" id="verificacion" required value="{{ old('verificacion') }}">
                    </div>

                    <div class="mb-3">
                        <label for="meta" class="col-form-label">Meta:</label>
                        <input class="form-control" type="text" name="meta" id="meta" required value="{{ old('meta') }}">
                    </div>

                    <div class="mb-3">
                        <label for="observacion" class="col-form-label">Obervaciones:</label>
                        <input class="form-control" type="text" name="observacion" id="observacion" required value="{{ old('observacion') }}">
                    </div> 

                    <div class="mb-3">
                        <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
                        <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required value="{{ old('fecha_inicio') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_fin" class="col-form-label">Fecha final:</label>
                        <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required value="{{ old('fecha_fin') }}">
                    </div>

                    <div class="mb-3">
                        <label for="id_dependencia" class="col-form-label">Dependencia:</label>
                        <select id="id_dependencia" class="form-select" name="id_dependencia">
                            @foreach ($dependencias as $dependencia)
                                <option @selected($dependencia->id == old('id_dependencia')) value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_estado" class="col-form-label">Estado:</label>
                        <select id="id_estado" class="form-select" name="id_estado">
                            @foreach ($estados as $estado)
                                <option @selected($estado->id == old('id_estado')) value="{{$estado->id}}">{{$estado->estado}}</option>
                            @endforeach
                        </select>
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