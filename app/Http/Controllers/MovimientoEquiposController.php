<?php

namespace App\Http\Controllers;

use App\Models\MotivosMovimientosEquipos;
use App\Models\MovimientoEquipos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class MovimientoEquiposController extends Controller
{
    public function index()
    {
        $movimientos = MovimientoEquipos::all();
        $usuarios = User::orderBy('nombres')->get();
        $motivos = MotivosMovimientosEquipos::orderBy('motivo')->get();
        return view('movimientos-equipos.index-movimientos-equipos', ['movimientos' => $movimientos, 'usuarios' => $usuarios, 'motivos' => $motivos]);
    }

    public function show($id)
    {
        $movimientos = MovimientoEquipos::find($id);
        $asignacion_equipos = DB::select("SELECT ame.id_equipo, de.descripcion, e.marca, e.serie, e.codigo, ame.destino FROM asignacion_movimiento_equipos ame INNER JOIN equipos e INNER JOIN descripcion_equipos de WHERE ame.id_movimiento = ?", [$id]);
        return view('movimientos-equipos.show-movimientos-equipos', ['movimientos' => $movimientos, 'asignacion_equipos' => $asignacion_equipos]);
    }

    public function edit($id)
    {
        $movimientos = MovimientoEquipos::find($id);
        $usuarios = User::orderBy('nombres')->get();
        $motivos = MotivosMovimientosEquipos::orderBy('motivo')->get();
        return view('movimientos-equipos.edit-movimientos-equipos', ['movimientos' => $movimientos, 'usuarios' => $usuarios, 'motivos' => $motivos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required',
            'id_motivo' => 'required',
            'fecha_orden' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'hora_salida' => 'required',
        ]);

        $movimientos = new MovimientoEquipos();
        $movimientos->id_usuario = $request->id_usuario;
        $movimientos->id_motivo = $request->id_motivo;
        $movimientos->fecha_orden = $request->fecha_orden;
        $movimientos->fecha_inicio = $request->fecha_inicio;
        $movimientos->fecha_fin = $request->fecha_fin;
        $movimientos->hora_salida = $request->hora_salida;
        $movimientos->estado = "No";
        $movimientos->save();

        return redirect()->route('movimiento-equipos.index')->with('success', 'Registro de salida guardado correctamente');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_usuario' => 'required',
            'id_motivo' => 'required',
            'fecha_orden' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'hora_salida' => 'required',
            'estado' => 'required',
        ]);

        $movimientos = MovimientoEquipos::find($id);
        $movimientos->id_usuario = $request->id_usuario;
        $movimientos->id_motivo = $request->id_motivo;
        $movimientos->fecha_orden = $request->fecha_orden;
        $movimientos->fecha_inicio = $request->fecha_inicio;
        $movimientos->fecha_fin = $request->fecha_fin;
        $movimientos->hora_salida = $request->hora_salida;
        $movimientos->estado = $request->estado;
        $movimientos->save();

        return redirect()->route('movimiento-equipos.index')->with('success', 'Registro de salida modificado correctamente');
    }

    public function destroy($id)
    {
        try {
            MovimientoEquipos::destroy($id);
            return redirect()->route('movimiento-equipos.index')->with('success', 'Registro de salida eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('movimiento-equipos.index')->withErrors('No se puede eliminar el registro de salida de equipos, ya contiene registros');
        }
    }
}