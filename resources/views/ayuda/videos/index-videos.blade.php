@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Ayuda - Videos</h3>

    @if (Auth::user()->id_rol == 1)
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva video</button>
    @endif

    @include('layouts.alerts')

    <div class="row">
        @foreach ($videos as $video )
            <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-4 mx-auto mb-3">
                <div class="card">
                    <video class="ratio ratio-16x9" controls>
                        <source src="{{url('ayuda/'.$video->video)}}" type="video/mp4">
                        Tu navegador no soporta HTML5 video.
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">{{$video->titulo}}</h5>
                        <p class="card-text">{{$video->descripcion}}</p>
                        <form action="{{ route('videos.destroy' , ['video' => $video->id])}}" method="POST">
                            <a target="_blank" href="{{url('ayuda/'.$video->video)}}" class="btn btn-primary">Ver video</a>
                            @if (Auth::user()->id_rol == 1)
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm float-end" href="{{ route('videos.show' , ['video' => $video->id])}}">
                                    {{-- Icono --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg></a>
                                <a class="btn btn-success btn-sm float-end mx-1" href="{{ route('videos.edit' , ['video' => $video->id])}}">
                                    {{-- Icono --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger show_confirm float-end" data-toggle="tooltip" title='Delete'>
                                    {{-- Icono --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            @endif
                        </form>
                    </div>
                </div>   
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Registrar nuevo video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="col-form-label">Titulo:</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="col-form-label">Descripcion:</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="video" class="col-form-label">Video: </label>
                            <input class="form-control" type="file" name="video" id="video" accept="video/*" value="{{old('video')}}" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection