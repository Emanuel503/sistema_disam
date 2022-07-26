<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\RegistrosSalidas;
use App\Models\SolicitudesSalas;

class CalendarioController extends Controller
{
    public function calendar()
    {
        $actividades = Actividades::all();
        $registro_salidas = RegistrosSalidas::all();
        $solicitud_sala = SolicitudesSalas::all();

        $datos = $actividades->concat($registro_salidas)->concat($solicitud_sala);
        
        return response()->json($datos);
    }

    public function actividad($id)
    {
        $actividades = Actividades::find($id);
        return response()->json($actividades);
    }

    public function salida($id)
    {
        $salidas = RegistrosSalidas::find($id);
        return response()->json($salidas);
    }

    public function solicitudSala($id)
    {
        $solicitud = SolicitudesSalas::find($id);
        return response()->json($solicitud);
    }
}