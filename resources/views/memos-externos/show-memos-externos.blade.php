@extends('layouts.app')

@section('content')
<h3 class="my-4">Detalles del memorandum externos</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('memos-externos.index')}}">Regresar</a>

<div class="mb-3">
    <label for="sala" class="col-form-label">Numero del oficio:</label>
    <input class="form-control" name="sala" id="sala" value="{{$memos->numero_memo}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha" class="col-form-label">Fecha:</label>
    <input type="text" class="form-control" name="fecha" id="fecha" value="{{$memos->fecha_memo}}" readonly>
</div>

<div class="mb-3">
    <label for="tecnico" class="col-form-label">Tecnico:</label>
    <input type="text" class="form-control" name="tecnico" id="tecnico" value="{{$memos->usuarios->nombres}} {{$memos->usuarios->apellidos}}" readonly>
</div>

<div class="mb-3">
    <label for="destino" class="col-form-label">Destino:</label>
    <input type="text" class="form-control" name="destino" id="destino" value="{{$memos->destino}}" readonly>
</div>

<div class="mb-3">
    <label for="asunto" class="col-form-label">Asunto:</label>
    <input type="text" class="form-control" name="asunto" id="asunto" value="{{$memos->asunto}}" readonly>
</div>

<div class="mb-3">
    <label for="estado" class="col-form-label">Estado:</label>
    <input type="text" class="form-control" name="fecha" id="fecha" value="{{$memos->estados->estado}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
    <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$memos->created_at}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
    <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$memos->updated_at}}" readonly>
</div>

@if (Auth::user()->id == $memos->id_usuario_adiciono)
    <form action="{{ route('memos-externos.destroy' , ['memos_externo' => $memos->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <a class="btn btn-success" href="{{ route('memos-externos.edit' , ['memos_externo' => $memos->id])}}">Modificar</a>
        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
    </form>
@endif
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection