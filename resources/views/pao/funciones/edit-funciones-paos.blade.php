@extends('layouts.app')

@section('content')
    <h3 class="mb-4">PAO - Modificar funcion</h3>

    <a class="btn btn-outline-secondary" href="{{route('funciones-pao.index', ['pao' => $pao->id])}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('funciones-pao.update', ['funcion' => $funciones->id, 'pao' => $pao->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="funcion" class="col-form-label">Funcion:</label>
            <textarea class="form-control"name="funcion" id="funcion" required>{{ $funciones->funcion}}</textarea>
        </div>
        <a class="btn btn-secondary" href="{{route('funciones-pao.index', ['pao' => $pao->id])}}">Cancelar</a>
        <button type="submit" class="btn btn-success">Modificar</button>
    </form>
@endsection