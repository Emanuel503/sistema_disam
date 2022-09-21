@php
    if (Auth::user()->rol->rol != "Administrador"){
        header("Location: home");
        die();
    }
@endphp

@extends('layouts.app')

@section('content')
    <h3 class="my-4">Modificar fuente de equipo</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('fuente-equipo.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('fuente-equipo.update', ['fuente_equipo' => $fuentes->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="fuente" class="col-form-label">Fuente:</label>
            <input class="form-control" name="fuente" id="fuente" value="{{$fuentes->fuente}}" required>
        </div>

        <button type="submit" class="btn btn-success mt-4">Modificar</button>
        <a href="{{route('fuente-equipo.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
@endsection