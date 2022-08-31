@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO - Seguimientos</h3>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">PAO</li>
      <li class="breadcrumb-item">Objetivos</li>
      <li class="breadcrumb-item active" aria-current="page">Seguimientos</li>
    </ol>
</nav>

<a class="btn btn-outline-secondary" href="{{route('objetivos-pao.index', ['pao' => $pao->id])}}">Regresar</a>

<button type="button" class="btn btn-primary mb-4 float-right float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo resultado</button><br><br>

@include('layouts.alerts')

<h4 class="text-center">{{$pao->dependencia}}</h4>
<p class="text-center">
    <b>Objetivo:</b> {{$objetivo->objetivo}}
</p>

<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Resultados</th>
                <th>Estado</th>
                <th>Seguimiento</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seguimientos as $seguimiento)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$seguimiento->resultado}}</td>
                <td>{{$seguimiento->estado}}</td>
                <td class="text-center">
                    <a class="btn btn-info btn-sm" href="{{route('actividades-pao.index', ['seguimiento' => $seguimiento->id, 'objetivo' => $objetivo->id, 'pao' => $pao->id])}}">Ver</a>
                </td>
                <td class="col-2">
                    <form action="{{ route('seguimientos-pao.destroy' , ['seguimiento' => $seguimiento->id , 'objetivo' => $objetivo->id, 'pao'=> $pao->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-success btn-sm" href="{{route('seguimientos-pao.edit', ['seguimiento' => $seguimiento->id, 'objetivo'=> $objetivo->id, 'pao'=> $pao->id])}}">Modificar</a>
                        <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registrar nuevo resultado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('seguimientos-pao.store', ['objetivo' => $objetivo->id, 'pao' => $pao->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_objetivo" value="{{$objetivo->id}}">
                    <div class="mb-3">
                        <label for="resultado" class="col-form-label">Resultado:</label>
                        <textarea class="form-control"name="resultado" id="resultado" required>{{old('resultado')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="id_estado" class="col-form-label">Estado:</label>
                        <select id="id_estado" class="form-select" name="id_estado">
                            @foreach ($estados as $estado)
                                <option @selected($estado->id == old('id_estado')) value="{{$estado->id}}">{{$estado->estado}}</option>
                            @endforeach
                        </select>
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
   @include('layouts.confirmar-eliminar')
   @include('layouts.data-table-js')
@endsection