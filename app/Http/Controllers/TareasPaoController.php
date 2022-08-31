<?php

namespace App\Http\Controllers;

use App\Models\ActividadesPaos;
use App\Models\EstadosPaos;
use App\Models\ObjetivosPao;
use App\Models\Paos;
use App\Models\SeguimientosPaos;
use App\Models\TareasPaos;
use App\Models\TrimestresPaos;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareasPaoController extends Controller
{
    public function index($trimestre ,$actividad, $seguimiento, $objetivo, $pao){
        $tareas = DB::select("SELECT t.id, t.id_trimestre, t.id_usuario, t.id_estado, t.tarea, t.observacion, t.tiempo, t.fecha, ep.estado, CONCAT(u.nombres, ' ', u.apellidos) as usuario FROM tareas_paos t INNER JOIN estados_paos ep ON t.id_estado = ep.id INNER JOIN users u ON t.id_usuario = u.id WHERE t.id_trimestre = ?", [$trimestre]);
        $trimestre = TrimestresPaos::find($trimestre);
        $actividad = ActividadesPaos::find($actividad);
        $seguimiento = SeguimientosPaos::find($seguimiento);
        $objetivo = ObjetivosPao::find($objetivo);
        $pao = Paos::find($pao);
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();

        return view('pao.tareas.index-tareas-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento' => $seguimiento, 'actividad'=>$actividad, 'trimestre' => $trimestre,'tareas' => $tareas ,'usuarios' => $usuarios, 'estados' => $estados]);
    }

    public function edit($id, $trimestre ,$actividad, $seguimiento, $objetivo, $pao){
        $tarea = TareasPaos::find($id);
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        
        return view('pao.tareas.edit-tareas-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento' => $seguimiento, 'actividad'=>$actividad, 'trimestre' => $trimestre, 'tarea' => $tarea, 'usuarios' => $usuarios, 'estados' => $estados]);
    }

    public function store(Request $request, $trimestre ,$actividad, $seguimiento, $objetivo, $pao){
        $request->validate([
            'id_trimestre' => 'required',
            'id_estado' => 'required',
            'id_usuario' => 'required',
            'tarea' => 'required|min:2|max:500',
            'observacion' => 'required|min:2',
            'tiempo' => 'required|min:0|numeric',
            'fecha' => 'required|date',
        ]);

        $tareas = new TareasPaos();
        $tareas->id_trimestre = $request->id_trimestre;
        $tareas->id_estado = $request->id_estado;
        $tareas->id_usuario = $request->id_usuario;
        $tareas->tarea = $request->tarea;
        $tareas->observacion = $request->observacion;
        $tareas->tiempo = $request->tiempo;
        $tareas->fecha = $request->fecha;
        $tareas->save();

        return redirect()->route('tareas-pao.index', ['trimestre' => $trimestre,'actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Tarea guardada correctamente');
    }

    public function update(Request $request, $id,$trimestre ,$actividad, $seguimiento, $objetivo, $pao){
        $request->validate([
            'id_estado' => 'required',
            'id_usuario' => 'required',
            'tarea' => 'required|min:2|max:500',
            'observacion' => 'required|min:2',
            'tiempo' => 'required|min:0|numeric',
            'fecha' => 'required|date',
        ]);

        $tareas = TareasPaos::find($id);
        $tareas->id_estado = $request->id_estado;
        $tareas->id_usuario = $request->id_usuario;
        $tareas->tarea = $request->tarea;
        $tareas->observacion = $request->observacion;
        $tareas->tiempo = $request->tiempo;
        $tareas->fecha = $request->fecha;
        $tareas->save();

        return redirect()->route('tareas-pao.index', ['trimestre' => $trimestre,'actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Tarea modificada correctamente');
    }

    public function destroy($id, $trimestre ,$actividad ,$seguimiento, $objetivo ,$pao){
        try{
            TareasPaos::destroy($id);
            return redirect()->route('tareas-pao.index', ['trimestre' => $trimestre ,'actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Tarea eliminada correctamente');
        }catch(Exception $e){
            return redirect()->route('tareas-pao.index', ['trimestre' => $trimestre ,'actividad' => $actividad,'seguimiento' => $seguimiento ,'objetivo' => $objetivo, 'pao' => $pao])->withErrors('No se puede eliminar la tarea, ya contiene registros');
        } 
    }
}