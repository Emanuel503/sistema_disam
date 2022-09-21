@extends('layouts.app')

@section('content')
    <h3 class="my-4">Detalles del oficio</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('oficios.index')}}">Regresar</a>

    <div class="mb-3">
        <label for="sala" class="col-form-label">Numero del oficio:</label>
        <input class="form-control" name="sala" id="sala" value="{{$oficios->numero_oficio}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha" class="col-form-label">Fecha:</label>
        <input type="text" class="form-control" name="fecha" id="fecha" value="{{$oficios->fecha_oficio}}" readonly>
    </div>

    <div class="mb-3">
        <label for="tecnico" class="col-form-label">Tecnico:</label>
        <input type="text" class="form-control" name="tecnico" id="tecnico" value="{{$oficios->usuarios->nombres}} {{$oficios->usuarios->apellidos}}" readonly>
    </div>

    <div class="mb-3">
        <label for="destino" class="col-form-label">Destino:</label>
        <input type="text" class="form-control" name="destino" id="destino" value="{{$oficios->destino}}" readonly>
    </div>

    <div class="mb-3">
        <label for="asunto" class="col-form-label">Asunto:</label>
        <input type="text" class="form-control" name="asunto" id="asunto" value="{{$oficios->asunto}}" readonly>
    </div>

    <div class="mb-3">
        <label for="estado" class="col-form-label">Estado:</label>
        <input type="text" class="form-control" name="fecha" id="fecha" value="{{$oficios->estados->estado}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$oficios->created_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$oficios->updated_at}}" readonly>
    </div>

    @if (Auth::user()->id == $oficios->id_usuario_adiciono)
        <form action="{{ route('oficios.destroy' , ['oficio' => $oficios->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <a class="btn btn-success" href="{{ route('oficios.edit' , ['oficio' => $oficios->id])}}">Modificar</a>
            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
        </form>
    @endif
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection