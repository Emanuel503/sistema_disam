@extends('layouts.app')

@section('content')
    <h3 class="my-4">Modificar correspondencia</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('correspondencias.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{ route('correspondencias.update', ['correspondencia' => $correspondencias->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-3">
            <label for="id_usuario" class="col-form-label">Marginado a:</label>
            <select id="id_usuario" class="form-select" name="id_usuario">
                @foreach ($usuarios as $usuario )
                    <option @selected($usuario->id == $correspondencias->id_usuario) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="procedencia" class="col-form-label">Procedencia:</label>
            <input type="text" class="form-control" name="procedencia" id="procedencia" value="{{ $correspondencias->procedencia }}" required>
        </div>
    
        <div class="mb-4">
            <label for="urgencia" class="col-form-label">Urgencia:</label>
            <input type="text" class="form-control" name="urgencia" id="urgencia"  value="{{$correspondencias->urgencia}}">
        </div>
    
        <div class="row mb-3 mt-2">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion1" id="opcion1" @if($correspondencias->opcion1) checked @endif>
                <label class="form-check-label" for="opcion1">PARA EL TRAMITE RESPECTIVO</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion2" id="opcion2" @if($correspondencias->opcion2) checked @endif>
                <label class="form-check-label" for="opcion2">PREPARAR RESPUESTA</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion3" id="opcion3" @if($correspondencias->opcion3) checked @endif>
                <label class="form-check-label" for="opcion3">PARA SU CONOCIMIENTO</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion4" id="opcion4" @if($correspondencias->opcion4) checked @endif>
                <label class="form-check-label" for="opcion4">DELEGAR E INFORMAR</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion5" id="opcion5" @if($correspondencias->opcion5) checked @endif>
                <label class="form-check-label" for="opcion5">SU ATENCION Y SEGUIMIENTO</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion6" id="opcion6" @if($correspondencias->opcion6) checked @endif>
                <label class="form-check-label" for="opcion6">PARA SU OPINION TECNICA</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion7" id="opcion7" @if($correspondencias->opcion7) checked @endif>
                <label class="form-check-label" for="opcion7">ASISTIR E INFORMAR</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion8" id="opcion8" @if($correspondencias->opcion8) checked @endif>
                <label class="form-check-label" for="opcion8">ASISTIR SEGUN AGENDA</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion9" id="opcion9" @if($correspondencias->opcion9) checked @endif>
                <label class="form-check-label" for="opcion9">ATENDER MARGINADO</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion10" id="opcion10" @if($correspondencias->opcion10) checked @endif>
                <label class="form-check-label" for="opcion10">PARA SU CONSIDERACION EN PROCESO</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6"> 
                <input class="form-check-input" type="checkbox" name="opcion11" id="opcion11" @if($correspondencias->opcion11) checked @endif>
                <label class="form-check-label" for="opcion11">PARA LOS EFECTOS PERTINENTES</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion12" id="opcion12" @if($correspondencias->opcion12) checked @endif>
                <label class="form-check-label" for="opcion12">PARA ANEXARLO A EXPEDIENTE</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion13" id="opcion13" @if($correspondencias->opcion13) checked @endif>
                <label class="form-check-label" for="opcion13">ATENDER PETICION</label>
            </div>
    
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion14" id="opcion14" @if($correspondencias->opcion14) checked @endif>
                <label class="form-check-label" for="opcion14">INVESTIGAR, ANALIZAR Y PREPARAR RESPUESTA</label>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-6">
                <input class="form-check-input" type="checkbox" name="opcion15" id="opcion15" @if($correspondencias->opcion15) checked @endif>
                <label class="form-check-label" for="opcion15">COORDINAR CON QUIEN<br> CORRESPONDA E INFORMAR</label>
            </div>
        </div>
    
        <div class="mb-3">
            <label for="observacion" class="col-form-label">Observaciones:</label>
            <textarea name="observacion" id="observacion" class="form-control">{{$correspondencias->observacion}}</textarea>
        </div>
    
        <div class="mb-3">
            <label for="extracto" class="col-form-label">Extracto:</label>
            <textarea name="extracto" id="extracto" class="form-control" required>{{$correspondencias->extracto}}</textarea>
        </div>
    
        <div class="mb-3">
            <label for="resuelto" class="col-form-label">Resuelto:</label>
            <input type="date" class="form-control" name="resuelto" id="resuelto" value="{{$correspondencias->resuelto}}">
        </div>

        <button type="submit" class="btn btn-success mt-4">Modificar</button>
        <a href="{{route('correspondencias.index')}}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
@endsection