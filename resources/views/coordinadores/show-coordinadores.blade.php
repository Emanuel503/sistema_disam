@extends('layouts.app')

@section('content')
<h3 class="my-4">Detalles del coordinador</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('coordinadores.index')}}">Regresar</a>

<div class="mb-3">
    <label for="usuario" class="col-form-label">Técnico usuario:</label>
    <input class="form-control" name="usuario" id="usuario" value="{{$coordinadores->usuario->nombres}} {{$coordinadores->usuario->apellidos}}" readonly>
</div>

<div class="mb-3">
    <label for="tipo_coordinacion" class="col-form-label">Tipo de coordinación:</label>
    <input type="text" class="form-control" name="tipo_coordinacion" id="tipo_coordinacion" value="{{$coordinadores->coordinacion->tipo_coordinacion}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
    <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$coordinadores->created_at}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
    <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$coordinadores->updated_at}}" readonly>
</div>

<form action="{{ route('coordinadores.destroy' , ['coordinadore' => $coordinadores->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <a class="btn btn-success" href="{{ route('coordinadores.edit' , ['coordinadore' => $coordinadores->id])}}">Modificar</a>
    <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
</form>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection