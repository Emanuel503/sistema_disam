@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Oficios</h3>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo oficio</button>

    @include('layouts.alerts')

    @if (sizeof($oficios) > 0)
    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Numero de oficio</th>
                    <th>Fecha</th>
                    <th>Destino</th>
                    <th>Asunto</th>
                    <th>Tecnico</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($oficios as $oficio)
                <tr>
                    <td>{{$oficio->id}}</td>
                    <td>{{$oficio->numero_oficio}}</td>
                    <td>{{$oficio->fecha_oficio}}</td>
                    <td>{{$oficio->destino}}</td>
                    <td>{{$oficio->asunto}}</td>
                    <td>{{$oficio->usuarios->nombres}} {{$oficio->usuarios->apellidos}}</td>
                    <td>
                        <a class="btn btn-info btn-sm mb-1" href="{{ route('oficios.show' , ['oficio' => $oficio->id])}}">Ver</a>
                        @if (Auth::user()->id == $oficio->id_usuario_adiciono)
                            <form action="{{ route('oficios.destroy' , ['oficio' => $oficio->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-success btn-sm mb-1" href="{{ route('oficios.edit' , ['oficio' => $oficio->id])}}">Modificar</a>
                                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <br><span class="badge bg-secondary">No hay oficios registradas</span>
    @endif

    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Registrar nuevo oficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('oficios.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_estado" class="col-form-label">Estado:</label>
                            <select id="id_estado" class="form-select" name="id_estado">
                                @foreach ($estados as $estado)
                                    <option @selected($estado->id == old('id_estado')) value="{{$estado->id}}">{{$estado->estado}}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="mb-3">
                            <label for="usuario" class="col-form-label">Tecnico:</label>
                            <select id="usuario" class="form-select" name="usuario">
                                @foreach ($usuarios as $usuario )
                                <option @selected(Auth::user()->id == $usuario->id) value="{{$usuario->id}}">{{$usuario->nombres}} {{$usuario->apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="mb-3">
                            <label for="destino" class="col-form-label">Desino:</label>
                            <input type="text" class="form-control" name="destino" id="destino" value="{{ old('destino') }}" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="asunto" class="col-form-label">Asunto:</label>
                            <input type="text" class="form-control" name="asunto" id="asunto" value="{{ old('asunto') }}" required>
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