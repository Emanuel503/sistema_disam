@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO - Trimestres</h3>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">PAO</li>
      <li class="breadcrumb-item">Objetivos</li>
      <li class="breadcrumb-item">Seguimientos</li>
      <li class="breadcrumb-item">Actividades</li>
      <li class="breadcrumb-item active" aria-current="page">Trimestres</li>
    </ol>
</nav>

<a class="btn btn-outline-secondary" href="{{route('actividades-pao.index', ['seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}">Regresar</a>

<button type="button" class="btn btn-primary mb-4 float-right float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo trimestre</button><br><br>

@include('layouts.alerts')

<h4 class="text-center">{{$pao->dependencia}}</h4>
<p class="text-center">
    <b>Objetivo:</b> {{$objetivo->objetivo}}<br>
    <b>Resultado:</b> {{$seguimiento->resultado}}<br>
    <b>Actividad:</b> {{$actividad->actividad}}
</p>

<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Trimestres</th>
                <th>Programado</th>
                <th>Realizado</th>
                <th>%</th>
                <th>Observaciones</th>
                <th>Fecha inicio</th>
                <th>Fecha Final</th>
                <th>Estado</th>
                <th>Tareas</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trimestres as $trimestre)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$trimestre->trimestre}}</td>
                <td>{{$trimestre->programado}}</td>
                <td>{{$trimestre->realizado}}</td>
                <td>{{$trimestre->porcentaje}}</td>
                <td>{{$trimestre->observacion}}</td>
                <td>{{$trimestre->fecha_inicio}}</td>
                <td>{{$trimestre->fecha_fin}}</td>
                <td>{{$trimestre->estado}}</td>
                <td class="text-center">
                    <a class="btn btn-info btn-sm" href="{{route('tareas-pao.index', ['trimestre' => $trimestre->id, 'actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id])}}">Ver</a>
                </td>
                <td class="col-2">
                    <form action="{{ route('trimestres-pao.destroy' , ['trimestre' => $trimestre->id, 'actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-success btn-sm" href="{{route('trimestres-pao.edit', ['trimestre' => $trimestre->id, 'actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id])}}">Modificar</a>
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
                <h5 class="modal-title" id="modalTitulo">Registrar nuevo trimestre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('trimestres-pao.store', ['actividad' => $actividad->id ,'seguimiento' => $seguimiento->id,'objetivo' => $objetivo->id, 'pao' => $pao->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_actividad" value="{{$actividad->id}}">

                    <div class="mb-3">
                        <label for="trimestre" class="col-form-label">Trimestre:</label>
                        <input class="form-control" type="text" name="trimestre" id="trimestre" required value="{{ old('trimestre') }}">
                    </div>

                    <div class="mb-3">
                        <label for="programado" class="col-form-label">Programado:</label>
                        <input class="form-control" type="text" name="programado" id="programado" required value="{{ old('programado') }}">
                    </div>

                    <div class="mb-3">
                        <label for="realizado" class="col-form-label">Realizado:</label>
                        <input class="form-control" type="text" name="realizado" id="realizado" required value="{{ old('realizado') }}">
                    </div>

                    <div class="mb-3">
                        <label for="porcentaje" class="col-form-label">Porcentaje:</label>
                        <input class="form-control" type="number" name="porcentaje" id="porcentaje" required value="{{ old('porcentaje') }}" min="0" max="100" step="any">
                    </div>

                    <div class="mb-3">
                        <label for="observacion" class="col-form-label">Obervaciones:</label>
                        <input class="form-control" type="text" name="observacion" id="observacion" required value="{{ old('observacion') }}" maxlength="255">
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