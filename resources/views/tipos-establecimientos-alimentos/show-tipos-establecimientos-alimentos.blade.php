@extends('layouts.app')

@section('content')
    <h3 class="my-4">Detalles del tipo de establecimiento - Alimento</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('tipos-establecimientos-alimentos.index')}}">Regresar</a>

    <div class="mb-3">
        <label for="nombre" class="col-form-label">Nombre del tipo de establecimiento:</label>
        <input class="form-control" name="nombre" id="nombre" value="{{$establecimientos->nombre}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$establecimientos->created_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$establecimientos->updated_at}}" readonly>
    </div>

    <form action="{{ route('tipos-establecimientos-alimentos.destroy' , ['tipos_establecimientos_alimento' => $establecimientos->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <a class="btn btn-success" href="{{ route('tipos-establecimientos-alimentos.edit' , ['tipos_establecimientos_alimento' => $establecimientos->id])}}">Modificar</a>
        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
    </form>
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection