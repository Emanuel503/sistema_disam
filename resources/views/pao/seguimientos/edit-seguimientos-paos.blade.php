@extends('layouts.app')

@section('content')
    <h3 class="mb-4">PAO - Modificar resultado</h3>

    <a class="btn btn-outline-secondary" href="{{route('seguimientos-pao.index', ['objetivo'=>$objetivo, 'pao' => $pao])}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('seguimientos-pao.update', ['seguimiento' => $seguimiento->id, 'objetivo'=>$objetivo, 'pao' => $pao])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="resultado" class="col-form-label">Resultado:</label>
            <textarea class="form-control"name="resultado" id="resultado" required>{{ $seguimiento->resultado }}</textarea>
        </div>

        <div class="mb-3">
            <label for="id_estado" class="col-form-label">Estado:</label>
            <select id="id_estado" class="form-select" name="id_estado">
                @foreach ($estados as $estado)
                    <option @selected( $estado->id == $seguimiento->id_estado) value="{{$estado->id}}">{{$estado->estado}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Modificar</button>
        <a class="btn btn-secondary" href="{{route('seguimientos-pao.index', ['objetivo'=>$objetivo, 'pao' => $pao])}}">Cancelar</a>
    </form>
@endsection