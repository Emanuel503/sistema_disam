@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">Control de correspondencia</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva correspondencia</button>

@include('layouts.alerts')

@if (sizeof($correspondencias) > 0)
<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Procedencia</th>
                <th>Extracto</th>
                <th>Tecnico</th>
                <th>Resuelto</th>
                <th>Seguimiento</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($correspondencias as $correspondencia)
            <tr>
                <td>{{$correspondencia->id}}</td>
                <td>{{$correspondencia->fecha}}</td>
                <td>{{$correspondencia->hora}}</td>
                <td>{{$correspondencia->procedencia}}</td>
                <td>{{$correspondencia->extracto}}</td>
                <td>
                    @if ($correspondencia->id_usuario != NULL && $correspondencia->id_usuario_dos != NULL && $correspondencia->id_usuario_tres != NULL && $correspondencia->id_usuario_cuatro != NULL)
                        {{$correspondencia->usuario1->nombres}} {{$correspondencia->usuario1->apellidos}}<br>
                        {{$correspondencia->usuario2->nombres}} {{$correspondencia->usuario2->apellidos}}<br>
                        {{$correspondencia->usuario3->nombres}} {{$correspondencia->usuario3->apellidos}}<br>
                        {{$correspondencia->usuario4->nombres}} {{$correspondencia->usuario4->apellidos}}<br>
                    @else
                        Sin tecnico
                    @endif
                </td>
                <td> @if($correspondencia->resuelto == null) Sin resolver @endif {{$correspondencia->resuelto}} </td>
                <td class="text-center"><a href="{{route('correspondencias-seguimientos.index', ['correspondencia' => $correspondencia->id])}}" class="btn btn-sm btn-outline-primary">Ver</a></td>
                <td>
                    <a class="btn btn-info btn-sm mb-1" href="{{ route('correspondencias.show' , ['correspondencia' => $correspondencia->id])}}">Ver</a>
                    @if (Auth::user()->id == $correspondencia->id_usuario_adiciono || Auth::user()->id_rol == 1)
                        <form action="{{ route('correspondencias.destroy' , ['correspondencia' => $correspondencia->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('correspondencias.edit' , ['correspondencia' => $correspondencia->id])}}">Modificar</a>
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                        </form>

                        @elseif (Auth::user()->id == $correspondencia->id_usuario)
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('correspondencias.edit' , ['correspondencia' => $correspondencia->id])}}">Modificar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <br><span class="badge bg-secondary">No hay correspondencias registradas</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registra nueva correspondencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('correspondencias.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id_usuario" class="col-form-label">Marginado a:</label>
                        <select id="id_usuario" class="form-select" name="id_usuario">
                            <option value="ninguno">Ninguno</option>
                            @foreach ($usuarios as $usuario )
                                <option value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_usuario_dos" class="col-form-label">Marginado a:</label>
                        <select id="id_usuario_dos" class="form-select" name="id_usuario_dos">
                            <option value="ninguno">Ninguno</option>
                            @foreach ($usuarios as $usuario )
                                <option value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_usuario_tres" class="col-form-label">Marginado a:</label>
                        <select id="id_usuario_tres" class="form-select" name="id_usuario_tres">
                            <option value="ninguno">Ninguno</option>
                            @foreach ($usuarios as $usuario )
                                <option value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_usuario_cuatro" class="col-form-label">Marginado a:</label>
                        <select id="id_usuario_cuatro" class="form-select" name="id_usuario_cuatro">
                            <option value="ninguno">Ninguno</option>
                            @foreach ($usuarios as $usuario )
                                <option value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="procedencia" class="col-form-label">Procedencia:</label>
                        <input type="text" class="form-control" name="procedencia" id="procedencia" value="{{ old('procedencia') }}" required>
                    </div>
        
                    <div class="mb-4">
                        <label for="urgencia" class="col-form-label">Urgencia:</label>
                        <input type="text" class="form-control" name="urgencia" id="urgencia" value="URGENTE">
                    </div>

                    <div class="row mb-3 mt-2">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion1" id="opcion1" value="1">
                            <label class="form-check-label" for="opcion1">PARA EL TRAMITE RESPECTIVO</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion2" id="opcion2" value="1">
                            <label class="form-check-label" for="opcion2">ASISTIR SEGUN AGENDA</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion3" id="opcion3" value="1">
                            <label class="form-check-label" for="opcion3">PREPARAR RESPUESTA</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion4" id="opcion4" value="1">
                            <label class="form-check-label" for="opcion4">ATENDER MARGINADO</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion5" id="opcion5" value="1">
                            <label class="form-check-label" for="opcion5">PARA SU CONOCIMIENTO</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion6" id="opcion6" value="1">
                            <label class="form-check-label" for="opcion6">PARA SU CONSIDERACION EN<br>EL PROCESO</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion7" id="opcion7" value="1">
                            <label class="form-check-label" for="opcion7">DELEGAR E INFORMAR</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion8" id="opcion8" value="1">
                            <label class="form-check-label" for="opcion8">PARA LOS EFECTOS<br>PERTINENTES</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion9" id="opcion9" value="1">
                            
                            <label class="form-check-label" for="opcion9">SU ATENCION Y SEGUIMIENTO</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion10" id="opcion10" value="1">
                            <label class="form-check-label" for="opcion10">PARA ANEXAR A EXPEDIENTE</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6"> 
                            <input class="form-check-input" type="checkbox" name="opcion11" id="opcion11" value="1">
                            <label class="form-check-label" for="opcion11">PARA SU OPINION TECNICA</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion12" id="opcion12" value="1">
                            <label class="form-check-label" for="opcion12">ATENDER PETICION</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion13" id="opcion13" value="1">
                            <label class="form-check-label" for="opcion13">COORDINAR CON QUIEN<br> CORRESPONDA E INFORMAR</label>
                        </div>

                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion14" id="opcion14" value="1">
                            <label class="form-check-label" for="opcion14">INVESTIGAR, ANALIZAR Y<br>PREPARAR RESPUESTA</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" name="opcion15" id="opcion15" value="1">
                            <label class="form-check-label" for="opcion15">ASISTIR E INFORMAR</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="observacion" class="col-form-label">Observaciones:</label>
                        <textarea name="observacion" id="observacion" class="form-control">{{old('observacion')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="extracto" class="col-form-label">Extracto:</label>
                        <textarea name="extracto" id="extracto" class="form-control" required>{{old('extracto')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="memo" class="col-form-label">Memorandum:</label>
                        <input class="form-control" type="file" name="memo" id="memo" accept="application/pdf" value="{{old('memo')}}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @include('layouts.data-table-js')
    @include('layouts.confirmar-eliminar')
@endsection