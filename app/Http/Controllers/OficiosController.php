<?php

namespace App\Http\Controllers;

use App\Models\EstadosPaos;
use App\Models\Oficios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OficiosController extends Controller
{
    public function index(){
        $oficios = Oficios::all();
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('oficios.index-oficios', ['oficios' => $oficios, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function edit($id){
        $oficios = Oficios::find($id);
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('oficios.edit-oficios', ['oficios' => $oficios, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function show($id){
        $oficios = Oficios::find($id);
        return view('oficios.show-oficios', ['oficios' => $oficios]);
    }

    public function store(Request $request){
        $request->validate([
            'usuario' => 'required',
            'id_estado' => 'required',
            'destino' => 'required|min:3',
            'asunto' => 'required|min:3',
        ]);

        date_default_timezone_set('America/El_Salvador');
        $consulta = DB::select("SELECT `AUTO_INCREMENT` as 'id' FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'sistema_disam' AND   TABLE_NAME   = 'oficios';");
        $num = 0;

        foreach($consulta as $con){
            $num = $con->id;
        }

        $oficios = new Oficios();
        $oficios->id_tecnico = $request->usuario;
        $oficios->id_usuario_adiciono = Auth::user()->id;
        $oficios->id_estado = $request->id_estado;
        $oficios->numero_oficio = date('Y'). "-9510-".$num;
        $oficios->fecha_oficio = date('Y-m-d');
        $oficios->destino = $request->destino;
        $oficios->asunto = $request->asunto;
        $oficios->save();

        return redirect()->route('oficios.index')->with('success', 'Oficio guardado correctamente');
    }

    public function update(Request $request, $id){
        $request->validate([
            'usuario' => 'required',
            'id_estado' => 'required',
            'destino' => 'required|min:3',
            'asunto' => 'required|min:3',
        ]);

        $oficios = Oficios::find($id);
        $oficios->id_tecnico = $request->usuario;
        $oficios->id_estado = $request->id_estado;
        $oficios->destino = $request->destino;
        $oficios->asunto = $request->asunto;
        $oficios->save();

        return redirect()->route('oficios.index')->with('success', 'Oficio modificado correctamente');
    }

    public function destroy($id){
        Oficios::destroy($id);
        return redirect()->route('oficios.index')->with('success', 'Oficio eliminado correctamente');
    }
}