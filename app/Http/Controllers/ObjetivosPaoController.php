<?php

namespace App\Http\Controllers;

use App\Models\ObjetivosPao;
use App\Models\Paos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjetivosPaoController extends Controller
{
    public function index($id){
        $objetivos = DB::select("SELECT * FROM objetivos_paos WHERE id_pao = ?", [$id]);
        $pao = Paos::find($id);

        return view('pao.objetivos.index-objetivos-paos', ['pao' => $pao, 'objetivos'=>$objetivos]);
    }

    public function edit($id, $pao){
        $objetivos = ObjetivosPao::find($id);
        $pao = Paos::find($pao);

        return view('pao.objetivos.edit-objetivos-paos', ['pao' => $pao, 'objetivos'=>$objetivos]);
    }

    public function store(Request $request, $pao){
        $request->validate([
            'id_pao' => 'required',
            'objetivo' => 'required',
        ]);

        $objetivos = new ObjetivosPao();
        $objetivos->id_pao = $request->id_pao;
        $objetivos->objetivo = $request->objetivo;
        $objetivos->save();

        return redirect()->route('objetivos-pao.index',['pao' => $pao])->with('success', 'Objetivo guardado correctamente');
    }

    public function update(Request $request, $id, $pao){
        $request->validate([
            'objetivo' => 'required',
        ]);

        $objetivos = ObjetivosPao::find($id);
        $objetivos->objetivo = $request->objetivo;
        $objetivos->save();

        return redirect()->route('objetivos-pao.index',['pao' => $pao])->with('success', 'Objetivo modificado correctamente');
    }

    public function destroy($id, $pao){
        try{
            ObjetivosPao::destroy($id);
            return redirect()->route('objetivos-pao.index',['pao' => $pao])->with('success', 'Objetivo eliminado correctamente');
        }catch(Exception $e){
            return redirect()->route('objetivos-pao.index',['pao' => $pao])->withErrors('No se puede eliminar el objetivo, ya contiene registros');
        } 
    }
}