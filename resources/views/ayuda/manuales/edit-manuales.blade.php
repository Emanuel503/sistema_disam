@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Modificar manual</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('manuales.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('manuales.update', ['manuale' => $manuales->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="titulo" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{$manuales->titulo}}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripcion:</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required>{{$manuales->descripcion}}</textarea>
        </div>

        <div class="mb-3">
            <label for="manual" class="col-form-label">Manual: </label>
            <input class="form-control" type="file" name="manual" id="manual" accept="application/pdf">
        </div>

        <a href="{{route('manuales.index')}}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success">Modificar</button>
    </form>
@endsection