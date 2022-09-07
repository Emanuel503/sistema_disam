<?php

namespace App\Http\Controllers;

use App\Models\EstadosPaos;
use App\Models\MemosExternos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemosExternosController extends Controller
{
    public function index(){
        $memos = MemosExternos::all();
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('memos-externos.index-memos-externos', ['memos' => $memos, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function edit($id){
        $memos = MemosExternos::find($id);
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('memos-externos.edit-memos-externos', ['memos' => $memos, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function show($id){
        $memos = MemosExternos::find($id);
        return view('memos-externos.show-memos-externos', ['memos' => $memos]);
    }

    public function store(Request $request){
        $request->validate([
            'usuario' => 'required',
            'id_estado' => 'required',
            'destino' => 'required|min:3',
            'asunto' => 'required|min:3',
        ]);

        date_default_timezone_set('America/El_Salvador');
        $consulta = DB::select("SELECT `AUTO_INCREMENT` as 'id' FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'sistema_disam' AND   TABLE_NAME   = 'memos_externos';");
        $num = 0;

        foreach($consulta as $con){
            $num = $con->id;
        }

        $memos = new MemosExternos();
        $memos->id_tecnico = $request->usuario;
        $memos->id_usuario_adiciono = Auth::user()->id;
        $memos->id_estado = $request->id_estado;
        $memos->numero_memo = date('Y'). "-9510-".$num;
        $memos->fecha_memo = date('Y-m-d');
        $memos->destino = $request->destino;
        $memos->asunto = $request->asunto;
        $memos->save();

        return redirect()->route('memos-externos.index')->with('success', 'Memo externo guardado correctamente');
    }

    public function update(Request $request, $id){
        $request->validate([
            'usuario' => 'required',
            'id_estado' => 'required',
            'destino' => 'required|min:3',
            'asunto' => 'required|min:3',
        ]);

        $memos = MemosExternos::find($id);
        $memos->id_tecnico = $request->usuario;
        $memos->id_estado = $request->id_estado;
        $memos->destino = $request->destino;
        $memos->asunto = $request->asunto;
        $memos->save();

        return redirect()->route('memos-externos.index')->with('success', 'Memo externo modificado correctamente');
    }

    public function destroy($id){
        MemosExternos::destroy($id);
        return redirect()->route('memos-externos.index')->with('success', 'Memo externo eliminado correctamente');
    }
}