<?php

namespace App\Http\Controllers;

use App\Models\ActividadesPaos;
use App\Models\Dependencias;
use App\Models\EstadosPaos;
use App\Models\ObjetivosPao;
use App\Models\Paos;
use App\Models\SeguimientosPaos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActividadesPaosController extends Controller
{
    public function index($seguimiento, $objetivo, $pao){
        $actividades = DB::select("SELECT a.id, a.id_seguimiento, a.id_dependencia, a.id_estado, a.actividad, a.indicador, a.verificacion, a.meta, a.fecha_inicio, a.fecha_fin, a.observacion, ep.estado, d.nombre FROM actividades_paos a INNER JOIN estados_paos ep ON a.id_estado = ep.id INNER JOIN dependencias d on a.id_dependencia = d.id WHERE a.id_seguimiento = ?", [$seguimiento]);
        $seguimiento = SeguimientosPaos::find($seguimiento);
        $objetivo = ObjetivosPao::find($objetivo);
        $pao = Paos::find($pao);
        $estados = EstadosPaos::all();
        $dependencias = Dependencias::all();

        return view('pao.actividades.index-actividades-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento' => $seguimiento, 'actividades'=>$actividades, 'estados' => $estados, 'dependencias' => $dependencias]);
    }

    public function edit($id, $seguimiento, $objetivo, $pao){
        $actividad = ActividadesPaos::find($id);
        $estados = EstadosPaos::all();
        $dependencias = Dependencias::all();

        return view('pao.actividades.edit-actividades-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento' => $seguimiento, 'actividad'=>$actividad, 'estados' => $estados, 'dependencias' => $dependencias]);
    }

    public function store(Request $request, $seguimiento, $objetivo, $pao){
        $request->validate([
            'id_seguimiento' => 'required',
            'id_estado' => 'required',
            'id_dependencia' => 'required',
            'actividad' => 'required|min:3',
            'indicador' => 'required|min:3',
            'verificacion' => 'required|min:3',
            'meta' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'observacion' => 'required|min:3',
        ]);

        $actividades = new ActividadesPaos();
        $actividades->id_seguimiento = $request->id_seguimiento;
        $actividades->id_estado = $request->id_estado;
        $actividades->id_dependencia = $request->id_dependencia;
        $actividades->actividad = $request->actividad;
        $actividades->indicador = $request->indicador;
        $actividades->verificacion = $request->verificacion;
        $actividades->meta = $request->meta;
        $actividades->fecha_inicio = $request->fecha_inicio;
        $actividades->fecha_fin = $request->fecha_fin;
        $actividades->observacion = $request->observacion;
        $actividades->save();

        return redirect()->route('actividades-pao.index', ['seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Actividad guardada correctamente');
    }

    public function update(Request $request, $id, $seguimiento, $objetivo, $pao){
        $request->validate([
            'id_estado' => 'required',
            'id_dependencia' => 'required',
            'actividad' => 'required|min:3',
            'indicador' => 'required|min:3',
            'verificacion' => 'required|min:3',
            'meta' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'observacion' => 'required|min:3',
        ]);

        $actividades = ActividadesPaos::find($id);
        $actividades->id_estado = $request->id_estado;
        $actividades->id_dependencia = $request->id_dependencia;
        $actividades->actividad = $request->actividad;
        $actividades->indicador = $request->indicador;
        $actividades->verificacion = $request->verificacion;
        $actividades->meta = $request->meta;
        $actividades->fecha_inicio = $request->fecha_inicio;
        $actividades->fecha_fin = $request->fecha_fin;
        $actividades->observacion = $request->observacion;
        $actividades->save();

        return redirect()->route('actividades-pao.index', ['seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Actividad modificada correctamente');
    }

    public function destroy($id, $seguimiento, $objetivo ,$pao){
        try{
            ActividadesPaos::destroy($id);
            return redirect()->route('actividades-pao.index', ['seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Actividad eliminada correctamente');
        }catch(Exception $e){
            return redirect()->route('actividades-pao.index', ['seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->withErrors('No se puede eliminar la actividad, ya contiene registros');
        } 
    }
}