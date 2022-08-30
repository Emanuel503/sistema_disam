@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO - Funciones</h3>

<a class="btn btn-outline-secondary" href="{{route('pao.index')}}">Regresar</a>

<button type="button" class="btn btn-primary mb-4 float-right float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva funcion</button><br><br>

@include('layouts.alerts')

<h4 class="text-center">{{$pao->dependencia}}</h4>

<div class="table-responsive">
    <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Funcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funciones as $funcion)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$funcion->funcion}}</td>
                <td class="col-2">
                    <form action="{{ route('funciones-pao.destroy' , ['funcion' => $funcion->id , 'pao' => $pao->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-success btn-sm" href="{{route('funciones-pao.edit', ['funcion' => $funcion->id, 'pao'=> $pao->id])}}">Modificar</a>
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
                <h5 class="modal-title" id="modalTitulo">Registrar nueva funcion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('funciones-pao.store', ['pao' => $pao->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pao" value="{{$pao->id}}">
                    <div class="mb-3">
                        <label for="funcion" class="col-form-label">Funcion:</label>
                        <textarea class="form-control"name="funcion" id="funcion" required></textarea>
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