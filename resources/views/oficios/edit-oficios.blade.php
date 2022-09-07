@extends('layouts.app')

@section('content')
    <h3 class="my-4">Modificar oficio</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('oficios.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('oficios.update', ['oficio' => $oficios->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_estado" class="col-form-label">Estado:</label>
            <select id="id_estado" class="form-select" name="id_estado">
                @foreach ($estados as $estado)
                    <option @selected($estado->id == $oficios->id_estado) value="{{$estado->id}}">{{$estado->estado}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="usuario" class="col-form-label">Tecnico:</label>
            <select id="usuario" class="form-select" name="usuario">
                @foreach ($usuarios as $usuario )
                <option @selected($usuario->id == $oficios->id_tecnico) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="destino" class="col-form-label">Desino:</label>
            <input type="text" class="form-control" name="destino" id="destino" value="{{ $oficios->destino }}" required>
        </div>

        <div class="mb-3">
            <label for="asunto" class="col-form-label">Asunto:</label>
            <input type="text" class="form-control" name="asunto" id="asunto" value="{{ $oficios->asunto }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-4">Modificar</button>
        <a href="{{route('oficios.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
@endsection