@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Editar video</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('videos.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('videos.update', ['video' => $videos->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="titulo" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{$videos->titulo}}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripcion:</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required>{{$videos->descripcion}}</textarea>
        </div>

        <div class="mb-3">
            <label for="video" class="col-form-label">Video: </label>
            <input class="form-control" type="file" name="video" id="video" accept="video/*">
        </div>

        <a href="{{route('videos.index')}}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success">Modificar</button>
    </form>
@endsection