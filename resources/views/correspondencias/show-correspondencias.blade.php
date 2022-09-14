@extends('layouts.app')

@section('content')
    <h3 class="my-4">Detalles la correspondencia</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('correspondencias.index')}}">Regresar</a>

    <a target="_blank" class="btn btn-danger float-end" href="{{route('correspondencias.reporteCorrespondencia', ['id' => $correspondencias->id])}}">PDF</a>

    <div class="mb-3">
        <label for="fecha" class="col-form-label">Fecha:</label>
        <input type="text" class="form-control" name="fecha" id="fecha" value="{{$correspondencias->fecha}}" readonly>
    </div>

    <div class="mb-3">
        <label for="hora" class="col-form-label">Hora:</label>
        <input type="text" class="form-control" name="hora" id="hora" value="{{$correspondencias->hora}}" readonly>
    </div>

    <div class="mb-3">
        <label for="id_usuario" class="col-form-label">Marginado a:</label>
        @if ($correspondencias->id_usuario == NULL)
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" value="Sin tecnico" readonly>
        @else
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" value="{{ $correspondencias->usuario1->nombres}} {{ $correspondencias->usuario1->apellidos}}" readonly>
        @endif 
    </div>

    <div class="mb-3">
        <label for="id_usuario_dos" class="col-form-label">Marginado a:</label>
        @if ($correspondencias->id_usuario_dos == NULL)
            <input type="text" class="form-control" name="id_usuario_dos" id="id_usuario_dos" value="Sin tecnico" readonly>
        @else
            <input type="text" class="form-control" name="id_usuario_dos" id="id_usuario_dos" value="{{ $correspondencias->usuario2->nombres}} {{ $correspondencias->usuario2->apellidos}}" readonly>
        @endif 
    </div>

    <div class="mb-3">
        <label for="id_usuario_tres" class="col-form-label">Marginado a:</label>
        @if ($correspondencias->id_usuario_tres == NULL)
            <input type="text" class="form-control" name="id_usuario_tres" id="id_usuario_tres" value="Sin tecnico" readonly>
        @else
            <input type="text" class="form-control" name="id_usuario_tres" id="id_usuario_tres" value="{{ $correspondencias->usuario3->nombres}} {{ $correspondencias->usuario3->apellidos}}" readonly>
        @endif 
    </div>

    <div class="mb-3">
        <label for="id_usuario_cuatro" class="col-form-label">Marginado a:</label>
        @if ($correspondencias->id_usuario_cuatro == NULL)
            <input type="text" class="form-control" name="id_usuario_cuatro" id="id_usuario_cuatro" value="Sin tecnico" readonly>
        @else
            <input type="text" class="form-control" name="id_usuario_cuatro" id="id_usuario_cuatro" value="{{ $correspondencias->usuario4->nombres}} {{ $correspondencias->usuario4->apellidos}}" readonly>
        @endif 
    </div>

    <div class="mb-3">
        <label for="procedencia" class="col-form-label">Procedencia:</label>
        <input type="text" class="form-control" name="procedencia" id="procedencia" value="{{ $correspondencias->procedencia }}" readonly>
    </div>

    <div class="mb-4">
        <label for="urgencia" class="col-form-label">Urgencia:</label>
        <input type="text" class="form-control" name="urgencia" id="urgencia"  value="{{$correspondencias->urgencia}}" readonly>
    </div>

    <div class="row mb-3 mt-2">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion1" id="opcion1" value="1" @if ($correspondencias->opcion1) checked @endif  disabled>
            <label class="form-check-label" for="opcion1">PARA EL TRAMITE RESPECTIVO</label>
        </div>

        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion2" id="opcion2" value="1" @if ($correspondencias->opcion2) checked @endif  disabled>
            <label class="form-check-label" for="opcion2">ASISTIR SEGUN AGENDA</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion3" id="opcion3" value="1" @if ($correspondencias->opcion3) checked @endif  disabled>
            <label class="form-check-label" for="opcion3">PREPARAR RESPUESTA</label>
        </div>

        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion4" id="opcion4" value="1" @if ($correspondencias->opcion4) checked @endif  disabled>
            <label class="form-check-label" for="opcion4">ATENDER MARGINADO</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion5" id="opcion5" value="1" @if ($correspondencias->opcion5) checked @endif  disabled>
            <label class="form-check-label" for="opcion5">PARA SU CONOCIMIENTO</label>
        </div>

        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion6" id="opcion6" value="1" @if ($correspondencias->opcion6) checked @endif  disabled>
            <label class="form-check-label" for="opcion6">PARA SU CONSIDERACION EN<br>EL PROCESO</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion7" id="opcion7" value="1" @if ($correspondencias->opcion7) checked @endif  disabled>
            <label class="form-check-label" for="opcion7">DELEGAR E INFORMAR</label>
        </div>

        <div class="col-6"> 
            <input class="form-check-input" type="checkbox" name="opcion8" id="opcion8" value="1" @if ($correspondencias->opcion8) checked @endif  disabled>
            <label class="form-check-label" for="opcion8">PARA LOS EFECTOS<br>PERTINENTES</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion9" id="opcion9" value="1" @if ($correspondencias->opcion9) checked @endif  disabled>
            
            <label class="form-check-label" for="opcion9">SU ATENCION Y SEGUIMIENTO</label>
        </div>

        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion10" id="opcion10" value="1" @if ($correspondencias->opcion10) checked @endif  disabled>
            <label class="form-check-label" for="opcion10">PARA ANEXAR A EXPEDIENTE</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6"> 
            <input class="form-check-input" type="checkbox" name="opcion11" id="opcion11" value="1" @if ($correspondencias->opcion11) checked @endif  disabled>
            <label class="form-check-label" for="opcion11">PARA SU OPINION TECNICA</label>
        </div>

        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion12" id="opcion12" value="1" @if ($correspondencias->opcion12) checked @endif  disabled>
            <label class="form-check-label" for="opcion12">ATENDER PETICION</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion13" id="opcion13" value="1" @if ($correspondencias->opcion13) checked @endif  disabled>
            <label class="form-check-label" for="opcion13">COORDINAR CON QUIEN<br> CORRESPONDA E INFORMAR</label>
        </div>

        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion14" id="opcion14" value="1" @if ($correspondencias->opcion14) checked @endif  disabled>
            <label class="form-check-label" for="opcion14">INVESTIGAR, ANALIZAR Y<br>PREPARAR RESPUESTA</label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <input class="form-check-input" type="checkbox" name="opcion15" id="opcion15" value="1" @if ($correspondencias->opcion15) checked @endif  disabled>
            <label class="form-check-label" for="opcion15">ASISTIR E INFORMAR</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="extracto" class="col-form-label">Extracto:</label>
        <textarea name="extracto" id="extracto" class="form-control" disabled>{{$correspondencias->extracto}}</textarea>
    </div>

    <div class="mb-3">
        <label for="observacion" class="col-form-label">Observaciones:</label>
        <textarea name="observacion" id="observacion" class="form-control" disabled>{{$correspondencias->observacion}}</textarea>
    </div>

    <div class="mb-3">
        <label for="resuelto" class="col-form-label">Resuelto:</label>
        <input type="text" class="form-control" name="resuelto" id="resuelto" value="@if($correspondencias->resuelto == null) Sin resolver @endif {{$correspondencias->resuelto}}" readonly>
    </div>

    <div class="mb-3">
        <label for="fecha_registro" class="col-form-label">Fecha de registro:</label>
        <input type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="{{$correspondencias->created_at}}" readonly>
    </div>
    
    <div class="mb-3">
        <label for="fecha_modificacion" class="col-form-label">Ultima fecha de modificacion:</label>
        <input type="text" class="form-control" name="fecha_modificacion" id="fecha_modificacion" value="{{$correspondencias->updated_at}}" readonly>
    </div>

    <div class="mb-3 d-grid gap-2 col-6 mx-auto">
        @if ($correspondencias->memo == null)
            <span class="badge bg-secondary mt-3 mb-5">La correspondencia no tiene documento</span>
        @else
            <a target="_blank" class="btn btn-outline-secondary px-4 mt-3 mb-5" href="{{ url('documentos/'.$correspondencias->memo) }}">Ver PDF</a>
        @endif
    
    </div>

    @if (Auth::user()->id == $correspondencias->id_usuario_adiciono || Auth::user()->id_rol == 1)
        <form action="{{ route('correspondencias.destroy' , ['correspondencia' => $correspondencias->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <a class="btn btn-success" href="{{ route('correspondencias.edit' , ['correspondencia' => $correspondencias->id])}}">Modificar</a>
            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
        </form>
    @elseif (Auth::user()->id == $correspondencias->id_usuario)
        <a class="btn btn-success" href="{{ route('correspondencias.edit' , ['correspondencia' => $correspondencias->id])}}">Modificar</a>
    @endif

@endsection

@section('js')
    @include('layouts.confirmar-eliminar')
@endsection