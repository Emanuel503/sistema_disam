@extends('layouts.app')

@section('content')
    <h3 class="mb-4">PAO - Modificar trimestre</h3>

    <a class="btn btn-outline-secondary" href="{{route('trimestres-pao.index', ['actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('trimestres-pao.update', ['trimestre' => $trimestre->id, 'actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo'=>$objetivo, 'pao' => $pao])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="trimestre" class="col-form-label">Trimestre:</label>
            <input class="form-control" type="text" name="trimestre" id="trimestre" required value="{{ $trimestre->trimestre }}">
        </div>

        <div class="mb-3">
            <label for="programado" class="col-form-label">Programado:</label>
            <input class="form-control" type="text" name="programado" id="programado" required value="{{ $trimestre->programado }}">
        </div>

        <div class="mb-3">
            <label for="realizado" class="col-form-label">Realizado:</label>
            <input class="form-control" type="text" name="realizado" id="realizado" required value="{{ $trimestre->realizado }}">
        </div>

        <div class="mb-3">
            <label for="porcentaje" class="col-form-label">Porcentaje:</label>
            <input class="form-control" type="text" name="porcentaje" id="porcentaje" required value="{{ $trimestre->porcentaje }}" min="0" max="100" step="any">
        </div>

        <div class="mb-3">
            <label for="observacion" class="col-form-label">Obervaciones:</label>
            <input class="form-control" type="text" name="observacion" id="observacion" required value="{{ $trimestre->observacion }}" maxlength="255">
        </div> 

        <div class="mb-3">
            <label for="fecha_inicio" class="col-form-label">Fecha de inicio:</label>
            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required value="{{ $trimestre->fecha_inicio }}">
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="col-form-label">Fecha final:</label>
            <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required value="{{ $trimestre->fecha_fin }}">
        </div>

        <div class="mb-3">
            <label for="id_estado" class="col-form-label">Estado:</label>
            <select id="id_estado" class="form-select" name="id_estado">
                @foreach ($estados as $estado)
                    <option @selected( $estado->id == $trimestre->id_estado) value="{{$estado->id}}">{{$estado->estado}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Modificar</button>
        <a class="btn btn-secondary" href="{{route('trimestres-pao.index', ['actividad' => $actividad ,'seguimiento' => $seguimiento, 'objetivo' => $objetivo, 'pao' => $pao])}}">Cancelar</a>
    </form>
@endsection