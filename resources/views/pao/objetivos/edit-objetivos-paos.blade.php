@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO - Modificar objetivo</h3>

<a class="btn btn-outline-secondary" href="{{route('objetivos-pao.index', ['pao' => $pao->id])}}">Regresar</a>

@include('layouts.alerts')

<form action="{{ route('objetivos-pao.update', ['objetivo' => $objetivos->id, 'pao' => $pao->id])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="objetivo" class="col-form-label">Objetivos:</label>
        <textarea class="form-control"name="objetivo" id="objetivo" required>{{ $objetivos->objetivo }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Modificar</button>
    <a class="btn btn-secondary" href="{{route('objetivos-pao.index', ['pao' => $pao->id])}}">Cancelar</a>
</form>

@endsection