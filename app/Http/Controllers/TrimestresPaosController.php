<?php

namespace App\Http\Controllers;

use App\Models\ActividadesPaos;
use App\Models\EstadosPaos;
use App\Models\ObjetivosPao;
use App\Models\Paos;
use App\Models\SeguimientosPaos;
use App\Models\TrimestresPaos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrimestresPaosController extends Controller
{
    public function index($actividad, $seguimiento, $objetivo, $pao){
        $trimestres = DB::select("SELECT t.id, t.id_actividad, t.id_estado, t.trimestre, t.programado, t.realizado, t.porcentaje, t.observacion, t.fecha_inicio, t.fecha_fin, ep.estado FROM trimestres_paos t INNER JOIN estados_paos ep ON t.id_estado = ep.id WHERE t.id_actividad = ?", [$actividad]);
        $actividad = ActividadesPaos::find($actividad);
        $seguimiento = SeguimientosPaos::find($seguimiento);
        $objetivo = ObjetivosPao::find($objetivo);
        $pao = Paos::find($pao);
        $estados = EstadosPaos::all();

        return view('pao.trimestres.index-trimestres-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento' => $seguimiento, 'actividad'=>$actividad, 'trimestres' => $trimestres, 'estados' => $estados]);
    }

    public function edit($id, $actividad, $seguimiento, $objetivo, $pao){
        $trimestre = TrimestresPaos::find($id);
        $estados = EstadosPaos::all();

        return view('pao.trimestres.edit-trimestres-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento' => $seguimiento, 'actividad'=>$actividad, 'trimestre' => $trimestre, 'estados' => $estados]);
    }

    public function store(Request $request, $actividad,  $seguimiento, $objetivo, $pao){
        $request->validate([
            'id_actividad' => 'required',
            'id_estado' => 'required',
            'trimestre' => 'required',
            'programado' => 'required',
            'realizado' => 'required',
            'porcentaje' => 'required',
            'observacion' => 'required|min:3',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $trimestres = new TrimestresPaos();
        $trimestres->id_actividad = $request->id_actividad;
        $trimestres->id_estado = $request->id_estado;
        $trimestres->trimestre = $request->trimestre;
        $trimestres->programado = $request->programado;
        $trimestres->realizado = $request->realizado;
        $trimestres->porcentaje = $request->porcentaje;
        $trimestres->observacion = $request->observacion;
        $trimestres->fecha_inicio = $request->fecha_inicio;
        $trimestres->fecha_fin = $request->fecha_fin;
        $trimestres->save();

        return redirect()->route('trimestres-pao.index', ['actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Trimestre guardado correctamente');
    }

    public function update(Request $request, $id, $actividad,  $seguimiento, $objetivo, $pao){
        $request->validate([
            'id_estado' => 'required',
            'trimestre' => 'required',
            'programado' => 'required',
            'realizado' => 'required',
            'porcentaje' => 'required',
            'observacion' => 'required|min:3',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $trimestres = TrimestresPaos::find($id);
        $trimestres->id_estado = $request->id_estado;
        $trimestres->trimestre = $request->trimestre;
        $trimestres->programado = $request->programado;
        $trimestres->realizado = $request->realizado;
        $trimestres->porcentaje = $request->porcentaje;
        $trimestres->observacion = $request->observacion;
        $trimestres->fecha_inicio = $request->fecha_inicio;
        $trimestres->fecha_fin = $request->fecha_fin;
        $trimestres->save();

        return redirect()->route('trimestres-pao.index', ['actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Trimestre modificado correctamente');
    }

    public function destroy($id, $actividad ,$seguimiento, $objetivo ,$pao){
        try{
            TrimestresPaos::destroy($id);
            return redirect()->route('trimestres-pao.index', ['actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Trimestre eliminado correctamente');
        }catch(Exception $e){
            return redirect()->route('trimestres-pao.index', ['actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->withErrors('No se puede eliminar el trimestre, ya contiene registros');
        } 
    }
}