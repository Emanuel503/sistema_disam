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
        $asignacion_equipos = DB::select("SELECT ame.id, ame.id_equipo, de.descripcion, e.marca, e.serie, e.codigo, ame.destino FROM asignacion_movimiento_equipos ame INNER JOIN equipos e INNER JOIN descripcion_equipos de WHERE ame.id_movimiento = ?", [$id]);
        return view('asignacion-movimientos-equipos.edit-asignacion-movimientos-equipos', ['movimientos' => $movimientos, 'equipos' => $equipos, 'asignacion_equipos' => $asignacion_equipos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_movimiento' => 'required',
            'id_equipo' => 'required',
            'destino' => 'required|min:3'
        ]);

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
            return redirect()->route('movimiento-equipos.index')->with('errorEliminar', 'No se puede eliminar el equipo, ya contiene registros');
        }
    }
}