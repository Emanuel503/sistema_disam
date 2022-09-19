@section('css')
    <link href="{{ asset('css/DataTables.css') }}" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Control de establecimientos</h3>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar nuevo establecimiento</button>

    @include('layouts.alerts')

    @if (sizeof($establecimientos) > 0)
    <div class="table-responsive">
        <table id="tabla" class="table table-striped table-hover table-bordered table-sm shadow">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Tipo establecimiento</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Region</th>
                    <th>SIBASI</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($establecimientos as $establecimiento)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$establecimiento->tipos->establecimiento}}</td>
                    <td>{{$establecimiento->nombre}}</td>
                    <td>{{$establecimiento->ubicacion}}</td>
                    <td>{{$establecimiento->region}}</td>
                    <td>{{$establecimiento->sibasi}}</td>
                    <td>
                        <a class="btn btn-info btn-sm mb-1" href="{{ route('control-establecimientos.show', ['control_establecimiento' => $establecimiento->id])}}">Ver</a>
                        @if (Auth::user()->id == $establecimiento->id_usuario_adiciono)
                            <form action="{{ route('control-establecimientos.destroy' , ['control_establecimiento' => $establecimiento->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-success btn-sm mb-1" href="{{ route('control-establecimientos.edit' , ['control_establecimiento' => $establecimiento->id])}}">Modificar</a>
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
        <br><span class="badge bg-secondary">No hay establecimientos registrados</span>
    @endif

    <form action="{{ route('control-establecimientos.store') }}" id="form" method="POST">

        <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitulo">Registrar nuevo establecimiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        @csrf
                        <div class="mb-3">
                            <label for="id_tipo" class="col-form-label">Tipo establecimiento:</label>
                            <select id="id_tipo" class="form-select" name="id_tipo">
                                @foreach ($tipos as $tipo )
                                    <option @selected( old('id_tipo') == $tipo->id ) value="{{$tipo->id}}">{{$tipo->establecimiento}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}">
                        </div>

                        <div class="mb-3">
                            <label for="ubicacion" class="col-form-label">Ubicacion:</label>
                            <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{old('ubicacion')}}">
                        </div>

                        <div class="mb-3">
                            <label for="titular" class="col-form-label">Titular:</label>
                            <input type="text" class="form-control" name="titular" id="titular" value="{{old('titular')}}">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}">
                        </div>

                        <label class="col-form-label">Estado del establecimiento:</label>
                        <div class="mb-3">
                            <input class="form-check-input" type="radio" name="estado" id="Funcionando" value="Funcionando" @checked(old('estado') == null) @checked(old('estado')=='Funcionando')>
                            <label class="form-check-label" for="Funcionando">Funcionando</label>
                            <span class="mx-3"></span>
                            <input class="form-check-input" type="radio" name="estado" id="No Funcionando" value="No Funcionando" @checked(old('estado') == 'No Funcionando' )>
                            <label class="form-check-label" for="No Funcionando">No Funcionando</label>
                        </div>

                        <label class="col-form-label">Tipo de servicio:</label>
                        <div class="mb-3">                            
                            <input class="form-check-input" type="radio" name="tipo_servicio" id="Privado" value="Privado" @checked(old('tipo_servicio')== null) @checked(old('tipo_servicio')=='Privado' )>
                            <label class="form-check-label" for="Privado">Privado</label>
                            <span class="mx-3"></span>
                            <input class="form-check-input" type="radio" name="tipo_servicio" id="Publico" value="Publico" @checked(old('tipo_servicio')=='Publico' )>
                            <label class="form-check-label" for="Publico">Publico</label>
                        </div>

                        <label class="col-form-label">Permiso de funcionamiento:</label>
                        <div class="mb-3">
                            <input class="form-check-input" type="radio" name="permiso_funcionamiento" id="permiso_si" value="Si" @checked(old('permiso_funcionamiento')== null) @checked(old('permiso_funcionamiento')=='Si' )>
                            <label class="form-check-label mr-3" for="permiso_si">Si</label>
                            <span class="mx-3"></span>
                            <input class="form-check-input" type="radio" name="permiso_funcionamiento" id="permiso_no" value="No" @checked(old('permiso_funcionamiento')=='No' )>
                            <label class="form-check-label" for="permiso_no">No</label>
                        </div>

                        <div id="fecha_permiso">
                            <div class="mb-3">
                                <label for="fecha_emision_permiso" class="col-form-label">Fecha de emision permiso:</label>
                                <input type="date" class="form-control" name="fecha_emision_permiso" id="fecha_emision_permiso" value="{{old('fecha_emision_permiso')}}">
                            </div>

                            <div class="mb-3">
                                <label for="fecha_vencimiento_permiso" class="col-form-label">Fecha de vencimiento permiso:</label>
                                <input type="date" class="form-control" name="fecha_vencimiento_permiso" id="fecha_vencimiento_permiso" value="{{old('fecha_vencimiento_permiso')}}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="region" class="col-form-label">Region:</label>
                            <input type="text" class="form-control" name="region" id="region" value="{{old('region')}}">
                        </div>

                        <div class="mb-3">
                            <label for="sibasi" class="col-form-label">SIBASI:</label>
                            <input type="text" class="form-control" name="sibasi" id="sibasi" value="{{old('sibasi')}}">
                        </div>

                        <div class="mb-3">
                            <label for="establecimiento_salud" class="col-form-label">Establecimiento Salud:</label>
                            <input type="text" class="form-control" name="establecimiento_salud" id="establecimiento_salud" value="{{old('establecimiento_salud')}}">
                        </div>

                        <div class="mb-3">
                            <label for="id_departamento" class="col-form-label">Departamento:</label>
                            <select name="id_departamento" id="id_departamento" class="form-select">
                                <option selected>Selecciona una opción</option>
                                @foreach ($departamentos as $departamento)
                                    <option @selected( old('id_departamento')==$departamento->id ) value="{{ $departamento->id}}">{{$departamento->departamento}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="mb-3">
                            <label for="id_municipio" class="col-form-label">Municipio:</label>
                            <select name="id_municipio" id="id_municipio" class="form-select">
                                <option selected>Selecciona una opción</option>
                                @foreach ($municipios as $municipio)
                                    <option class="{{ $municipio->id_departamento}}" @selected( old('id_municipio')==$municipio->id ) value="{{ $municipio->id}}">{{$municipio->municipio}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-outline-primary" data-bs-target="#modal2" data-bs-toggle="modal" id="formulario2">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal2Titulo"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modal2Body" class="modal-body">
                        <div id="sistema_agua">
                            <div class="mb-3">
                                <label for="viviendas_abastecidas_rural" class="col-form-label">Viviendas abastecidas rurales:</label>
                                <input type="text" class="form-control" name="viviendas_abastecidas_rural" id="viviendas_abastecidas_rural" value="{{old('viviendas_abastecidas_rural')}}">
                            </div>

                            <div class="mb-3">
                                <label for="poblacion_beneficiada_rural" class="col-form-label">Poblacion beneficiada rurales:</label>
                                <input type="text" class="form-control" name="poblacion_beneficiada_rural" id="poblacion_beneficiada_rural" value="{{old('poblacion_beneficiada_rural')}}">
                            </div>

                            <div class="mb-3">
                                <label for="viviendas_abastecidas_urbana" class="col-form-label">Viviendas abastecidas urbana:</label>
                                <input type="text" class="form-control" name="viviendas_abastecidas_urbana" id="viviendas_abastecidas_urbana" value="{{old('viviendas_abastecidas_urbana')}}">
                            </div>

                            <div class="mb-3">
                                <label for="poblacion_beneficiada_urbana" class="col-form-label">Poblacion beneficiada urbana:</label>
                                <input type="text" class="form-control" name="poblacion_beneficiada_urbana" id="poblacion_beneficiada_urbana" value="{{old('poblacion_beneficiada_urbana')}}">
                            </div>

                            <label class="col-form-label">Plan de seguridad:</label>
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" name="plan_seguridad" id="plan_si" value="Si" @checked(old('plan_seguridad')== null) @checked(old('plan_seguridad')=='Si' )>
                                <label class="form-check-label" for="plan_si">Si</label>
                                <span class="mx-3"></span>
                                <input class="form-check-input" type="radio" name="plan_seguridad" id="plan_no" value="No" @checked(old('plan_seguridad')=='No' )>
                                <label class="form-check-label" for="plan_no">No</label>
                            </div>
                        </div>

                        <div id="piscina">
                            <label class="col-form-label">Piscina con agua superficial:</label>
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" name="piscina_agua_superfial" id="piscina_superfial_si" value="Si" @checked(old('piscina_agua_superfial')== null) @checked(old('piscina_agua_superfial')=='Si' )>
                                <label class="form-check-label" for="piscina_superfial_si">Si</label>
                                <span class="mx-3"></span>
                                <input class="form-check-input" type="radio" name="piscina_agua_superfial" id="piscina_superfial_no" value="No" @checked(old('piscina_agua_superfial')=='No' )>
                                <label class="form-check-label" for="piscina_superfial_no">No</label>
                            </div>

                            <label class="col-form-label">Piscina con circulacion:</label>
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" name="piscina_con_circulacion" id="piscina_circulacion_si" value="Si" @checked(old('piscina_con_circulacion')== null) @checked(old('piscina_con_circulacion')=='Si' )>
                                <label class="form-check-label" for="piscina_circulacion_si">Si</label>
                                <span class="mx-3"></span>
                                <input class="form-check-input" type="radio" name="piscina_con_circulacion" id="piscina_circulacion_no" value="No" @checked(old('piscina_con_circulacion')=='No' )>
                                <label class="form-check-label" for="piscina_circulacion_no">No</label>
                            </div>
                        </div>

                        <div id="establecimiento_db">
                            <div class="mb-3">
                                <label for="actividad_realizada" class="col-form-label">Actividad que realiza:</label>
                                <input type="text" class="form-control" name="actividad_realizada" id="actividad_realizada" value="{{old('actividad_realizada')}}">
                            </div>

                            <div class="mb-3">
                                <label for="empresa_recolectora" class="col-form-label">Empresa recolectora DB:</label>
                                <input type="text" class="form-control" name="empresa_recolectora" id="empresa_recolectora" value="{{old('empresa_recolectora')}}">
                            </div>

                            <label class="col-form-label">Cuenta con plan de recoleccion de DB:</label>
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" name="plan_recolectura" id="plan_recoleccion_si" value="Si" @checked(old('plan_recolectura')== null) @checked(old('plan_recolectura')=='Si' )>
                                <label class="form-check-label" for="plan_recoleccion_si">Si</label>
                                <span class="mx-3"></span>
                                <input class="form-check-input" type="radio" name="plan_recolectura" id="plan_recoleccion_no" value="No" @checked(old('plan_recolectura')=='No' )>
                                <label class="form-check-label" for="plan_recoleccion_no">No</label>
                            </div>

                            <label class="col-form-label">Cuenta con empresa plan:</label>
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" name="empresa_plan" id="plan_empresa_si" value="Si" @checked(old('empresa_plan')== null) @checked(old('empresa_plan')=='Si' )>
                                <label class="form-check-label" for="plan_empresa_si">Si</label>
                                <span class="mx-3"></span>
                                <input class="form-check-input" type="radio" name="empresa_plan" id="plan_empresa_no" value="No" @checked(old('empresa_plan')=='No' )>
                                <label class="form-check-label" for="plan_empresa_no">No</label>
                            </div>
                        </div>

                        <div id="rancho">
                            <div class="mb-3">
                                <label for="tipo_rancho" class="col-form-label">Tipo de rancho:</label>
                                <input type="text" class="form-control" name="tipo_rancho" id="tipo_rancho" value="{{old('tipo_rancho')}}">
                            </div>

                            <label class="col-form-label">Cuenta con permiso del MINSAL:</label>
                            <div class="mb-3">
                                <input class="form-check-input" type="radio" name="permiso_minsal" id="permiso_minsal_si" value="Si" @checked(old('permiso_minsal')== null) @checked(old('permiso_minsal')=='Si' )>
                                <label class="form-check-label" for="permiso_minsal_si">Si</label>
                                <span class="mx-3"></span>
                                <input class="form-check-input" type="radio" name="permiso_minsal" id="permiso_minsal_no" value="No" @checked(old('permiso_minsal')=='No' )>
                                <label class="form-check-label" for="permiso_minsal_no">No</label>
                            </div>
                        </div>

                        <div id="sustancia_quimica">
                            <div class="mb-3">
                                <label for="sustancia_quimica" class="col-form-label">Sustancia quimica:</label>
                                <input type="text" class="form-control" name="sustancia_quimica" id="sustancia_quimica" value="{{old('sustancia_quimica')}}">
                            </div>

                            <div class="mb-3">
                                <label for="tipo_riesgo_quimico" class="col-form-label">Tipo de riesgo quimico:(falta)</label>
                                <select class="form-select" name="tipo_riesgo_quimico" id="tipo_riesgo_quimico">
                                    <option>Corrosivo</option>
                                </select>
                            </div>
                        </div>

                        <div id="alimentos">
                            <div class="mb-3">
                                <label for="tipo_establecimiento_alimento" class="col-form-label">Tipo de establecimiento:</label>
                                <input type="text" class="form-control" name="tipo_establecimiento_alimento" id="tipo_establecimiento_alimento" value="{{old('tipo_establecimiento_alimento')}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-target="#modalRegistrar" data-bs-toggle="modal" id="formulario2">Regresar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    @include('layouts.data-table-js')
    @include('layouts.confirmar-eliminar')

    {{-- Script para departamentos y municipios --}}
    <script>
        document.getElementById("id_departamento").onchange = function() {

            let selector = document.getElementById('id_departamento');
            let value = selector[selector.selectedIndex].value;
            let nodeList = document.getElementById("id_municipio").querySelectorAll("option");

            nodeList.forEach(function(option) {

                if (option.classList.contains(value)) {
                    option.style.display = "block";
                } else {
                    option.style.display = "none";
                }

            });
        }
    </script>

     {{-- Script para tipo de establecimiento --}}
     <script>
        document.getElementById("formulario2").onclick = function() {

            let establecimiento = document.getElementById('id_tipo');
            
            if(establecimiento[establecimiento.selectedIndex].value == 1){
                document.getElementById('modal2Titulo').innerHTML = "Sistema de agua";
                document.getElementById('sistema_agua').style.display = "block";
            }else{
                document.getElementById('sistema_agua').style.display = "none";
            }

            if(establecimiento[establecimiento.selectedIndex].value == 2){
                document.getElementById('modal2Titulo').innerHTML = "Piscina";
                document.getElementById('piscina').style.display = "block";
            }else{
                document.getElementById('piscina').style.display = "none";
            }

            if(establecimiento[establecimiento.selectedIndex].value == 3){
                document.getElementById('modal2Titulo').innerHTML = "Establecimiento DB";
                document.getElementById('establecimiento_db').style.display = "block";
            }else{
                document.getElementById('establecimiento_db').style.display = "none";
            }

            if(establecimiento[establecimiento.selectedIndex].value == 4){
                document.getElementById('modal2Titulo').innerHTML = "Rancho";
                document.getElementById('rancho').style.display = "block";
            }else{
                document.getElementById('rancho').style.display = "none";
            }

            if(establecimiento[establecimiento.selectedIndex].value == 5){
                document.getElementById('modal2Titulo').innerHTML = "Sustencia Quimica Peligrosa";
                document.getElementById('sustancia_quimica').style.display = "block";
            }else{
                document.getElementById('sustancia_quimica').style.display = "none";
            }

            if(establecimiento[establecimiento.selectedIndex].value == 6){
                document.getElementById('modal2Titulo').innerHTML = "Alimentos";
                document.getElementById('alimentos').style.display = "block";
            }else{
                document.getElementById('alimentos').style.display = "none";
            }

            if(establecimiento[establecimiento.selectedIndex].value == 7){
                document.getElementById('modal2Titulo').innerHTML = "Embazadora de agua";
                document.getElementById('modal2Body').innerHTML = "<h3>Guardando establecimiento</h3>";
                document.getElementById('form').submit();
            }

            if(establecimiento[establecimiento.selectedIndex].value == 8 ){
                document.getElementById('modal2Titulo').innerHTML = "Granja";
                document.getElementById('modal2Body').innerHTML = "<h3>Guardando establecimiento</h3>";
                document.getElementById('form').submit();
            }
        }
    </script>

    {{-- Script para fechas de permiso --}}
    <script>
        document.getElementById("permiso_no").onclick = function() {
            document.getElementById('fecha_permiso').style.display = "none";
        }

        document.getElementById("permiso_si").onclick = function() {
            document.getElementById('fecha_permiso').style.display = "block"; 
        }
    </script>
@endsection