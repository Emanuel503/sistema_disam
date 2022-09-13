@extends('layouts.app')

@section('content')
    <h3 class="my-4">Modificar seguimiento - correspondencia</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('correspondencias-seguimientos.index', ['correspondencia' => $correspondencia->id])}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('correspondencias-seguimientos.update', ['correspondencia' => $correspondencia->id, 'seguimiento' => $seguimientos]) }}" method="POST">
        @csrf
        @method('PATCH')
    
        <div class="mb-3">
            <label for="seguimiento" class="col-form-label">Seguimiento:</label>
            <textarea name="seguimiento" id="seguimiento" class="form-control">{{$seguimientos->seguimiento}}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-4">Modificar</button>
        <a href="{{route('correspondencias-seguimientos.index', ['correspondencia' => $correspondencia->id])}}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
@endsection