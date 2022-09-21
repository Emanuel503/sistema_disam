@extends('layouts.app')

@section('content')
    <h3 class="my-4">Detalles del usuario</h3>

    @if (Auth::user()->id_rol == 1)
        <a class="btn btn-outline-secondary mb-4" href="{{ route('users.index')}}">Regresar</a>
    @else
        <a class="btn btn-outline-secondary mb-4" href="{{ route('home')}}">Regresar</a>
    @endif

    <div class="mb-3">
        <label for="id_rol" class="col-form-label">Rol de usuario:</label>
        <input class="form-control" name="id_rol" id="id_rol" value="{{$usuario->rol->rol}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_dependencia" class="col-form-label">Dependencia:</label>
        <input class="form-control" name="id_rol" id="id_rol" value="{{$usuario->dependencia->nombre}}" readonly>
    </div>

    <div class="mb-3">
        <label for="codigo_marcacion" class="col-form-label">Código de marcación:</label>
        <input type="text" class="form-control" name="codigo_marcacion" id="codigo_marcacion" value="{{$usuario->codigo_marcacion}}" readonly>
    </div>

    <div class="mb-3">
        <label for="usuario" class="col-form-label">Nombre de usuario:</label>
        <input type="text" class="form-control" name="usuario" id="usuario" value="{{$usuario->usuario}}" readonly>
    </div>

    <div class="mb-3">
        <label for="email" class="col-form-label">Correo electronico:</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$usuario->email}}" readonly>
    </div>

    <div class="mb-3">
        <label for="nombres" class="col-form-label">Nombres:</label>
        <input type="text" class="form-control" name="nombres" id="nombres" value="{{$usuario->nombres}}" readonly>
    </div>

    <div class="mb-3">
        <label for="apellidos" class="col-form-label">Apellidos:</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{$usuario->apellidos}}" readonly>
    </div>

    <div class="mb-3">
        <label for="cargo" class="col-form-label">Cargo:</label>
        <input type="text" class="form-control" name="cargo" id="cargo" value="{{$usuario->cargo}}" readonly>
    </div>

    <div class="mb-3">
        <label for="ubicacion" class="col-form-label">Ubicacion:</label>
        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{$usuario->ubicacion}}" readonly>
    </div>

    <div class="mb-3">
        <label for="telefono" class="col-form-label">Telefono:</label>
        <input type="text" class="form-control" name="telefono" id="telefono" value="{{$usuario->telefono}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_ingreso" class="col-form-label">Fecha de ingreso al ministerio:</label>
        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="{{$usuario->fecha_ingreso}}" readonly>
    </div>

    @php
        date_default_timezone_set('America/El_Salvador');    
        $fecha_actual = date('Y-m-d', time());  

        $fecha_ingreso = new DateTime($usuario->fecha_ingreso);
        $fecha_actual = new DateTime($fecha_actual);
        $tiempo_trabajando = $fecha_ingreso->diff($fecha_actual);
    @endphp

    <div class="mb-3">
        <label for="tiempo_trabajando" class="col-form-label">Años trabajando:</label>
        <input type="text" class="form-control" name="tiempo_trabajando" id="tiempo_trabajando" value="{{$tiempo_trabajando->format("%y")}}" readonly>
    </div>

    <div class="mb-3">
        <label for="dias_enfermedad_informales" class="col-form-label">Dias totales de permisos de enfermedad informales:</label>
        <input type="number" min="0" step="any" class="form-control" name="dias_enfermedad_informales" id="dias_enfermedad_informales" value="{{$usuario->dias_enfermedad_informales }}" readonly>
    </div>

    <div class="mb-3">
        <label for="dias_enfermedad_formales" class="col-form-label">Dias totales de permisos de enfermedad formales:</label>
        <input type="number" min="0" step="any" class="form-control" name="dias_enfermedad_formales" id="dias_enfermedad_formales" value="{{ $usuario->dias_enfermedad_formales }}" readonly>
    </div>

    <div class="mb-3">
        <label for="dias_personales" class="col-form-label">Dias totales de permisos personales:</label>
        <input type="number" min="0" step="any" class="form-control" name="dias_personales" id="dias_personales" value="{{ $usuario->dias_personales }}" readonly>
    </div>

    <label class="col-form-label">Habilitar para motorista:</label>
    <div class="mb-3">
        <input disabled class="form-check-input" type="radio" name="motorista" id="si" value="si" @checked($usuario->motorista == "si")>
        <label class="form-check-label" for="si">Si</label>
        <span class="mx-3"></span>
        <input disabled class="form-check-input" type="radio" name="motorista" id="no" value="no" @checked($usuario->motorista == "no")>
        <label class="form-check-label" for="no">No</label>
    </div>

    <div class="mb-3">
        <label for="id_estado" class="col-form-label">Estado:</label>
        <input type="text" class="form-control" name="id_estado" id="id_estado" value="{{$usuario->estadoUsuario->estado}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$usuario->created_at}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$usuario->updated_at}}" readonly>
    </div>

    @if (Auth::user()->id_rol == 1)
        <form action="{{ route('users.destroy' , ['user' => $usuario->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <a class="btn btn-success" href="{{ route('users.edit' , ['user' => $usuario->id])}}">Modificar</a>
            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
        </form>
    @endif
@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection