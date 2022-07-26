@extends('layouts.app')

@section('css')
    <style>
        #Bueno {
            color: #198754;
            font-weight: bold;
        }

        #Malo {
            color: #dc3545;
            font-weight: bold;
        }

        #Regular {
            color: grey;
            font-weight: bold;
        }

        .zoom {
            transition: transform .2s; 
        }
        
        .zoom:hover {
            transform: scale(2.5);
            background-color: rgb(218, 218, 218);
            border-radius: 5px;
            padding: 5px;
        }
    </style>
@endsection

@section('content')
    <h3 class="my-4">Detalles del equipo</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('equipos.index')}}">Regresar</a>

    <div class="mb-3">
        <label for="codigo" class="col-form-label">Código del equipo:</label>
        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $equipos->codigo }}" readonly>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="col-form-label">Descripción del equipo:</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $equipos->descripciones->descripcion }}" readonly>
    </div>

    <div class="mb-3">
        
        <label for="unidad" class="col-form-label">Unidad del equipo:</label>
        <input type="text" class="form-control" name="unidad" id="unidad" value="{{ $equipos->unidades->nombre}}" readonly>
    </div>

    <div class="mb-3">
        
        <label for="ubicacion" class="col-form-label">Ubicación del equipo:</label>
        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{ $equipos->ubicaciones->ubicacion}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fuente" class="col-form-label">Fuente del equipo:</label>
        <input type="text" class="form-control" name="fuente" id="fuente" value="{{ $equipos->fuentes->fuente}}" readonly>
    </div>

    <div class="mb-3">
        <label for="marca" class="col-form-label">Marca del equipo:</label>
        <input type="text" class="form-control" name="marca" id="marca" value="{{ $equipos->marca }}" readonly>
    </div>

    <div class="mb-3">
        <label for="modelo" class="col-form-label">Modelo del equipo:</label>
        <input type="text" class="form-control" name="modelo" id="modelo" value="{{ $equipos->modelo }}" readonly>
    </div>

    <div class="mb-3">
        <label for="serie" class="col-form-label">Serie del equipo:</label>
        <input type="text" class="form-control" name="serie" id="serie" value="{{ $equipos->serie }}" readonly>
    </div>

    <div class="mb-3">
        <label for="color" class="col-form-label">Color del equipo:</label>
        <input type="text" class="form-control" name="color" id="color" value="{{ $equipos->color }}" readonly>
    </div>

    <div class="mb-3">
        <label for="estado" class="col-form-label">Estado del equipo:</label>
        <input id="{{$equipos->estados->estado}}" type="text" class="form-control" name="estado" value="{{ $equipos->estados->estado}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_adquisicion" class="col-form-label">Fecha de adquisición:</label>
        <input type="date" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion" value="{{ $equipos->fecha_adquisicion }}" readonly>
    </div>

    <div class="mb-3">
        <label for="valor_adquisicion" class="col-form-label">Valor de adquisición:</label>
        <input type="number" step="any" class="form-control" name="valor_adquisicion" id="valor_adquisicion" value="{{ $equipos->valor_adquisicion }}" readonly>
    </div>

    <div class="mb-3">
        <label for="valor_actual" class="col-form-label">Valor actual:</label>
        <input type="number" step="any" class="form-control" name="valor_actual" id="valor_actual" value="{{ $equipos->valor_actual }}" readonly>
    </div>

    <div class="mb-3">
        <label for="observacion" class="col-form-label">Observación:</label>
        <input type="text" class="form-control" name="observacion" id="observacion" value="{{ $equipos->observacion }}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$equipos->created_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$equipos->updated_at}}" readonly>
    </div>

    @if ($equipos->imagen == null) 
        <span class="badge bg-secondary mt-3 mb-5">El equipo no tiene imagen</span> 
    @else
        <center><a target="_blank" href="{{ url('images/'.$equipos->imagen) }}"><img class="img-fluid m-4 zoom" src="{{ url('images/'.$equipos->imagen) }}" width="230px"></a></center><br>
    @endif

    <form action="{{ route('equipos.destroy' , ['equipo' => $equipos->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <a class="btn btn-success" href="{{ route('equipos.edit' , ['equipo' => $equipos->id])}}">Modificar</a>
        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
    </form>
@endsection

@section('js')
   @include('layouts.confirmar-eliminar')
@endsection