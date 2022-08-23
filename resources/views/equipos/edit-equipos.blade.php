@extends('layouts.app')

@section('content')

<h3 class="my-4">Modificar equipo</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('equipos.index')}}">Regresar</a>

@include('layouts.alerts')
@include('equipos.alerts')

<form action="{{ route('equipos.update', ['equipo' => $equipos->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    <div class="mb-3">
        <label for="codigo" class="col-form-label">Código del equipo:</label>
        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $equipos->codigo }}" required>
    </div>
    
    <div class="mb-3">
        <label for="descripcion" class="col-form-label">Descripción del equipo:</label>
        <select id="descripcion" class="form-select" name="descripcion">
            @foreach ($descripciones as $descripcion)
                <option @selected($equipos->id_descripcion==$descripcion->id) value="{{$descripcion->id}}">{{$descripcion->descripcion}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="unidad" class="col-form-label">Unidad del equipo:</label>
        <select id="unidad" class="form-select" name="unidad">
            @foreach ($unidades as $unidad)
            <option @selected($equipos->id_unidad==$unidad->id) value="{{$unidad->id}}">{{$unidad->nombre}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="ubicacion" class="col-form-label">Ubicación del equipo:</label>
        <select id="ubicacion" class="form-select" name="ubicacion">
            @foreach ($ubicaciones as $ubicacion)
                <option @selected($equipos->id_ubicacion==$ubicacion->id) value="{{$ubicacion->id}}">{{$ubicacion->ubicacion}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="marca" class="col-form-label">Marca del equipo:</label>
        <input type="text" class="form-control" name="marca" id="marca" value="{{ $equipos->marca }}" required>
    </div>
    
    <div class="mb-3">
        <label for="modelo" class="col-form-label">Modelo del equipo:</label>
        <input type="text" class="form-control" name="modelo" id="modelo" value="{{ $equipos->modelo }}" required>
    </div>
    
    <div class="mb-3">
        <label for="serie" class="col-form-label">Serie del equipo:</label>
        <input type="text" class="form-control" name="serie" id="serie" value="{{ $equipos->serie }}" required>
    </div>
    
    <div class="mb-3">
        <label for="color" class="col-form-label">Color del equipo:</label>
        <input type="text" class="form-control" name="color" id="color" value="{{ $equipos->color }}" required>
    </div>
    
    <div class="mb-3">
        <label for="estado" class="col-form-label">Estado del equipo:</label>
        <select id="estado" class="form-select" name="estado">
            @foreach ($estados as $estado)
            <option @selected($equipos->id_estado==$estado->id) value="{{$estado->id}}">{{$estado->estado}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="fuente" class="col-form-label">Fuente del equipo:</label>
        <select id="fuente" class="form-select" name="fuente">
            @foreach ($fuentes as $fuente)
            <option @selected($equipos->id_fuente==$fuente->id) value="{{$fuente->id}}">{{$fuente->fuente}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="fecha_adquisicion" class="col-form-label">Fecha de adquisición:</label>
        <input type="date" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion" value="{{ $equipos->fecha_adquisicion }}" required>
    </div>
    
    <div class="mb-3">
        <label for="valor_adquisicion" class="col-form-label">Valor de adquisición:</label>
        <input type="number" step="any" class="form-control" name="valor_adquisicion" id="valor_adquisicion" value="{{ $equipos->valor_adquisicion }}" required>
    </div>
    
    <div class="mb-3">
        <label for="valor_actual" class="col-form-label">Valor actual:</label>
        <input type="number" step="any" class="form-control" name="valor_actual" id="valor_actual" value="{{ $equipos->valor_actual }}" required>
    </div>
    
    <div class="mb-3">
        <label for="observacion" class="col-form-label">Observación:</label>
        <input type="text" class="form-control" name="observacion" id="observacion" value="{{ $equipos->observacion }}" required>
    </div>

    <div class="mb-3">
        <label for="image" class="col-form-label">Imagen (Opcional):</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
    </div>

    <button type="submit" class="btn btn-success mt-4">Modificar</button>
    <a href="{{route('equipos.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
</form>
@endsection