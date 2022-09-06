<?php

namespace App\Http\Controllers;

use App\Models\Coordinadores;
use App\Models\Dependencias;
use App\Models\EstadosPermisos;
use App\Models\MotivosPermisos;
use App\Models\Permisos;
use App\Models\TiposPermisos;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class PermisosController extends Controller
{
    public function pdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $usuarios = User::all();
        $estados = EstadosPermisos::all();
        $motivos = MotivosPermisos::all();
        $tipos = TiposPermisos::all();
        $dependencias = Dependencias::all();
        $permisos = Permisos::find($id);

        $reporte = DB::select("SELECT u.id, u.nombres, u.apellidos, d.nombre, tp.tipo_permiso, mp.motivo, c.id_tecnico, p.fecha_entrada, p.hora_entrada, p.fecha_salida, 
        p.hora_salida, p.fecha_permiso, p.tiempo_dia, p.tiempo_horas, p.tiempo_minutos, p.created_at, p.updated_at, ep.estado FROM permisos p 
        INNER JOIN users u ON u.id = p.id_usuario
        INNER JOIN tipos_permisos tp ON tp.id = p.id_licencia 
        INNER JOIN motivos_permisos mp ON mp.id = p.id_motivo 
        INNER JOIN coordinadores c ON c.id_tecnico = p.id_usuario_autoriza 
        INNER JOIN dependencias d ON d.id = u.id_dependencia
        INNER JOIN estados_permisos ep ON ep.id = p.id_estado 
        WHERE p.id = ?",  [$id]);

        $cargo = DB::select("SELECT tc.tipo_coordinacion FROM permisos p 
        INNER JOIN users u ON u.id = p.id_usuario_autoriza
        INNER JOIN coordinadores c ON c.id_tecnico = u.id
        INNER JOIN tipos_coordinaciones tc ON tc.id = c.id_coordinacion
        WHERE p.id = ?", [$id]);

        $pdf->loadView('permisos.registro-pdf', ['permisos' => $permisos,  'reporte' => $reporte, 'dependencias' => $dependencias, 'usuarios' => $usuarios, 'estados' => $estados, 'motivos' => $motivos, 'tipos' => $tipos, 'cargo' => $cargo]);
        return $pdf->stream();
    }

    public function reporte()
    {
        $permisos = Permisos::all();
        $usuarios = DB::select("SELECT * FROM users ORDER BY nombres");
        $motivos = DB::select("SELECT * FROM motivos_permisos ORDER BY motivo");
        return view('permisos.reporte', ['permisos' => $permisos, 'usuarios' => $usuarios, 'motivos' => $motivos]);
    }

    public function reportePdf(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        if ($request->usuario == "todos" && $request->motivo == "todos") {
            $permisos = DB::select("SELECT u.id, u.nombres, u.apellidos, d.nombre, tp.tipo_permiso, mp.motivo, c.id_tecnico, p.fecha_entrada, p.hora_entrada, p.fecha_salida, 
            p.hora_salida, p.fecha_permiso, p.tiempo_dia, p.tiempo_horas, p.tiempo_minutos, p.created_at, p.updated_at, ep.estado FROM permisos p 
            INNER JOIN users u ON u.id = p.id_usuario
            INNER JOIN tipos_permisos tp ON tp.id = p.id_licencia 
            INNER JOIN motivos_permisos mp ON mp.id = p.id_motivo 
            INNER JOIN coordinadores c ON c.id_tecnico = p.id_usuario_autoriza 
            INNER JOIN dependencias d ON d.id = u.id_dependencia
            INNER JOIN estados_permisos ep ON ep.id = p.id_estado 
            WHERE p.fecha_entrada BETWEEN ? AND ? AND p.fecha_salida BETWEEN ? AND ? ORDER BY u.nombres", [$request->fecha_inicio, $request->fecha_finalizacion, $request->fecha_inicio, $request->fecha_finalizacion]);

            $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");

            if (sizeof($permisos) > 0) {
                $pdf->loadView('permisos.reporte-todos-pdf', ['permisos' => $permisos, 'coordinadores' => $coordinadores, 'fecha_inicio' => $request->fecha_inicio, 'fecha_finalizacion' => $request->fecha_finalizacion])->setPaper('letter', 'landscape');
                return $pdf->stream();
            } else {
                return redirect()->route('permisos.reporte')->withErrors( 'No hay registros disponibles.')->withInput();
            }
        } elseif ($request->usuario == "todos" && $request->motivo != "todos") {
            $permisos = DB::select("SELECT u.id, u.nombres, u.apellidos, d.nombre, tp.tipo_permiso, mp.motivo, c.id_tecnico, p.fecha_entrada, p.hora_entrada, p.fecha_salida, 
            p.hora_salida, p.fecha_permiso, p.tiempo_dia, p.tiempo_horas, p.tiempo_minutos, p.created_at, p.updated_at, ep.estado FROM permisos p 
            INNER JOIN users u ON u.id = p.id_usuario
            INNER JOIN tipos_permisos tp ON tp.id = p.id_licencia 
            INNER JOIN motivos_permisos mp ON mp.id = p.id_motivo 
            INNER JOIN coordinadores c ON c.id_tecnico = p.id_usuario_autoriza 
            INNER JOIN dependencias d ON d.id = u.id_dependencia
            INNER JOIN estados_permisos ep ON ep.id = p.id_estado 
            WHERE p.fecha_entrada BETWEEN ? AND ? AND p.fecha_salida BETWEEN ? AND ? AND p.id_motivo = ?", [$request->fecha_inicio, $request->fecha_finalizacion, $request->fecha_inicio, $request->fecha_finalizacion, $request->motivo]);

            $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");

            if (sizeof($permisos) > 0) {
                $pdf->loadView('permisos.reporte-todosUsuarios-pdf', ['permisos' => $permisos, 'coordinadores' => $coordinadores, 'fecha_inicio' => $request->fecha_inicio, 'fecha_finalizacion' => $request->fecha_finalizacion])->setPaper('letter', 'landscape');
                return $pdf->stream();
            } else {
                return redirect()->route('permisos.reporte')->withErrors('No hay registros disponibles.')->withInput();
            }
        } elseif ($request->usuario != "todos" && $request->motivo == "todos") {
            $permisos = DB::select("SELECT u.id, u.nombres, u.apellidos, d.nombre, tp.tipo_permiso, mp.motivo, c.id_tecnico, p.fecha_entrada, p.hora_entrada, p.fecha_salida, 
            p.hora_salida, p.fecha_permiso, p.tiempo_dia, p.tiempo_horas, p.tiempo_minutos, p.created_at, p.updated_at, ep.estado FROM permisos p 
            INNER JOIN users u ON u.id = p.id_usuario
            INNER JOIN tipos_permisos tp ON tp.id = p.id_licencia 
            INNER JOIN motivos_permisos mp ON mp.id = p.id_motivo 
            INNER JOIN coordinadores c ON c.id_tecnico = p.id_usuario_autoriza 
            INNER JOIN dependencias d ON d.id = u.id_dependencia
            INNER JOIN estados_permisos ep ON ep.id = p.id_estado 
            WHERE p.fecha_entrada BETWEEN ? AND ? AND p.fecha_salida BETWEEN ? AND ? AND p.id_usuario = ?", [$request->fecha_inicio, $request->fecha_finalizacion, $request->fecha_inicio, $request->fecha_finalizacion, $request->usuario]);

            $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");

            if (sizeof($permisos) > 0) {
                $pdf->loadView('permisos.reporte-todosMotivos-pdf', ['permisos' => $permisos, 'coordinadores' => $coordinadores, 'fecha_inicio' => $request->fecha_inicio, 'fecha_finalizacion' => $request->fecha_finalizacion])->setPaper('letter', 'portrait');
                return $pdf->stream();
            } else {
                return redirect()->route('permisos.reporte')->withErrors('No hay registros disponibles.')->withInput();
            }
        } else {
            $permisos = DB::select("SELECT u.id, u.nombres, u.apellidos, d.nombre, tp.tipo_permiso, mp.motivo, c.id_tecnico, p.fecha_entrada, p.hora_entrada, p.fecha_salida, 
            p.hora_salida, p.fecha_permiso, p.tiempo_dia, p.tiempo_horas, p.tiempo_minutos, p.created_at, p.updated_at, ep.estado FROM permisos p 
            INNER JOIN users u ON u.id = p.id_usuario
            INNER JOIN tipos_permisos tp ON tp.id = p.id_licencia 
            INNER JOIN motivos_permisos mp ON mp.id = p.id_motivo 
            INNER JOIN coordinadores c ON c.id_tecnico = p.id_usuario_autoriza 
            INNER JOIN dependencias d ON d.id = u.id_dependencia
            INNER JOIN estados_permisos ep ON ep.id = p.id_estado 
            WHERE p.id_usuario = ?  AND (p.fecha_entrada BETWEEN ? AND ? AND p.fecha_salida BETWEEN ? AND ?) AND p.id_motivo = ?", [$request->usuario, $request->fecha_inicio, $request->fecha_finalizacion, $request->fecha_inicio, $request->fecha_finalizacion, $request->motivo]);

            $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");

            if (sizeof($permisos) > 0) {
                $pdf->loadView('permisos.reporte-pdf', ['permisos' => $permisos, 'coordinadores' => $coordinadores, 'fecha_inicio' => $request->fecha_inicio, 'fecha_finalizacion' => $request->fecha_finalizacion])->setPaper('letter', 'portrait');
                return $pdf->stream();
            } else {
                return redirect()->route('permisos.reporte')->withErrors('No hay registros disponibles.')->withInput();
            }
        }
    }

    public function index()
    {
        $permisos = Permisos::all();
        $usuarios = User::orderBy('nombres')->get();
        $coordinadores = Coordinadores::all();
        $estados = EstadosPermisos::all();
        $motivos = MotivosPermisos::orderBy('motivo')->get();
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
        $usuarios = User::orderBy('nombres')->get();
        $coordinadores = DB::select("SELECT u.nombres, u.apellidos, c.id, c.id_tecnico FROM coordinadores c INNER JOIN users u ON u.id = c.id_tecnico");
        $estados = EstadosPermisos::all();
        $motivos = MotivosPermisos::orderBy('motivo')->get();
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

        //VALIDACIONES

        $dias_totales = $permiso->tiempo_dia + ($permiso->tiempo_horas / 24) + ($permiso->tiempo_minutos / 1440);
        $usuario = User::find($permiso->id_usuario);

        //Si el permiso es tipo compensatorio (5) o oficial (6) no se valida

        //Por enfermedad de partiente MAX 11 dias
        if($permiso->id_motivo == 3){
            if($dias_totales > 11){
                return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Enfermedad gravísima de pariente" es de 11 dias')->withInput();
            }
        }

        //Por duelo MAX 11 dias
        if($permiso->id_motivo == 4){
            if($dias_totales > 9){
                return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Duelo" es de 9 dias')->withInput();
            }
        }

        //Por permisos Personales MAX 5 dias por año
        if($permiso->id_motivo == 1){
            
            if($dias_totales > 5){
                return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Personales" es de 5 dias por año')->withInput();
            }

            if($usuario->dias_personales < $dias_totales){
                return redirect()->route('permisos.index')->
                withErrors('Ya no posee esa cantidad de dias para permisos de tipo "Personales". Tiene disponibles '. $usuario->dias_personales. ' dias')->withInput();
            }

            $usuario->dias_personales = $usuario->dias_personales - $dias_totales;
            $usuario->save();
        }

        //Por Enfermedad
        if($permiso->id_motivo == 2){


            date_default_timezone_set('America/El_Salvador');    
            $fecha_actual = date('Y-m-d', time());  
    
            $fecha_ingreso = new DateTime($usuario->fecha_ingreso);
            $fecha_actual = new DateTime($fecha_actual);
            $tiempo_trabajando = $fecha_ingreso->diff($fecha_actual);


                //Si el usuario tiene menos de 6 años trabajando (Informales)
            if($tiempo_trabajando->format("%y") < 6){

                if($dias_totales > 5){
                    return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Enfermedad - informales" es de 5 dias')->withInput();
                }

                if($usuario->dias_enfermedad_informales < $dias_totales){
                    return redirect()->route('permisos.index')->
                    withErrors('Ya no posee esa cantidad de dias para permisos de tipo "Enfermedad - informales". Tiene disponibles '. $usuario->dias_enfermedad_informales. ' dias')->withInput();
                }

                $usuario->dias_enfermedad_informales = $usuario->dias_enfermedad_informales - $dias_totales;
                $usuario->save();

            }else{
                //Si el usuario tiene mas de 6 años trabajando (Formales)
                
                if($dias_totales > 90){
                    return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Enfermedad - formales" es de 90 dias')->withInput();
                }

                if($usuario->dias_enfermedad_formales < $dias_totales){
                    return redirect()->route('permisos.index')->
                    withErrors('Ya no posee esa cantidad de dias para permisos de tipo "Enfermedad - formales". Tiene disponibles '. $usuario->dias_enfermedad_formales. ' dias')->withInput();
                }

                $usuario->dias_enfermedad_formales = $usuario->dias_enfermedad_formales - $dias_totales;
                $usuario->save();
            }
        }

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
        $usuario = User::find($permiso->id_usuario);
        $dias_totales_permiso = $request->tiempo_dia + ($request->tiempo_horas / 24) + ($request->tiempo_minutos / 1440);
        $dias_totales_antiguos = $permiso->tiempo_dia + ($permiso->tiempo_horas / 24) + ($permiso->tiempo_minutos / 1440);

        //Por enfermedad de pariente MAX 11 dias
        if($permiso->id_motivo == 3){
            if($dias_totales_permiso > 11){
                return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Enfermedad gravísima de pariente" es de 11 dias')->withInput();
            }
        }

        //Por duelo MAX 11 dias
        if($permiso->id_motivo == 4){
            if($dias_totales_permiso > 9){
                return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Duelo" es de 9 dias')->withInput();
            }
        }

        //Por permisos Personales MAX 5 dias por año
        if($permiso->id_motivo == 1){
            
            if($dias_totales_permiso > 5){
                return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Personales" es de 5 dias por año')->withInput();
            }

            $usuario->dias_personales = $usuario->dias_personales + $dias_totales_antiguos;

            if($usuario->dias_personales < $dias_totales_permiso){
                return redirect()->route('permisos.index')->
                withErrors('Ya no posee esa cantidad de dias para permisos de tipo "Personales". Tiene disponibles '. $usuario->dias_personales. ' dias')->withInput();
            }

            $usuario->dias_personales = $usuario->dias_personales - $dias_totales_permiso;
            $usuario->save();
        }

        //Por Enfermedad
        if($permiso->id_motivo == 2){

            date_default_timezone_set('America/El_Salvador');    
            $fecha_actual = date('Y-m-d', time());  
            $fecha_ingreso = new DateTime($usuario->fecha_ingreso);
            $fecha_actual = new DateTime($fecha_actual);
            $tiempo_trabajando = $fecha_ingreso->diff($fecha_actual);

            //Si el usuario tiene menos de 6 años trabajando (Informales)
            if($tiempo_trabajando->format("%y") < 6){

                if($dias_totales_permiso > 5){
                    return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Enfermedad - informales" es de 5 dias')->withInput();
                }

                $usuario->dias_enfermedad_informales = $usuario->dias_enfermedad_informales + $dias_totales_antiguos;

                if($usuario->dias_enfermedad_informales < $dias_totales_permiso){
                    return redirect()->route('permisos.index')->
                    withErrors('Ya no posee esa cantidad de dias para permisos de tipo "Enfermedad - informales". Tiene disponibles '. $usuario->dias_enfermedad_informales. ' dias')->withInput();
                }

                $usuario->dias_enfermedad_informales = $usuario->dias_enfermedad_informales - $dias_totales_permiso;
                $usuario->save();

            }else{

                //Si el usuario tiene mas de 6 años trabajando (Formales)
                if($dias_totales_permiso > 90){
                    return redirect()->route('permisos.index')->withErrors('El maximo de dias de permiso de tipo "Enfermedad - formales" es de 90 dias')->withInput();
                }

                $usuario->dias_enfermedad_formales = $usuario->dias_enfermedad_formales + $dias_totales_antiguos;

                if($usuario->dias_enfermedad_formales < $dias_totales_permiso){
                    return redirect()->route('permisos.index')->
                    withErrors('Ya no posee esa cantidad de dias para permisos de tipo "Enfermedad - formales". Tiene disponibles '. $usuario->dias_enfermedad_formales. ' dias')->withInput();
                }

                $usuario->dias_enfermedad_formales = $usuario->dias_enfermedad_formales - $dias_totales_permiso;
                $usuario->save();
            }
        }

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
        $permiso = Permisos::find($id);
        $usuario = User::find($permiso->id_usuario);

        $dias_totales = $permiso->tiempo_dia + ($permiso->tiempo_horas / 24) + ($permiso->tiempo_minutos / 1440);

        if($permiso->id_motivo == 1){
            $usuario->dias_personales = $usuario->dias_personales + $dias_totales;
            $usuario->save();
        }

        if($permiso->id_motivo == 2){

            $fecha_registro = date_format($permiso->created_at, 'Y-m-d');
            $fecha_ingreso = new DateTime($usuario->fecha_ingreso);
            $fecha_registro = new DateTime($fecha_registro);
            $tiempo_trabajando = $fecha_ingreso->diff($fecha_registro);

            if($tiempo_trabajando->format("%y") < 6){
                $usuario->dias_enfermedad_informales = $usuario->dias_enfermedad_informales + $dias_totales;
                $usuario->save();
            }else{
                $usuario->dias_enfermedad_formales = $usuario->dias_enfermedad_formales + $dias_totales;
                $usuario->save();
            }
        }

        Permisos::destroy($id);
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado correctamente');
    }
}