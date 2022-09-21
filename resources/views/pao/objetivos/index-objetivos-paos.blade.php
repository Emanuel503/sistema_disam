@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
    <h3 class="mb-4">PAO - Objetivos</h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">PAO</li>
        <li class="breadcrumb-item active" aria-current="page">Objetivos</li>
        </ol>
    </nav>

    <a class="btn btn-outline-secondary" href="{{route('pao.index')}}">Regresar</a>

    <button type="button" class="btn btn-primary mb-4 float-right float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo objetivo</button><br><br>

    @include('layouts.alerts')

    <h4 class="text-center">{{$pao->dependencia}}</h4>

    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Objetivos</th>
                    <th>Seguimiento</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($objetivos as $objetivo)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$objetivo->objetivo}}</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{route('seguimientos-pao.index', ['objetivo' => $objetivo->id, 'pao' => $pao->id]) }}">Ver</a>
                    </td>
                    <td class="col-2">
                        <form action="{{ route('objetivos-pao.destroy' , ['objetivo' => $objetivo->id , 'pao' => $pao->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-success btn-sm" href="{{route('objetivos-pao.edit', ['objetivo' => $objetivo->id, 'pao'=> $pao->id])}}">Modificar</a>
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
                    <h5 class="modal-title" id="modalTitulo">Registrar nuevo objetivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('objetivos-pao.store', ['pao' => $pao->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pao" value="{{$pao->id}}">
                        <div class="mb-3">
                            <label for="objetivo" class="col-form-label">Objetivo:</label>
                            <textarea class="form-control"name="objetivo" id="objetivo" required>{{old('objetivo')}}</textarea>
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