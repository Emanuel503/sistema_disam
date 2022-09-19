@php
if (Auth::user()->rol->rol != "Administrador"){
header("Location: home");
die();
}
@endphp

@extends('layouts.app')

@section('content')
<h3 class="my-4">Modificar usuario</h3>

<a class="btn btn-outline-secondary mb-4" href="{{ route('users.index')}}">Regresar</a>

@include('layouts.alerts')

<form action="{{ route('users.update', ['user' => $usuario->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="id_rol" class="col-form-label">Rol de usuario:</label>
        <select id="id_rol" class="form-select" name="id_rol">
            @foreach ($roles as $rol )
            <option @selected($usuario->id_rol == $rol->id ) value="{{$rol->id}}">{{$rol->rol}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_dependencia" class="col-form-label">Dependencia:</label>
        <select id="id_dependencia" class="form-select" name="id_dependencia">
            @foreach ($dependencias as $dependencia )
            <option @selected($usuario->id_dependencia == $dependencia->id ) value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="codigo_marcacion" class="col-form-label">Código de marcación:</label>
        <input type="text" class="form-control" name="codigo_marcacion" id="codigo_marcacion" value="{{$usuario->codigo_marcacion}}" required>
    </div>

    <div class="mb-3">
        <label for="usuario" class="col-form-label">Nombre de usuario:</label>
        <input type="text" class="form-control" name="usuario" id="usuario" value="{{$usuario->usuario}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="col-form-label">Correo electronico:</label>
        <input type="email" class="form-control" name="email" id="email" value="{{$usuario->email}}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="col-form-label">Contraseña:</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="col-form-label">Confirmar contraseña:</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>

    <div class="mb-3">
        <label for="nombres" class="col-form-label">Nombres:</label>
        <input type="text" class="form-control" name="nombres" id="nombres" value="{{$usuario->nombres}}" required>
    </div>

    <div class="mb-3">
        <label for="apellidos" class="col-form-label">Apellidos:</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{$usuario->apellidos}}" required>
    </div>

    <div class="mb-3">
        <label for="cargo" class="col-form-label">Cargo:</label>
        <input type="text" class="form-control" name="cargo" id="cargo" value="{{$usuario->cargo}}" required>
    </div>

    <div class="mb-3">
        <label for="ubicacion" class="col-form-label">Ubicacion:</label>
        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{$usuario->ubicacion}}" required>
    </div>

    <div class="mb-3">
        <label for="fecha_ingreso" class="col-form-label">Fecha de ingreso al ministerio:</label>
        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="{{$usuario->fecha_ingreso}}" required>
    </div>

    <div class="mb-3">
        <label for="dias_enfermedad_informales" class="col-form-label">Dias totales de permisos de enfermedad informales:</label>
        <input type="number" min="0" class="form-control" name="dias_enfermedad_informales" id="dias_enfermedad_informales" value="{{$usuario->dias_enfermedad_informales }}" required>
    </div>

    <div class="mb-3">
        <label for="dias_enfermedad_formales" class="col-form-label">Dias totales de permisos de enfermedad formales:</label>
        <input type="number" min="0" class="form-control" name="dias_enfermedad_formales" id="dias_enfermedad_formales" value="{{ $usuario->dias_enfermedad_formales }}" required>
    </div>

    <div class="mb-3">
        <label for="dias_personales" class="col-form-label">Dias totales de permisos personales:</label>
        <input type="number" min="0" class="form-control" name="dias_personales" id="dias_personales" value="{{ $usuario->dias_personales }}" required>
    </div>

    <div class="mb-3">
        <label for="telefono" class="col-form-label">Telefono:</label>
        <input type="text" class="form-control" name="telefono" id="telefono" value="{{$usuario->telefono}}" required>
    </div>

    <label class="col-form-label">Habilitar para motorista:</label>
    <div class="mb-3">
        <input class="form-check-input" type="radio" name="motorista" id="si" value="si" @checked($usuario->motorista == "si")>
        <label class="form-check-label" for="si">Si</label>
        <span class="mx-3"></span>
        <input class="form-check-input" type="radio" name="motorista" id="no" value="no" @checked($usuario->motorista == "no")>
        <label class="form-check-label" for="no">No</label>
    </div>

    <div class="mb-3">
        <label for="id_estado" class="col-form-label">Estado:</label>
        <select id="id_estado" class="form-select" name="id_estado">
            @foreach ($estadosUsuarios as $estado )
            <option @selected($usuario->id_estado == $estado->id ) value="{{$estado->id}}">{{$estado->estado}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success" type="submit">Modificar</button>
    <a class="btn btn-secondary my-4" href="{{route('users.index')}}">Cancelar</a>
</form>
@endsection