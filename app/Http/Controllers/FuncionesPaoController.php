<?php

namespace App\Http\Controllers;

use App\Models\FuncionesPao;
use App\Models\Paos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionesPaoController extends Controller
{
    public function index($id){
        $funciones = DB::select("SELECT * FROM funciones_paos WHERE id_pao = ?", [$id]);
        $pao = Paos::find($id);

        return view('pao.funciones.index-funciones-paos', ['pao' => $pao, 'funciones'=>$funciones]);
    }

    public function edit($id, $pao){
        $funciones = FuncionesPao::find($id);
        $pao = Paos::find($pao);

        return view('pao.funciones.edit-funciones-paos', ['pao' => $pao, 'funciones'=>$funciones]);
    }

    public function store(Request $request, $pao){
        $request->validate([
            'id_pao' => 'required',
            'funcion' => 'required',
        ]);

        $funciones = new FuncionesPao();
        $funciones->id_pao = $request->id_pao;
        $funciones->funcion = $request->funcion;
        $funciones->save();

        return redirect()->route('funciones-pao.index',['pao' => $pao])->with('success', 'Funcion guardada correctamente');
    }

    public function update(Request $request, $id, $pao){
        $request->validate([
            'funcion' => 'required',
        ]);

        $funciones = FuncionesPao::find($id);
        $funciones->funcion = $request->funcion;
        $funciones->save();

        return redirect()->route('funciones-pao.index',['pao' => $pao])->with('success', 'Funcion modificada correctamente');
    }

    public function destroy($id, $pao){
        FuncionesPao::destroy($id);
        return redirect()->route('funciones-pao.index',['pao' => $pao])->with('success', 'Funcion eliminada correctamente');
    }
}