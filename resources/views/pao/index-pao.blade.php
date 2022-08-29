@section('css-data-table')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
<h3 class="mb-4">PAO</h3>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nueva PAO</button>

@include('layouts.alerts')
@include('pao.alerts')

@if (sizeof($paos) > 0)
<div class="table-responsive">
    <table id="paos" class="table table-striped table-hover table-bordered table-sm shadow">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Dependencia</th>
                <th>Estado</th>
                <th>Funciones</th>
                <th>Objetivos</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paos as $pao)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pao->dependencia}}</td>
                <td>{{$pao->estados->estado}}</td>
                <td class="text-center"><a class="btn btn-outline-primary" href="{{route('funciones-pao.index', ['pao' => $pao->id])}}">Ver</a></td>
                <td class="text-center"><a class="btn btn-outline-primary" href="">Ver</a></td>
                <td class="text-center">
                    @if (Auth::user()->id_rol == 1)
                        <form action="{{ route('pao.destroy' , ['pao' => $pao->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
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
    <br><span class="badge bg-secondary">No hay paos registradas</span>
@endif

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Registrar nueva pao</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pao.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_estado" class="col-form-label">Usuario:</label>
                        <select id="id_estado" class="form-select" name="id_estado">
                            @foreach ($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->estado}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dependencia" class="col-form-label">Dependencia:</label>
                        <select id="dependencia" class="form-select" name="dependencia">
                            <option value="Dirección de Salud Ambiental">Dirección de Salud Ambiental</option>
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

@section('js-data-table')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#paos tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            $('#paos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

@section('js-alert-delete')
    <script src="{{ asset('js/alert-delete.js') }}"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `¿Seguro que desea borrar este registro?`,
                    text: "Si elimina este registro no se podra recuperar.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection