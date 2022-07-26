<?php

namespace App\Http\Controllers;

use App\Models\ControlEstablecimientos;
use App\Models\Departamentos;
use App\Models\Municipios;
use App\Models\TiposEstablecimientos;
use App\Models\TiposEstablecimientosAlimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlEstablecimientosController extends Controller
{
    public function index(){
        $establecimientos = ControlEstablecimientos::all();
        $tipos = TiposEstablecimientos::all();
        $tipos_alimentos = TiposEstablecimientosAlimentos::all();
        $departamentos = Departamentos::orderBy('departamento')->get();
        $municipios = Municipios::orderBy('municipio')->get();

        return view('control-establecimientos.index-control-establecimientos', ['establecimientos' => $establecimientos, 'tipos' => $tipos, 'departamentos' => $departamentos, 'municipios' => $municipios, 'tipos_alimentos' => $tipos_alimentos]);
    }

    public function show($id){
        $establecimientos = ControlEstablecimientos::find($id);
        return view('control-establecimientos.show-control-establecimientos',['establecimientos' => $establecimientos]);
    }

    public function edit($id){
        $establecimientos = ControlEstablecimientos::find($id);
        $tipos_alimentos = TiposEstablecimientosAlimentos::all();
        $departamentos = Departamentos::orderBy('departamento')->get();
        $municipios = Municipios::orderBy('municipio')->get();
        return view('control-establecimientos.edit-control-establecimientos',['establecimientos' => $establecimientos, 'departamentos' => $departamentos, 'municipios' => $municipios, 'tipos_alimentos' => $tipos_alimentos]);
    }

    public function store(Request $request){
        $request->validate([
            'id_tipo' => 'required',
            'id_departamento' => 'required',
            'id_municipio' => 'required',
            'nombre' => 'required',
            'ubicacion' => 'required',
            'titular' => 'required',
            'estado' => 'required',
            'telefono' => 'required',
            'tipo_servicio' => 'required',
            'permiso_funcionamiento' => 'required',
            'region' => 'required',
            'sibasi' => 'required',
            'establecimiento_salud' => 'required',
        ]);

        $establecimiento = new ControlEstablecimientos();
        $establecimiento->id_tipo = $request->id_tipo;
        $establecimiento->id_usuario_adiciono =  Auth::user()->id;
        $establecimiento->id_departamento = $request->id_departamento;
        $establecimiento->id_municipio = $request->id_municipio;
        $establecimiento->nombre = $request->nombre;
        $establecimiento->ubicacion = $request->ubicacion;
        $establecimiento->titular = $request->titular;
        $establecimiento->estado = $request->estado;
        $establecimiento->telefono = $request->telefono;
        $establecimiento->tipo_servicio = $request->tipo_servicio;
        $establecimiento->permiso_funcionamiento = $request->permiso_funcionamiento;
        $establecimiento->fecha_emision_permiso = $request->fecha_emision_permiso;
        $establecimiento->fecha_vencimiento_permiso = $request->fecha_vencimiento_permiso;
        $establecimiento->region = $request->region;
        $establecimiento->sibasi = $request->sibasi;
        $establecimiento->establecimiento_salud = $request->establecimiento_salud;

        //Campos para tipo de establecimiento: Sistema Agua
        if($establecimiento->id_tipo == 1){
            $establecimiento->viviendas_abastecidas_rural = $request->viviendas_abastecidas_rural;
            $establecimiento->poblacion_beneficiada_rural = $request->poblacion_beneficiada_rural;
            $establecimiento->viviendas_abastecidas_urbana = $request->viviendas_abastecidas_urbana;
            $establecimiento->poblacion_beneficiada_urbana = $request->poblacion_beneficiada_urbana;
            $establecimiento->plan_seguridad = $request->plan_seguridad;
        }
       
        //Campos para tipo de establecimiento: Piscina
        if($establecimiento->id_tipo == 2){
            $establecimiento->piscina_agua_superficial = $request->piscina_agua_superficial;
            $establecimiento->piscina_con_circulacion = $request->piscina_con_circulacion;
        }

        //Campos para tipo de establecimiento: Establecimiento DB
        if($establecimiento->id_tipo == 3){
            $establecimiento->actividad_realizada = $request->actividad_realizada;
            $establecimiento->empresa_recolectora = $request->empresa_recolectora;
            $establecimiento->plan_recolectura = $request->plan_recolectura;
            $establecimiento->empresa_plan = $request->empresa_plan;
        }
        
        //Campos para tipo de establecimiento: Rastro
        if($establecimiento->id_tipo == 4){
            $establecimiento->tipo_rastro = $request->tipo_rastro;
            $establecimiento->permiso_minsal = $request->permiso_minsal;
        }

        //Campos para tipo de establecimiento: Sutancias quimicas peligrosas
        if($establecimiento->id_tipo == 5){
            $establecimiento->sustancia_quimica = $request->sustancia_quimica;
            $establecimiento->tipo_riesgo_quimico = $request->tipo_riesgo_quimico;
        }

        //Campos para tipo de establecimiento: Sutancias quimicas peligrosas
        if($establecimiento->id_tipo == 6){
            $establecimiento->id_tipo_esta_alimento = $request->id_tipo_esta_alimento;
        }

        $establecimiento->save();

        return redirect()->route('control-establecimientos.index')->with('success', 'Establecimiento guardado correctamente');
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_departamento' => 'required',
            'id_municipio' => 'required',
            'nombre' => 'required',
            'ubicacion' => 'required',
            'titular' => 'required',
            'estado' => 'required',
            'telefono' => 'required',
            'tipo_servicio' => 'required',
            'permiso_funcionamiento' => 'required',
            'region' => 'required',
            'sibasi' => 'required',
            'establecimiento_salud' => 'required',
        ]);

        $establecimiento = ControlEstablecimientos::find($id);
        $establecimiento->id_departamento = $request->id_departamento;
        $establecimiento->id_municipio = $request->id_municipio;
        $establecimiento->nombre = $request->nombre;
        $establecimiento->ubicacion = $request->ubicacion;
        $establecimiento->titular = $request->titular;
        $establecimiento->estado = $request->estado;
        $establecimiento->telefono = $request->telefono;
        $establecimiento->tipo_servicio = $request->tipo_servicio;
        $establecimiento->permiso_funcionamiento = $request->permiso_funcionamiento;

        if($request->permiso_funcionamiento == "No"){
            $establecimiento->fecha_emision_permiso = NULL;
            $establecimiento->fecha_vencimiento_permiso = NULL;
        }else{
            $establecimiento->fecha_emision_permiso = $request->fecha_emision_permiso;
            $establecimiento->fecha_vencimiento_permiso = $request->fecha_vencimiento_permiso;
        }

        $establecimiento->region = $request->region;
        $establecimiento->sibasi = $request->sibasi;
        $establecimiento->establecimiento_salud = $request->establecimiento_salud;

        //Campos para tipo de establecimiento: Sistema Agua
        if($establecimiento->id_tipo == 1){
            $establecimiento->viviendas_abastecidas_rural = $request->viviendas_abastecidas_rural;
            $establecimiento->poblacion_beneficiada_rural = $request->poblacion_beneficiada_rural;
            $establecimiento->viviendas_abastecidas_urbana = $request->viviendas_abastecidas_urbana;
            $establecimiento->poblacion_beneficiada_urbana = $request->poblacion_beneficiada_urbana;
            $establecimiento->plan_seguridad = $request->plan_seguridad;
        }
       
        //Campos para tipo de establecimiento: Piscina
        if($establecimiento->id_tipo == 2){
            $establecimiento->piscina_agua_superficial = $request->piscina_agua_superficial;
            $establecimiento->piscina_con_circulacion = $request->piscina_con_circulacion;
        }

        //Campos para tipo de establecimiento: Establecimiento DB
        if($establecimiento->id_tipo == 3){
            $establecimiento->actividad_realizada = $request->actividad_realizada;
            $establecimiento->empresa_recolectora = $request->empresa_recolectora;
            $establecimiento->plan_recolectura = $request->plan_recolectura;
            $establecimiento->empresa_plan = $request->empresa_plan;
        }
        
        //Campos para tipo de establecimiento: Rastro
        if($establecimiento->id_tipo == 4){
            $establecimiento->tipo_rastro = $request->tipo_rastro;
            $establecimiento->permiso_minsal = $request->permiso_minsal;
        }

        //Campos para tipo de establecimiento: Sutancias quimicas peligrosas
        if($establecimiento->id_tipo == 5){
            $establecimiento->sustancia_quimica = $request->sustancia_quimica;
            $establecimiento->tipo_riesgo_quimico = $request->tipo_riesgo_quimico;
        }

        //Campos para tipo de establecimiento: Sutancias quimicas peligrosas
        if($establecimiento->id_tipo == 6){
            $establecimiento->id_tipo_esta_alimento = $request->id_tipo_esta_alimento;
        }

        $establecimiento->save();

        return redirect()->route('control-establecimientos.index')->with('success', 'Establecimiento modificado correctamente');
    }

    public function destroy($id){
        ControlEstablecimientos::destroy($id);
        return redirect()->route('control-establecimientos.index')->with('success', 'Establecimiento eliminado correctamente');
    }
}