<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMovimientoEquipo;
use App\Models\Equipos;
use Illuminate\Http\Request;
use App\Models\MovimientoEquipos;
use Illuminate\Support\Facades\DB;
use Exception;

class AsignacionMovimientoEquipoController extends Controller
{
    public function edit($id)
    {
        $movimientos = MovimientoEquipos::find($id);
        $equipos = Equipos::all();
        $asignacion_equipos = DB::select("SELECT ame.id, ame.id_equipo, de.descripcion, e.marca, e.serie, e.codigo, ame.destino FROM asignacion_movimiento_equipos ame INNER JOIN equipos e ON e.id = ame.id_equipo INNER JOIN descripcion_equipos de ON de.id = e.id_descripcion WHERE ame.id_movimiento = ?", [$id]);
        return view('asignacion-movimientos-equipos.edit-asignacion-movimientos-equipos', ['movimientos' => $movimientos, 'equipos' => $equipos, 'asignacion_equipos' => $asignacion_equipos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_movimiento' => 'required',
            'id_equipo' => 'required',
            'destino' => 'required|min:3'
        ]);

        $obtenerMovimiento = DB::select(
            "SELECT me.fecha_inicio, me.fecha_fin FROM movimiento_equipos me
            WHERE me.id = ?",
            [$request->id_movimiento,]
        );

        foreach ($obtenerMovimiento as $ob) {
            $fecha_inicio = $ob->fecha_inicio;
            $fecha_fin = $ob->fecha_fin;
        }

        $validacionDisponibilidad = DB::select(
            "SELECT ame.*, me.*, e.* FROM asignacion_movimiento_equipos ame
            INNER JOIN movimiento_equipos me ON ame.id_movimiento = me.id
            INNER JOIN equipos e ON ame.id_equipo = e.id
            WHERE ame.id_equipo = ? AND (? BETWEEN me.fecha_inicio AND me.fecha_fin) 
            AND (? BETWEEN me.fecha_inicio AND me.fecha_fin);",
            [$request->id_equipo, $fecha_inicio, $fecha_fin]
        );

        if (sizeof($validacionDisponibilidad) > 0) {
            return redirect()->route('asignacion-movimiento-equipo.edit', ['asignacion_movimiento_equipo' => $request->id_movimiento])->withErrors('Ya existe un equipo asignado para un movimiento en esa fecha.');
        }

        $asignacion_equipos = new AsignacionMovimientoEquipo();
        $asignacion_equipos->id_movimiento = $request->id_movimiento;
        $asignacion_equipos->id_equipo = $request->id_equipo;
        $asignacion_equipos->destino = $request->destino;
        $asignacion_equipos->save();

        return redirect()->route('asignacion-movimiento-equipo.edit', ['asignacion_movimiento_equipo' => $request->id_movimiento])->with('success', 'Equipo asignado correctamente');
    }

    public function destroy($id, $registro)
    {
        try {
            AsignacionMovimientoEquipo::destroy($id);
            return redirect()->route('asignacion-movimiento-equipo.edit', ['asignacion_movimiento_equipo' => $registro])->with('success', 'Equipo asignado eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('movimiento-equipos.index')->withErrors('No se puede eliminar el equipo, ya contiene registros');
        }
    }
}