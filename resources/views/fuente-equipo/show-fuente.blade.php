@php
    if (Auth::user()->rol->rol != "Administrador"){
        header("Location: home");
        die();
    }
@endphp

@extends('layouts.app')

@section('content')
<h3 class="my-4">Detalles de la fuente del equipo</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('fuente-equipo.index')}}">Regresar</a>

<div class="mb-3">
    <label for="fuente" class="col-form-label">Fuente:</label>
    <input class="form-control" name="fuente" id="fuente" value="{{$fuentes->fuente}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
    <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$fuentes->created_at}}" readonly>
</div>

<div class="mb-3">
    <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
    <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$fuentes->updated_at}}" readonly>
</div>

<form action="{{ route('fuente-equipo.destroy' , ['fuente_equipo' => $fuentes->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <a class="btn btn-success" href="{{ route('fuente-equipo.edit' , ['fuente_equipo' => $fuentes->id])}}">Modificar</a>
    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
</form>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection