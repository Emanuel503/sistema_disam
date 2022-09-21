@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Detalles del manual</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('manuales.index')}}">Regresar</a>

    <div class="mb-3">
        <label for="titulo" class="col-form-label">Titulo:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" value="{{$manuales->titulo}}" readonly>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="col-form-label">Descripcion:</label>
        <textarea class="form-control" name="descripcion" id="descripcion" readonly>{{$manuales->descripcion}}</textarea>
    </div>

    <div class="text-center">
        <a target="_blank" href="{{url('ayuda/'.$manuales->manual)}}">
            <img alt="PDF" width="150px" class="img-fluid p-1" src="{{url('img/pdf.png')}}"><br>
            <h4 class="btn btn-outline-danger">Ver manual</h4>
        </a>
    </div>

    <form action="{{ route('manuales.destroy' , ['manuale' => $manuales->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-success" href="{{ route('manuales.edit' , ['manuale' => $manuales->id])}}">Modificar</a>
        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
    </form>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection