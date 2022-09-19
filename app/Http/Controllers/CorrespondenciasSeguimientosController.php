<?php

namespace App\Http\Controllers;

use App\Models\Correspondencias;
use App\Models\CorrespondenciasSeguimientos;
use App\Models\EstadosCorrespondenciaSeguimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CorrespondenciasSeguimientosController extends Controller
{
    public function index($correspondencia){
        $seguimientos = CorrespondenciasSeguimientos::where('id_correspondencia', $correspondencia)->get();
        $correspondencia = Correspondencias::find($correspondencia);
        $recibido=0;

        foreach($seguimientos as $seguimiento){
            if($seguimiento->id_estado == 1){
                $recibido = 1;
            }
        }

        if($recibido == 1){
            $estados = DB::select("SELECT * FROM estados_correspondencia_seguimientos WHERE id != 1");
        }else{
            $estados = DB::select("SELECT * FROM estados_correspondencia_seguimientos WHERE id = 1");
        }

        return view('correspondencias-seguimientos.index-correspondencias-seguimientos', ['seguimientos' => $seguimientos, 'correspondencia' => $correspondencia, 'estados' => $estados]);
    }

    public function edit($correspondencia, $seguimiento){
        $seguimientos = CorrespondenciasSeguimientos::find($seguimiento);
        $correspondencia = Correspondencias::find($correspondencia);
        $estados = EstadosCorrespondenciaSeguimientos::all();
        return view('correspondencias-seguimientos.edit-correspondencias-seguimientos', ['seguimientos' => $seguimientos, 'correspondencia' => $correspondencia, 'estados' => $estados]);
    }

    public function store(Request $request, $correspondencia){
        $request->validate([
            'seguimiento' => 'required',
            'id_estado' => 'required'
        ]);

        $seguimiento = new CorrespondenciasSeguimientos();
        $seguimiento->id_correspondencia =  $correspondencia;
        $seguimiento->id_usuario_adiciono =  Auth::user()->id;
        $seguimiento->id_estado = $request->id_estado;
        $seguimiento->seguimiento = $request->seguimiento;
        $seguimiento->save();

        return redirect()->route('correspondencias-seguimientos.index', ['correspondencia' => $correspondencia])->with('success', 'Seguimiento guardado correctamente');
    }

    public function update(Request $request, $correspondencia, $seguimiento){
        $request->validate([
            'seguimiento' => 'required',
            'id_estado' => 'required'
        ]);

        $seguimiento = CorrespondenciasSeguimientos::find($seguimiento);
        $seguimiento->id_correspondencia =  $correspondencia;
        $seguimiento->id_usuario_adiciono =  Auth::user()->id;
        $seguimiento->id_estado = $request->id_estado;
        $seguimiento->seguimiento = $request->seguimiento;
        $seguimiento->save();

        return redirect()->route('correspondencias-seguimientos.index', ['correspondencia' => $correspondencia])->with('success', 'Seguimiento modificado correctamente');
    }

    public function destroy($correspondencia, $seguimiento){
        CorrespondenciasSeguimientos::destroy($seguimiento);
        return redirect()->route('correspondencias-seguimientos.index', ['correspondencia' => $correspondencia])->with('success', 'Seguimiento eliminado correctamente');
    }
}