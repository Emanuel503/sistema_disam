@extends('layouts.app')

@section('content')
    <h3 class="mb-4">PAO - Modificar actividad</h3>

    <a class="btn btn-outline-secondary" href="{{route('actividades-pao.index', ['seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('actividades-pao.update', ['actividad' => $actividad->id ,'seguimiento' => $seguimiento, 'objetivo'=>$objetivo, 'pao' => $pao])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="actividad" class="col-form-label">Actividad:</label>
            <textarea class="form-control"name="actividad" id="actividad" required>{{ $actividad->actividad }}</textarea>
        </div>

        <div class="mb-3">
            <label for="indicador" class="col-form-label">Indicador:</label>
            <input class="form-control" type="text" name="indicador" id="indicador" required value="{{ $actividad->indicador }}">
        </div>

        <div class="mb-3">
            <label for="verificacion" class="col-form-label">Verificacion:</label>
            <input class="form-control" type="text" name="verificacion" id="verificacion" required value=" {{ $actividad->verificacion }}">
        </div>

        <div class="mb-3">
            <label for="meta" class="col-form-label">Meta:</label>
            <input class="form-control" type="text" name="meta" id="meta" required value="{{ $actividad->meta }}">
        </div>

        <div class="mb-3">
            <label for="observacion" class="col-form-label">Obervaciones:</label>
            <input class="form-control" type="text" name="observacion" id="observacion" required value="{{ $actividad->observacion }}">
        </div> 

        <div class="mb-3">
            <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required value="{{ $actividad->fecha_inicio }}">
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="col-form-label">Fecha final:</label>
            <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required value="{{ $actividad->fecha_fin }}">
        </div>

        <div class="mb-3">
            <label for="id_dependencia" class="col-form-label">Dependencia:</label>
            <select id="id_dependencia" class="form-select" name="id_dependencia">
                @foreach ($dependencias as $dependencia)
                    <option @selected( $dependencia->id == $actividad->id_dependencia) value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_estado" class="col-form-label">Estado:</label>
            <select id="id_estado" class="form-select" name="id_estado">
                @foreach ($estados as $estado)
                    <option @selected( $estado->id == $actividad->id_estado) value="{{$estado->id}}">{{$estado->estado}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Modificar</button>
        <a class="btn btn-secondary" href="{{route('actividades-pao.index', ['seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}}">Cancelar</a>
    </form>
@endsection