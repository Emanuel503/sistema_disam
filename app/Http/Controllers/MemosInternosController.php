<?php

namespace App\Http\Controllers;

use App\Models\EstadosPaos;
use App\Models\MemosInternos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemosInternosController extends Controller
{
    public function index(){
        $memos = MemosInternos::all();
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('memos-internos.index-memos-internos', ['memos' => $memos, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function edit($id){
        $memos = MemosInternos::find($id);
        $estados = EstadosPaos::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('memos-internos.edit-memos-internos', ['memos' => $memos, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function show($id){
        $memos = MemosInternos::find($id);
        return view('memos-internos.show-memos-internos', ['memos' => $memos]);
    }

    public function store(Request $request){
        $request->validate([
            'usuario' => 'required',
            'id_estado' => 'required',
            'destino' => 'required|min:3',
            'asunto' => 'required|min:3',
        ]);

        date_default_timezone_set('America/El_Salvador');
        $consulta = DB::select("SELECT `AUTO_INCREMENT` as 'id' FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'sistema_disam' AND   TABLE_NAME   = 'memos_internos';");
        $num = 0;

        foreach($consulta as $con){
            $num = $con->id;
        }

        $memos = new MemosInternos();
        $memos->id_tecnico = $request->usuario;
        $memos->id_usuario_adiciono = Auth::user()->id;
        $memos->id_estado = $request->id_estado;
        $memos->numero_memo = date('Y'). "-9510-".$num;
        $memos->fecha_memo = date('Y-m-d');
        $memos->destino = $request->destino;
        $memos->asunto = $request->asunto;
        $memos->save();

        return redirect()->route('memos-internos.index')->with('success', 'Memo interno guardado correctamente');
    }

    public function update(Request $request, $id){
        $request->validate([
            'usuario' => 'required',
            'id_estado' => 'required',
            'destino' => 'required|min:3',
            'asunto' => 'required|min:3',
        ]);

        $memos = MemosInternos::find($id);
        $memos->id_tecnico = $request->usuario;
        $memos->id_estado = $request->id_estado;
        $memos->destino = $request->destino;
        $memos->asunto = $request->asunto;
        $memos->save();

        return redirect()->route('memos-internos.index')->with('success', 'Memo interno modificado correctamente');
    }

    public function destroy($id){
        MemosInternos::destroy($id);
        return redirect()->route('memos-internos.index')->with('success', 'Memo interno eliminado correctamente');
    }
}