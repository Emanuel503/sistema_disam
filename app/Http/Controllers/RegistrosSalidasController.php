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

        $transportes = DB::select("SELECT v.placa, CONCAT(c.nombres,' ',c.apellidos) as 'conductor', t.correlativo, t.fecha,  ld.nombre as 'lugar_d', t.combustible, t.km_salida, t.km_destino, t.distancia_recorrida FROM transportes t INNER JOIN lugares ld ON t.lugar_destino = ld.id INNER JOIN users c ON t.id_conductor = c.id INNER JOIN vehiculos v ON t.id_placa = v.id WHERE t.id_placa = ? AND t.fecha LIKE ?" , [$request->id_vehiculo, $request->fecha.'%']);

        if(sizeof($transportes) > 0){
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $mes = $meses[date("n", strtotime($request->fecha)-1)];
            $year = date("Y", strtotime($request->fecha));

            $pdf->loadView('transporte.consumo-combustible-pdf', ['year' => $year, 'mes' => $mes,'transportes' => $transportes])->setPaper('letter', 'landscape');
            return $pdf->stream();
        }else{
            return redirect()->route('transporte.comsumoCombustible')->with('errorDatos', 'No hay registros disponibles.')->withInput();
        }
    }

    public function reporte()
    {
        $usuarios = User::all();
        return view('permisos.index-permisos', ['usuarios' => $usuarios]);
    }

    public function comprobarHoras($hora_salida, $hora_fin)
    {
        if (strtotime($hora_fin) <= strtotime($hora_salida)) {
            return "errorHora";
        }
    }

    public function index(){
        $salidas = RegistrosSalidas::all();
        $lugares = Lugares::all();
        $estados = EstadosSalidas::all();
        $usuarios = User::all();
        return view('registros-salidas.index-registros-salidas', ['salidas'=> $salidas, 'lugares' => $lugares, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function show($id)
    {
        $salidas = RegistrosSalidas::find($id);
        $lugares = Lugares::all();
        $estados = EstadosSalidas::all();
        $usuarios = User::all();
        return view('registros-salidas.show-registros-salidas', ['salidas'=> $salidas, 'lugares' => $lugares, 'estados' => $estados, 'usuarios' => $usuarios]);
    }

    public function edit($id)
    {
        $salidas = RegistrosSalidas::find($id);
        $lugares = Lugares::all();
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