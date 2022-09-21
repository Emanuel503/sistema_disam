@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Detalles del video</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('videos.index')}}">Regresar</a>

    <div class="mb-3">
        <label for="titulo" class="col-form-label">Titulo:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" value="{{$videos->titulo}}" readonly>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="col-form-label">Descripcion:</label>
        <textarea class="form-control" name="descripcion" id="descripcion" readonly>{{$videos->descripcion}}</textarea>
    </div>

    <div class="col-4 mb-3">
        <video class="ratio ratio-16x9" controls>
            <source src="{{url('ayuda/'.$videos->video)}}" type="video/mp4">
            Tu navegador no soporta HTML5 video.
        </video>
    </div>

    <form action="{{ route('videos.destroy' , ['video' => $videos->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-success" href="{{ route('videos.edit' , ['video' => $videos->id])}}">Modificar</a>
        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
    </form>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection