<?php

namespace App\Http\Controllers;

use App\Models\AsignacionEquipos;
use App\Models\Equipos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionEquiposController extends Controller
{
    public function index()
    {
        $asignaciones = DB::select("SELECT ae.id_usuario, ae.id, ae.id_equipo, ae.fecha_asignacion, ae.observacion, ae.estado, 
        u.nombres, u.apellidos, d.nombre, u.cargo  FROM asignacion_equipos ae
        INNER JOIN users u ON u.id = ae.id_usuario
        INNER JOIN dependencias d ON d.id = u.id_dependencia GROUP BY ae.id_usuario");
        $usuarios = User::orderBy('nombres')->get();
        $equipos = DB::select("SELECT * FROM equipos Where id NOT IN (SELECT id_equipo FROM asignacion_equipos)");

        return view('asignaciones-equipos.index-asignaciones', ['asignaciones' => $asignaciones, 'usuarios' => $usuarios, 'equipos' => $equipos]);
    }

    public function show($id)
    {
        $asignaciones = DB::select("SELECT ae.id, e.codigo, de.descripcion, u.nombres, ae.fecha_asignacion, ae.observacion, ae.estado FROM asignacion_equipos ae 
        INNER JOIN users u ON u.id = ae.id_usuario
        INNER JOIN equipos e ON e.id = ae.id_equipo
        INNER JOIN descripcion_equipos de ON de.id = e.id_descripcion
        WHERE u.id = ?", [$id]);

        return view('asignaciones-equipos.show-asignaciones', ['asignaciones' => $asignaciones]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_asignacion' => 'required',
            'observaciones' => 'required',
        ]);

        $asignaciones = new AsignacionEquipos();
        $asignaciones->id_usuario = $request->usuario;
        $asignaciones->id_equipo = $request->equipo;
        $asignaciones->fecha_asignacion = $request->fecha_asignacion;
        $asignaciones->observacion = $request->observaciones;
        $asignaciones->estado = $request->estado;
        $asignaciones->save();

        return redirect()->route('asignaciones-equipos.index')->with('success', 'Asignación realizada correctamente.');
    }

    public function edit($id)
    {
        $asignaciones = AsignacionEquipos::find($id);
        $usuarios = User::orderBy('nombres')->get();
        $equipos = Equipos::all();

        return view('asignaciones-equipos.edit-asignaciones', ['asignaciones' => $asignaciones, 'usuarios' => $usuarios, 'equipos' => $equipos]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'fecha_asignacion' => 'required',
            'observaciones' => 'required',
        ]);

        $asignaciones = AsignacionEquipos::find($id);
        $asignaciones->id_equipo = $request->equipo;
        $asignaciones->fecha_asignacion = $request->fecha_asignacion;
        $asignaciones->observacion = $request->observaciones;
        $asignaciones->estado = $request->estado;
        $asignaciones->save();

        return redirect()->route('asignaciones-equipos.index')->with('success', 'Asignación de equipo actualizada correctamente');
    }

    public function destroy($id)
    {
        AsignacionEquipos::destroy($id);
        return redirect()->route('asignaciones-equipos.index')->with('success', 'Asignación de equipo eliminada correctamente');
    }
}