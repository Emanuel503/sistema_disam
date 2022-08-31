@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO - Modificar tarea</h3>

<a class="btn btn-outline-secondary" href="{{route('tareas-pao.index', ['trimestre' => $trimestre ,'actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}">Regresar</a>

@include('layouts.alerts')

<form action="{{ route('tareas-pao.update', ['tarea' => $tarea->id ,'trimestre' => $trimestre, 'actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo'=>$objetivo, 'pao' => $pao])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="tarea" class="col-form-label">Tarea:</label>
        <input class="form-control" type="text" name="tarea" id="tarea" required value="{{ $tarea->tarea }}" maxlength="500">
    </div>
    
    <div class="mb-3">
        <label for="observacion" class="col-form-label">Obervaciones:</label>
        <input class="form-control" type="text" name="observacion" id="observacion" required value="{{ $tarea->observacion }}">
    </div>

    <div class="mb-3">
        <label for="tiempo" class="col-form-label">Tiempo (horas):</label>
        <input class="form-control" type="number" name="tiempo" id="tiempo" required value="{{ $tarea->tiempo }}" min="0" step="any">
    </div>

    <div class="mb-3">
        <label for="fecha" class="col-form-label">Fecha:</label>
        <input class="form-control" type="date" name="fecha" id="fecha" required value="{{ $tarea->fecha }}">
    </div>

    <div class="mb-3">
        <label for="id_usuario" class="col-form-label">Tenico:</label>
        <select id="id_usuario" class="form-select" name="id_usuario">
            @foreach ($usuarios as $usuario)
                <option @selected( $usuario->id == $tarea->id_usuario) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_estado" class="col-form-label">Estado:</label>
        <select id="id_estado" class="form-select" name="id_estado">
            @foreach ($estados as $estado)
                <option @selected( $estado->id == $tarea->id_estado) value="{{$estado->id}}">{{$estado->estado}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Modificar</button>
    <a class="btn btn-secondary" href="{{route('tareas-pao.index', ['trimestre' => $trimestre ,'actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}">Cancelar</a>
</form>

@endsection