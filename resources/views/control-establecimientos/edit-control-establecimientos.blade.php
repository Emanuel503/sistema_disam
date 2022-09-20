@extends('layouts.app')

@section('content')
    <h3 class="my-4">Detalles del establecimiento</h3>

    <a class="btn btn-outline-secondary mb-4" href="{{ route('control-establecimientos.index')}}">Regresar</a>

    @include('layouts.alerts')

    <form action="{{route('control-establecimientos.update', ['control_establecimiento' =>$establecimientos->id] )}}" method="POST">
        
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="id_tipo" class="col-form-label">Tipo establecimiento:</label>
            <input type="text" class="form-control" name="id_tipo" id="id_tipo" value="{{$establecimientos->tipos->establecimiento}}" readonly>
        </div>

        <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$establecimientos->nombre}}"> 
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="col-form-label">Ubicacion:</label>
            <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{$establecimientos->ubicacion}}">
        </div>

        <div class="mb-3">
            <label for="titular" class="col-form-label">Titular:</label>
            <input type="text" class="form-control" name="titular" id="titular" value="{{$establecimientos->titular}}">
        </div>

        <div class="mb-3">
            <label for="telefono" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="{{$establecimientos->telefono}}">
        </div>

        <label class="col-form-label">Estado del establecimiento:</label>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="estado" id="Funcionando" value="Funcionando" @checked($establecimientos->estado == 'Funcionando')>
            <label class="form-check-label" for="Funcionando">Funcionando</label>
            <span class="mx-3"></span>
            <input class="form-check-input" type="radio" name="estado" id="No Funcionando" value="No Funcionando" @checked($establecimientos->estado == 'No Funcionando')>
            <label class="form-check-label" for="No Funcionando">No Funcionando</label>
        </div>

        <label class="col-form-label">Tipo de servicio:</label>
        <div class="mb-3">                            
            <input class="form-check-input" type="radio" name="tipo_servicio" id="Privado" value="Privado" @checked($establecimientos->tipo_servicio == 'Privado' )>
            <label class="form-check-label" for="Privado">Privado</label>
            <span class="mx-3"></span>
            <input class="form-check-input" type="radio" name="tipo_servicio" id="Publico" value="Publico" @checked($establecimientos->tipo_servicio == 'Publico' )>
            <label class="form-check-label" for="Publico">Publico</label>
        </div>

        <label class="col-form-label">Permiso de funcionamiento:</label>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="permiso_funcionamiento" id="permiso_si" value="Si" @checked($establecimientos->permiso_funcionamiento == 'Si')>
            <label class="form-check-label mr-3" for="permiso_si">Si</label>
            <span class="mx-3"></span>
            <input class="form-check-input" type="radio" name="permiso_funcionamiento" id="permiso_no" value="No" @checked($establecimientos->permiso_funcionamiento == 'No')>
            <label class="form-check-label" for="permiso_no">No</label>
        </div>

        <div id="fecha_permiso">
            <div class="mb-3">
                <label for="fecha_emision_permiso" class="col-form-label">Fecha de emision permiso:</label>
                <input type="date" class="form-control" name="fecha_emision_permiso" id="fecha_emision_permiso" value="{{$establecimientos->fecha_emision_permiso}}">
            </div>

            <div class="mb-3">
                <label for="fecha_vencimiento_permiso" class="col-form-label">Fecha de vencimiento permiso:</label>
                <input type="date" class="form-control" name="fecha_vencimiento_permiso" id="fecha_vencimiento_permiso" value="{{$establecimientos->fecha_vencimiento_permiso}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="region" class="col-form-label">Region:</label>
            <input type="text" class="form-control" name="region" id="region" value="{{$establecimientos->region}}">
        </div>

        <div class="mb-3">
            <label for="sibasi" class="col-form-label">SIBASI:</label>
            <input type="text" class="form-control" name="sibasi" id="sibasi" value="{{$establecimientos->sibasi}}">
        </div>

        <div class="mb-3">
            <label for="establecimiento_salud" class="col-form-label">Establecimiento Salud:</label>
            <input type="text" class="form-control" name="establecimiento_salud" id="establecimiento_salud" value="{{$establecimientos->establecimiento_salud}}">
        </div>

        <div class="mb-3">
            <label for="id_departamento" class="col-form-label">Departamento:</label>
            <select name="id_departamento" id="id_departamento" class="form-select">
                <option selected>Selecciona una opción</option>
                @foreach ($departamentos as $departamento)
                    <option @selected( $establecimientos->id_departamento ==$departamento->id ) value="{{ $departamento->id}}">{{$departamento->departamento}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_municipio" class="col-form-label">Municipio:</label>
            <select name="id_municipio" id="id_municipio" class="form-select">
                <option selected>Selecciona una opción</option>
                @foreach ($municipios as $municipio)
                    <option class="{{ $municipio->id_departamento}}" @selected( $establecimientos->id_municipio == $municipio->id ) value="{{ $municipio->id}}">{{$municipio->municipio}}</option>
                @endforeach
            </select>
        </div>

        @if($establecimientos->id_tipo != 7 &&  $establecimientos->id_tipo != 8 )
            <h5 class="my-4">Datos de establecimiento tipo: {{$establecimientos->tipos->establecimiento}}</h5>
        @endif

        @if ($establecimientos->id_tipo == 1)
            <div id="sistema_agua">
                <div class="mb-3">
                    <label for="viviendas_abastecidas_rural" class="col-form-label">Viviendas abastecidas rurales:</label>
                    <input type="text" class="form-control" name="viviendas_abastecidas_rural" id="viviendas_abastecidas_rural" value="{{$establecimientos->viviendas_abastecidas_rural}}">
                </div>

                <div class="mb-3">
                    <label for="poblacion_beneficiada_rural" class="col-form-label">Poblacion beneficiada rurales:</label>
                    <input type="text" class="form-control" name="poblacion_beneficiada_rural" id="poblacion_beneficiada_rural" value="{{$establecimientos->poblacion_beneficiada_rural}}">
                </div>

                <div class="mb-3">
                    <label for="viviendas_abastecidas_urbana" class="col-form-label">Viviendas abastecidas urbana:</label>
                    <input type="text" class="form-control" name="viviendas_abastecidas_urbana" id="viviendas_abastecidas_urbana" value="{{$establecimientos->viviendas_abastecidas_urbana}}">
                </div>

                <div class="mb-3">
                    <label for="poblacion_beneficiada_urbana" class="col-form-label">Poblacion beneficiada urbana:</label>
                    <input type="text" class="form-control" name="poblacion_beneficiada_urbana" id="poblacion_beneficiada_urbana" value="{{$establecimientos->poblacion_beneficiada_urbana}}">
                </div>

                <label class="col-form-label">Plan de seguridad:</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="plan_seguridad" id="plan_si" value="Si" @checked($establecimientos->plan_seguridad == 'Si' )>
                    <label class="form-check-label" for="plan_si">Si</label>
                    <span class="mx-3"></span>
                    <input class="form-check-input" type="radio" name="plan_seguridad" id="plan_no" value="No" @checked($establecimientos->plan_seguridad == 'No' )>
                    <label class="form-check-label" for="plan_no">No</label>
                </div>
            </div>
        @endif


        @if ($establecimientos->id_tipo == 2)
            <div id="piscina">
                <label class="col-form-label">Piscina con agua superficial:</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="piscina_agua_superficial" id="piscina_superfial_si" value="Si" @checked($establecimientos->piscina_agua_superficial =='Si')>
                    <label class="form-check-label" for="piscina_superfial_si">Si</label>
                    <span class="mx-3"></span>
                    <input class="form-check-input" type="radio" name="piscina_agua_superficial" id="piscina_superfial_no" value="No" @checked($establecimientos->piscina_agua_superficial =='No')>
                    <label class="form-check-label" for="piscina_superfial_no">No</label>
                </div>

                <label class="col-form-label">Piscina con circulacion:</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="piscina_con_circulacion" id="piscina_circulacion_si" value="Si" @checked($establecimientos->piscina_con_circulacion =='Si')>
                    <label class="form-check-label" for="piscina_circulacion_si">Si</label>
                    <span class="mx-3"></span>
                    <input class="form-check-input" type="radio" name="piscina_con_circulacion" id="piscina_circulacion_no" value="No" @checked($establecimientos->piscina_con_circulacion =='No')>
                    <label class="form-check-label" for="piscina_circulacion_no">No</label>
                </div>
            </div>
        @endif

        @if ($establecimientos->id_tipo == 3)
            <div id="establecimiento_db">
                <div class="mb-3">
                    <label for="actividad_realizada" class="col-form-label">Actividad que realiza:</label>
                    <input type="text" class="form-control" name="actividad_realizada" id="actividad_realizada" value="{{$establecimientos->actividad_realizada}}">
                </div>

                <div class="mb-3">
                    <label for="empresa_recolectora" class="col-form-label">Empresa recolectora DB:</label>
                    <input type="text" class="form-control" name="empresa_recolectora" id="empresa_recolectora" value="{{$establecimientos->empresa_recolectora}}">
                </div>

                <label class="col-form-label">Cuenta con plan de recoleccion de DB:</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="plan_recolectura" id="plan_recoleccion_si" value="Si" @checked($establecimientos->plan_recolectura =='Si' )>
                    <label class="form-check-label" for="plan_recoleccion_si">Si</label>
                    <span class="mx-3"></span>
                    <input class="form-check-input" type="radio" name="plan_recolectura" id="plan_recoleccion_no" value="No" @checked($establecimientos->plan_recolectura =='No' )>
                    <label class="form-check-label" for="plan_recoleccion_no">No</label>
                </div>

                <label class="col-form-label">Cuenta con empresa plan:</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="empresa_plan" id="plan_empresa_si" value="Si" @checked($establecimientos->empresa_plan =='Si')>
                    <label class="form-check-label" for="plan_empresa_si">Si</label>
                    <span class="mx-3"></span>
                    <input class="form-check-input" type="radio" name="empresa_plan" id="plan_empresa_no" value="No" @checked($establecimientos->empresa_plan =='No')>
                    <label class="form-check-label" for="plan_empresa_no">No</label>
                </div>
            </div>
        @endif

        @if ($establecimientos->id_tipo == 4)
            <div id="rancho">
                <div class="mb-3">
                    <label for="tipo_rastro" class="col-form-label">Tipo de rastro:</label>
                    <select class="form-select" name="tipo_rastro" id="tipo_rastro">
                        <option @selected($establecimientos->tipo_rastro == "Avicola") value="Avicola">Avicola</option>
                        <option @selected($establecimientos->tipo_rastro == "Porcinos") value="Porcinos">Porcinos</option>
                        <option @selected($establecimientos->tipo_rastro == "Bovinos") value="Bovinos">Bovinos</option>
                    </select>
                </div>

                <label class="col-form-label">Cuenta con permiso del MINSAL:</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="permiso_minsal" id="permiso_minsal_si" value="Si" @checked($establecimientos->permiso_minsal =='Si' )> 
                    <label class="form-check-label" for="permiso_minsal_si">Si</label>
                    <span class="mx-3"></span>
                    <input class="form-check-input" type="radio" name="permiso_minsal" id="permiso_minsal_no" value="No" @checked($establecimientos->permiso_minsal =='No' )>
                    <label class="form-check-label" for="permiso_minsal_no">No</label>
                </div>
            </div>
        @endif
        
        @if ($establecimientos->id_tipo == 5)
            <div id="sustancia_quimica">
                <div class="mb-3">
                    <label for="sustancia_quimica" class="col-form-label">Sustancia quimica:</label>
                    <input type="text" class="form-control" name="sustancia_quimica" id="sustancia_quimica" value="{{$establecimientos->sustancia_quimica}}">
                </div>

                <div class="mb-3">
                    <label for="tipo_riesgo_quimico" class="col-form-label">Tipo de riesgo quimico:</label>
                    <select class="form-select" name="tipo_riesgo_quimico" id="tipo_riesgo_quimico">
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Inflamable") value="Inflamable">Inflamable</option>
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Explosiva") value="Explosiva">Explosiva</option>
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Corrosiva") value="Corrosiva">Corrosiva</option>
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Tóxica") value="Tóxica">Tóxica</option>
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Radioactiva") value="Radioactiva">Radioactiva</option>
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Carcinógena") value="Carcinógena">Carcinógena</option>
                        <option @selected($establecimientos->tipo_riesgo_quimico == "Mutagénica") value="Mutagénica">Mutagénica</option>
                    </select>
                </div>
            </div>
        @endif
        
        @if ($establecimientos->id_tipo == 6)
            <div id="alimentos">
                <div class="mb-3">
                    <label for="id_tipo_esta_alimento" class="col-form-label">Tipo de establecimiento:</label>
                    <select class="form-select" name="id_tipo_esta_alimento" id="id_tipo_esta_alimento">
                        @foreach ($tipos_alimentos as $tipos_alimento )
                            <option @selected($establecimientos->id_tipo_esta_alimento == $tipos_alimento->id) value="{{$tipos_alimento->id}}">{{$tipos_alimento->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        
        <a class="btn btn-secondary" href="{{ route('control-establecimientos.index')}}">Cancelar</a>
        <button type="submit" class="btn btn-success">Modificar</button>
    </form>
@endsection

@section('js')
    <script>
        document.getElementById("permiso_no").onclick = function() {
            document.getElementById('fecha_permiso').style.display = "none";
        }

        document.getElementById("permiso_si").onclick = function() {
            document.getElementById('fecha_permiso').style.display = "block"; 
        }
    </script>

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
@endsection