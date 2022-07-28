<?php

namespace App\Http\Controllers;

use App\Models\Coordinadores;
use App\Models\EstadosPermisos;
use App\Models\MotivosPermisos;
use App\Models\Permisos;
use App\Models\TiposPermisos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class PermisosController extends Controller
{
    public function reporte()
    {
        $permisos = Permisos::all();
        $usuarios = User::all();
        return view('permisos.reporte', ['permisos' => $permisos, 'usuarios' => $usuarios]);
    }

    public function reportePdf(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $permisos = DB::select("SELECT u.id, u.nombres, u.apellidos, d.nombre, tp.tipo_permiso, mp.motivo, c.id_tecnico, p.fecha_entrada, p.hora_entrada, p.fecha_salida, 
        p.hora_salida, p.fecha_permiso, p.tiempo_dia, p.tiempo_horas, p.tiempo_minutos, p.created_at, p.updated_at, ep.estado FROM permisos p 
        INNER JOIN users u ON u.id = p.id_usuario
        INNER JOIN tipos_permisos tp ON tp.id = p.id_licencia 
        INNER JOIN motivos_permisos mp ON mp.id = p.id_motivo 
        INNER JOIN coordinadores c ON c.id_tecnico = p.id_usuario_autoriza 
        INNER JOIN dependencias d ON d.id = u.id_dependencia
        INNER JOIN estados_permisos ep ON ep.id = p.id_estado 
        WHERE p.id_usuario = ?  AND (p.fecha_entrada BETWEEN ? AND ? AND p.fecha_salida BETWEEN ? AND ?)", [$request->usuario, $request->fecha_inicio, $request->fecha_finalizacion, $request->fecha_inicio, $request->fecha_finalizacion]);

        $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");

        if (sizeof($permisos) > 0) {
            $pdf->loadView('permisos.reporte-pdf', ['permisos' => $permisos, 'coordinadores' => $coordinadores, 'fecha_inicio' => $request->fecha_inicio, 'fecha_finalizacion' => $request->fecha_finalizacion])->setPaper('letter', 'portrait');
            return $pdf->stream();
        } else {
            return redirect()->route('reporte.reporte')->with('errorDatos', 'No hay registros disponibles.')->withInput();
        }
    }

    public function index()
    {
        $permisos = Permisos::all();
        $usuarios = User::all();
        $coordinadores = Coordinadores::all();
        $estados = EstadosPermisos::all();
        $motivos = MotivosPermisos::all();
        $tipos = TiposPermisos::all();

        return view('permisos.index-permisos', ['permisos' => $permisos, 'usuarios' => $usuarios, 'estados' => $estados, 'motivos' => $motivos, 'tipos' => $tipos, 'coordinadores' => $coordinadores]);
    }

    public function show($id)
    {
        $permisos = Permisos::find($id);
        return view('permisos.show-permiso', ['permisos' => $permisos]);
    }

    public function edit($id)
    {
        $permisos = Permisos::find($id);
        $usuarios = User::all();
        $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");
        $estados = EstadosPermisos::all();
        $motivos = MotivosPermisos::all();
        $tipos = TiposPermisos::all();

        return view('permisos.edit-permiso', ['permisos' => $permisos, 'usuarios' => $usuarios, 'coordinadores' => $coordinadores, 'estados' => $estados, 'motivos' => $motivos, 'tipos' => $tipos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'licencia' => 'required',
            'motivo' => 'required',
            'usuario_autoriza' => 'required',
            'fecha_entrada' => 'required',
            'hora_entrada' => 'required',
            'fecha_salida' => 'required',
            'hora_salida' => 'required',
            'fecha_permiso' => 'required',
            'tiempo_dia' => 'required',
            'tiempo_horas' => 'required',
            'tiempo_minutos' => 'required'
        ]);

        $permiso = new Permisos();
        $permiso->id_usuario = $request->usuario;
        $permiso->id_licencia = $request->licencia;
        $permiso->id_motivo = $request->motivo;
        $permiso->id_usuario_autoriza = $request->usuario_autoriza;
        $permiso->id_estado = 3;
        $permiso->id_usuario_adiciono = Auth::user()->id;
        $permiso->fecha_entrada = $request->fecha_entrada;
        $permiso->hora_entrada = $request->hora_entrada;
        $permiso->fecha_salida = $request->fecha_salida;
        $permiso->hora_salida = $request->hora_salida;
        $permiso->fecha_permiso = $request->fecha_permiso;
        $permiso->tiempo_dia = $request->tiempo_dia;
        $permiso->tiempo_horas = $request->tiempo_horas;
        $permiso->tiempo_minutos = $request->tiempo_minutos;

        $permiso->save();

        return redirect()->route('permisos.index')->with('success', 'Permiso guardado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario' => 'required',
            'licencia' => 'required',
            'motivo' => 'required',
            'usuario_autoriza' => 'required',
            'fecha_entrada' => 'required',
            'hora_entrada' => 'required',
            'fecha_salida' => 'required',
            'hora_salida' => 'required',
            'fecha_permiso' => 'required',
            'tiempo_dia' => 'required',
            'tiempo_horas' => 'required',
            'tiempo_minutos' => 'required'
        ]);

        $permiso = Permisos::find($id);
        $permiso->id_usuario = $request->usuario;
        $permiso->id_licencia = $request->licencia;
        $permiso->id_motivo = $request->motivo;
        $permiso->id_usuario_autoriza = $request->usuario_autoriza;
        $permiso->id_estado = $request->estado;
        $permiso->fecha_entrada = $request->fecha_entrada;
        $permiso->hora_entrada = $request->hora_entrada;
        $permiso->fecha_salida = $request->fecha_salida;
        $permiso->hora_salida = $request->hora_salida;
        $permiso->fecha_permiso = $request->fecha_permiso;
        $permiso->tiempo_dia = $request->tiempo_dia;
        $permiso->tiempo_horas = $request->tiempo_horas;
        $permiso->tiempo_minutos = $request->tiempo_minutos;
        $permiso->save();

        return redirect()->route('permisos.index')->with('success', 'Permiso modificado correctamente');
    }

    public function destroy($id)
    {
        Permisos::destroy($id);
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminada correctamente');
    }
}
