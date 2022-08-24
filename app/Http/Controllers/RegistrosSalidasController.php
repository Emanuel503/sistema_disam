<?php

namespace App\Http\Controllers;

use App\Models\RegistrosSalidas;
use App\Models\Lugares;
use App\Models\EstadosSalidas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class RegistrosSalidasController extends Controller
{
    public function reportePdf(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $salidas = DB::select("SELECT CONCAT(u.nombres,' ',u.apellidos) as 'tecnico', l.nombre as 'lugar', d.nombre as 'dependencia', l.nombre , r.fecha, r.hora_inicio, r.hora_final, r.objetivo, e.estado FROM registros_salidas r INNER JOIN users u ON r.id_usuario = u.id INNER JOIN lugares l ON r.id_lugar = l.id INNER JOIN dependencias d ON d.id = u.id_dependencia INNER JOIN estados_salidas e ON r.id_estado = e.id WHERE r.id_usuario = ? AND r.fecha BETWEEN ? AND ?", [$request->id_usuario ,$request->fecha_inicio, $request->fecha_final]);

        if(sizeof($salidas) > 0){
            $pdf->loadView('registros-salidas.reportePdf', ['fecha_inicio' => $request->fecha_inicio, 'fecha_final' => $request->fecha_final,'salidas' => $salidas])->setPaper('letter');
            return $pdf->stream();
        }else{
            return redirect()->route('registros-salida.reporte')->with('errorDatos', 'No hay registros disponibles.')->withInput();
        }
    }

    public function reporte()
    {
        $usuarios = User::all();
        return view('registros-salidas.reporte', ['usuarios' => $usuarios]);
    }

    public function comprobarHoras($hora_salida, $hora_fin)
    {
        if (strtotime($hora_fin) <= strtotime($hora_salida)) {
            return "errorHora";
        }
    }

    public function index(){
        $salidas = RegistrosSalidas::all();
        $lugares = Lugares::orderBy('nombre')->get();
        $estados = EstadosSalidas::all();
        $usuarios = User::all();
        return view('registros-salidas.index-registros-salidas', ['salidas'=> $salidas, 'lugares' => $lugares, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function show($id)
    {
        $salidas = RegistrosSalidas::find($id);
        return view('registros-salidas.show-registros-salidas', ['salidas'=> $salidas]);
    }

    public function edit($id)
    {
        $salidas = RegistrosSalidas::find($id);
        $lugares = Lugares::orderBy('nombre')->get();
        $estados = EstadosSalidas::all();
        $usuarios = User::all();
        return view('registros-salidas.edit-registros-salidas', ['salidas'=> $salidas, 'lugares' => $lugares, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lugar' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'objetivo' => 'required|min:5'
        ]);

        $comprobar = $this->comprobarHoras($request->hora_inicio, $request->hora_final);

        if ($comprobar == "errorHora") {
            return redirect()->route('registros-salida.index')->with('errorHora', 'La hora de inicio no puede ser mayor que la hora de fin.')->withInput();
        }

        $salidas = new RegistrosSalidas();
        $salidas->id_lugar = $request->id_lugar;
        $salidas->id_usuario = Auth::user()->id;
        $salidas->id_estado = 1;
        $salidas->fecha = $request->fecha;
        $salidas->hora_inicio = $request->hora_inicio;
        $salidas->hora_final = $request->hora_final;
        $salidas->objetivo = $request->objetivo;
        $salidas->title = "Registro de salida";
        $salidas->color = "#959595";
        $salidas->start = $request->fecha . ' ' . $request->hora_inicio;;
        $salidas->end = $request->fecha . ' ' . $request->hora_final;

        $salidas->save();

        return redirect()->route('registros-salida.index')->with('success', 'Registro de salida guardada correctamente.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_lugar' => 'required',
            'id_estado' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'objetivo' => 'required|min:5'
        ]);

        $comprobar = $this->comprobarHoras($request->hora_inicio, $request->hora_final);

        if ($comprobar == "errorHora") {
            return redirect()->route('registros-salida.edit' , ['registros_salida' => $id])->with('errorHora', 'La hora de inicio no puede ser mayor que la hora de fin.')->withInput();
        }

        $salidas = RegistrosSalidas::find($id);
        $salidas->id_lugar = $request->id_lugar;
        $salidas->id_estado = $request->id_estado;
        $salidas->fecha = $request->fecha;
        $salidas->hora_inicio = $request->hora_inicio;
        $salidas->hora_final = $request->hora_final;
        $salidas->objetivo = $request->objetivo;
        $salidas->start = $request->fecha . ' ' . $request->hora_inicio;;
        $salidas->end = $request->fecha . ' ' . $request->hora_final;
        $salidas->save();

        return redirect()->route('registros-salida.index')->with('success', 'Registro de salida actualizada correctamente');
    }

    public function destroy($id)
    {
        RegistrosSalidas::destroy($id);
        return redirect()->route('registros-salida.index')->with('success', 'Registro de salida eliminada correctamente'); 
    }
}