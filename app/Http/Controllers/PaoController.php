<?php

namespace App\Http\Controllers;

use App\Models\EstadosPaos;
use App\Models\Paos;
use Illuminate\Http\Request;
use Exception;

class PaoController extends Controller
{
    public function index(){
        $paos = Paos::all();
        $estados = EstadosPaos::all();
        return view('pao.index-pao', ['paos' => $paos, 'estados' => $estados]);
    }

    public function store(Request $request){
        $request->validate([
            'dependencia' => 'required',
            'id_estado' => 'required',
        ]);

        $paos = new Paos();
        $paos->dependencia = $request->dependencia;
        $paos->id_estado = $request->id_estado;
        $paos->save();

        return redirect()->route('pao.index')->with('success', 'PAO guardada correctamente');
    }
    
    public function destroy($id){
        try{
            Paos::destroy($id);
            return redirect()->route('pao.index')->with('success', 'PAO eliminada correctamente');
        } catch (Exception $e) {
            return redirect()->route('pao.index')->with('errorEliminar', 'No se puede eliminar la PAO, ya contiene registros');
        }
    }
}