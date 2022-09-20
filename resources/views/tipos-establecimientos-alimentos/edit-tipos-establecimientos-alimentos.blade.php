@php
    if (Auth::user()->rol->rol != "Administrador"){
        header("Location: home");
        die();
    }
@endphp

@extends('layouts.app')

@section('content')
    <h3 class="my-4">Modificar Tipo de establecimiento - Alimento</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('tipos-establecimientos-alimentos.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('tipos-establecimientos-alimentos.update', ['tipos_establecimientos_alimento' => $establecimientos->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre del tipo de establecimiento:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$establecimientos->nombre}}" required>
        </div>
        <button type="submit" class="btn btn-success mt-4">Modificar</button>
        <a href="{{route('tipos-establecimientos-alimentos.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
@endsection