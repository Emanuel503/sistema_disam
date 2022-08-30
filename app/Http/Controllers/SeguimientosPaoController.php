<?php

namespace App\Http\Controllers;

use App\Models\EstadosPaos;
use App\Models\ObjetivosPao;
use App\Models\Paos;
use App\Models\SeguimientosPaos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeguimientosPaoController extends Controller
{
    public function index($objetivo, $pao){
        $seguimientos = DB::select("SELECT s.id, s.id_objetivo, s.id_estado, s.resultado, ep.estado FROM seguimientos_paos s INNER JOIN estados_paos ep ON s.id_estado = ep.id WHERE s.id_objetivo = ?", [$objetivo]);
        $pao = Paos::find($pao);
        $objetivo = ObjetivosPao::find($objetivo);
        $estados = EstadosPaos::all();

        return view('pao.seguimientos.index-seguimientos-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimientos'=>$seguimientos, 'estados' => $estados]);
    }

    public function edit($id, $objetivo, $pao){
        $seguimiento = SeguimientosPaos::find($id);
        $estados = EstadosPaos::all();

        return view('pao.seguimientos.edit-seguimientos-paos', ['pao' => $pao, 'objetivo'=>$objetivo, 'seguimiento'=>$seguimiento, 'estados' => $estados]);
    }

    public function store(Request $request, $objetivo, $pao){
        $request->validate([
            'id_objetivo' => 'required',
            'id_estado' => 'required',
            'resultado' => 'required|min:3',
        ]);

        $seguimiento = new SeguimientosPaos();
        $seguimiento->id_objetivo = $request->id_objetivo;
        $seguimiento->id_estado = $request->id_estado;
        $seguimiento->resultado = $request->resultado;
        $seguimiento->save();

        return redirect()->route('seguimientos-pao.index', ['objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Resultado guardado correctamente');
    }

    public function update(Request $request, $id, $objetivo, $pao){
        $request->validate([
            'id_estado' => 'required',
            'resultado' => 'required|min:3',
        ]);

        $seguimiento = SeguimientosPaos::find($id);
        $seguimiento->id_estado = $request->id_estado;
        $seguimiento->resultado = $request->resultado;
        $seguimiento->save();

        return redirect()->route('seguimientos-pao.index', ['objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Resultado modificado correctamente');
    }

    public function destroy($id, $objetivo ,$pao){
        try{
            SeguimientosPaos::destroy($id);
            return redirect()->route('seguimientos-pao.index', ['objetivo' => $objetivo, 'pao' => $pao])->with('success', 'Resultado eliminado correctamente');
        }catch(Exception $e){
            return redirect()->route('seguimientos-pao.index', ['objetivo' => $objetivo, 'pao' => $pao])->withErrors('No se puede eliminar el resultado, ya contiene registros');
        } 
    }
}