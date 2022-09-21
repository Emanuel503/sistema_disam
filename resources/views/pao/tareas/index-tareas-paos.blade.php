@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
    <h3 class="mb-4">PAO - Tareas</h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">PAO</li>
        <li class="breadcrumb-item">Objetivos</li>
        <li class="breadcrumb-item">Seguimientos</li>
        <li class="breadcrumb-item">Actividades</li>
        <li class="breadcrumb-item">Trimestres</li>
        <li class="breadcrumb-item active" aria-current="page">Tareas</li>
        </ol>
    </nav>

    <a class="btn btn-outline-secondary" href="{{route('trimestres-pao.index', ['actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}">Regresar</a>

    <button type="button" class="btn btn-primary mb-4 float-right float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva tarea</button><br><br>

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
                    <th>Tarea</th>
                    <th>Observaciones</th>
                    <th>Tiempo (horas)</th>
                    <th>Fecha</th>
                    <th>Tecnico</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$tarea->tarea}}</td>
                    <td>{{$tarea->observacion}}</td>
                    <td>{{$tarea->tiempo}}</td>
                    <td>{{$tarea->fecha}}</td>
                    <td>{{$tarea->usuario}}</td>
                    <td>{{$tarea->estado}}</td>
                    <td class="col-2">
                        <form action="{{ route('tareas-pao.destroy' , ['tarea' => $tarea->id ,'trimestre' => $trimestre->id, 'actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-success btn-sm" href="{{route('tareas-pao.edit', ['tarea' => $tarea->id , 'trimestre' => $trimestre->id, 'actividad' => $actividad->id ,'seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id])}}">Modificar</a>
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
                    <h5 class="modal-title" id="modalTitulo">Registrar nueva tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tareas-pao.store', ['trimestre' => $trimestre->id ,'actividad' => $actividad->id ,'seguimiento' => $seguimiento->id,'objetivo' => $objetivo->id, 'pao' => $pao->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_trimestre" value="{{$trimestre->id}}">

                        <div class="mb-3">
                            <label for="tarea" class="col-form-label">Tarea:</label>
                            <input class="form-control" type="text" name="tarea" id="tarea" required value="{{ old('tarea') }}" maxlength="500">
                        </div>
                        
                        <div class="mb-3">
                            <label for="observacion" class="col-form-label">Obervaciones:</label>
                            <input class="form-control" type="text" name="observacion" id="observacion" required value="{{ old('observacion') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tiempo" class="col-form-label">Tiempo (horas):</label>
                            <input class="form-control" type="number" name="tiempo" id="tiempo" required value="{{ old('tiempo') }}" min="0" step="any">
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="col-form-label">Fecha:</label>
                            <input class="form-control" type="date" name="fecha" id="fecha" required value="{{ old('fecha') }}">
                        </div>

                        <div class="mb-3">
                            <label for="id_usuario" class="col-form-label">Tenico:</label>
                            <select id="id_usuario" class="form-select" name="id_usuario">
                                @foreach ($usuarios as $usuario)
                                    <option @selected($usuario->id == old('id_usuario')) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
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