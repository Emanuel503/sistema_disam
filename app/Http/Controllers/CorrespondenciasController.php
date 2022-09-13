<?php

namespace App\Http\Controllers;

use App\Models\Coordinadores;
use App\Models\Correspondencias;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CorrespondenciasController extends Controller
{
    public function reporteFecha(){
        return view('correspondencias.reporteCorrespondenciaFecha');
    }

    public function reporteFechaPdf(Request $request){
        $request->validate([
            'fecha' => 'required',
        ]);

        $pdf = App::make('dompdf.wrapper');
        $correspondencias = Correspondencias::where('fecha', $request->fecha)->get();
        $director = DB::select("SELECT u.nombres, u.apellidos FROM coordinadores c INNER JOIN users u ON c.id_tecnico = u.id WHERE id_coordinacion = 1");

        if (sizeof($correspondencias) > 0) {
            $pdf->loadView('correspondencias.reporteCorrespondenciaFechaPdf', ['correspondencias' => $correspondencias, 'director' => $director])->setPaper('latter', 'landscape');
            return $pdf->stream();
        } else {
            return redirect()->route('correspondencias.reporteFecha')->withErrors('No hay registros disponibles.')->withInput();
        }
    }

    public function reporteUsuario(){
        $usuarios = User::orderBy('nombres')->get();
        return view('correspondencias.reporteCorrespondenciaUsuario',['usuarios' => $usuarios]);
    }

    public function reporteUsuarioPdf(Request $request){
        $request->validate([
            'id_usuario' => 'required',
        ]);

        $pdf = App::make('dompdf.wrapper');
        $correspondencias = Correspondencias::where('id_usuario', $request->id_usuario)->get();
        $director = DB::select("SELECT u.nombres, u.apellidos FROM coordinadores c INNER JOIN users u ON c.id_tecnico = u.id WHERE id_coordinacion = 1");
        
        if (sizeof($correspondencias) > 0) {
            $pdf->loadView('correspondencias.reporteCorrespondenciaUsuarioPdf', ['correspondencias' => $correspondencias, 'director' => $director])->setPaper('latter', 'landscape');
            return $pdf->stream();
        } else {
            return redirect()->route('correspondencias.reporteUsuario')->withErrors('No hay registros disponibles.')->withInput();
        }
    }

    public function reporteCorrespondencia($id){
        $director = DB::select("SELECT u.nombres, u.apellidos FROM coordinadores c INNER JOIN users u ON c.id_tecnico = u.id WHERE id_coordinacion = 1");
        
        $pdf = App::make('dompdf.wrapper');
        $correspondencias = Correspondencias::find($id);
        $pdf->loadView('correspondencias.reporteCorrespondenciaPdf', ['correspondencias' => $correspondencias,'director' => $director])->setPaper('latter', 'landscape');
        return $pdf->stream();
    }

    public function index(){
        $correspondencias = Correspondencias::all();
        $usuarios = User::orderBy('nombres')->get();
        return view('correspondencias.index-correspondencias', ['correspondencias' => $correspondencias, 'usuarios' => $usuarios]);
    }

    public function edit($id){
        $correspondencias = Correspondencias::find($id);
        $usuarios = User::orderBy('nombres')->get();
        return view('correspondencias.edit-correspondencias', ['correspondencias' => $correspondencias, 'usuarios' => $usuarios]);
    }

    public function show($id){
        $correspondencias = Correspondencias::find($id);
        return view('correspondencias.show-correspondencias', ['correspondencias' => $correspondencias]);
    }

    public function store(Request $request){
        $request->validate([
            'procedencia' => 'required|min:3',
            'extracto' => 'required|min:3',
        ]);

        date_default_timezone_set('America/El_Salvador');

        $correspondencias = new Correspondencias();
        $correspondencias->id_usuario = $request->id_usuario;
        $correspondencias->id_usuario_adiciono = Auth::user()->id;
        $correspondencias->fecha = date('Y-m-d');
        $correspondencias->hora = date('h:i:s A');
        $correspondencias->procedencia = $request->procedencia;
        $correspondencias->observacion = $request->observacion;
        $correspondencias->extracto = $request->extracto;
        $correspondencias->urgencia = $request->urgencia;
        $correspondencias->resuelto = $request->resuelto;
        $correspondencias->opcion1 = $request->opcion1;
        $correspondencias->opcion2 = $request->opcion2;
        $correspondencias->opcion3 = $request->opcion3;
        $correspondencias->opcion4 = $request->opcion4;
        $correspondencias->opcion5 = $request->opcion5;
        $correspondencias->opcion6 = $request->opcion6;
        $correspondencias->opcion7 = $request->opcion7;
        $correspondencias->opcion8 = $request->opcion8;
        $correspondencias->opcion9 = $request->opcion9;
        $correspondencias->opcion10 = $request->opcion10;
        $correspondencias->opcion11 = $request->opcion11;
        $correspondencias->opcion12 = $request->opcion12;
        $correspondencias->opcion13 = $request->opcion13;
        $correspondencias->opcion14 = $request->opcion14;
        $correspondencias->opcion15 = $request->opcion15;
        $correspondencias->save();

        return redirect()->route('correspondencias.index')->with('success','Correspondencia guardada correctamente');
    }

    public function update(Request $request, $id){
        $request->validate([
            'procedencia' => 'required|min:3',
            'extracto' => 'required|min:3',
        ]);

        $correspondencias = Correspondencias::find($id);
        $correspondencias->id_usuario = $request->id_usuario;
        $correspondencias->procedencia = $request->procedencia;
        $correspondencias->observacion = $request->observacion;
        $correspondencias->extracto = $request->extracto;
        $correspondencias->urgencia = $request->urgencia;
        $correspondencias->resuelto = $request->resuelto;
        $correspondencias->opcion1 = $request->opcion1;
        $correspondencias->opcion2 = $request->opcion2;
        $correspondencias->opcion3 = $request->opcion3;
        $correspondencias->opcion4 = $request->opcion4;
        $correspondencias->opcion5 = $request->opcion5;
        $correspondencias->opcion6 = $request->opcion6;
        $correspondencias->opcion7 = $request->opcion7;
        $correspondencias->opcion8 = $request->opcion8;
        $correspondencias->opcion9 = $request->opcion9;
        $correspondencias->opcion10 = $request->opcion10;
        $correspondencias->opcion11 = $request->opcion11;
        $correspondencias->opcion12 = $request->opcion12;
        $correspondencias->opcion13 = $request->opcion13;
        $correspondencias->opcion14 = $request->opcion14;
        $correspondencias->opcion15 = $request->opcion15;
        $correspondencias->save();

        return redirect()->route('correspondencias.index')->with('success','Correspondencia modificada correctamente');
    }

    public function destroy($id){
        try{
            Correspondencias::destroy($id);
            return redirect()->route('correspondencias.index')->with('success','Correspondencia eliminada correctamente');
        }catch(Exception $e){
            return redirect()->route('correspondencias.index')->withErrors('No se puede eliminar la correspondencia, ya contiene registros');
        }
    }
}