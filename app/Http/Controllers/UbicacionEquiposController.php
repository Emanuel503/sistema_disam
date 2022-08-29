<?php

namespace App\Http\Controllers;

use App\Models\UbicacionEquipos;
use Exception;
use Illuminate\Http\Request;

class UbicacionEquiposController extends Controller
{
    public function index()
    {
        $ubicaciones = UbicacionEquipos::all();
        return view('ubicacion-equipo.index-ubicacion', ['ubicaciones' => $ubicaciones]);
    }

    public function show($id)
    {
        $ubicaciones = UbicacionEquipos::find($id);
        return view('ubicacion-equipo.show-ubicacion', ['ubicaciones' => $ubicaciones]);
    }

    public function edit($id)
    {
        $ubicaciones = UbicacionEquipos::find($id);
        return view('ubicacion-equipo.edit-ubicacion', ['ubicaciones' => $ubicaciones]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ubicacion' => 'required|min:3',
        ]);

        $ubicaciones = new UbicacionEquipos;
        $ubicaciones->ubicacion = $request->ubicacion;
        $ubicaciones->save();

        return redirect()->route('ubicacion-equipo.index')->with('success', 'Ubicación guardada correctamente');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'ubicacion' => 'required|min:3',
        ]);

        $ubicaciones = UbicacionEquipos::find($id);
        $ubicaciones->ubicacion = $request->ubicacion;
        $ubicaciones->save();

        return redirect()->route('ubicacion-equipo.index')->with('success', 'Ubicación actualizada correctamente');
    }

    public function destroy($id)
    {
        try {
            UbicacionEquipos::destroy($id);
            return redirect()->route('ubicacion-equipo.index')->with('success', 'Ubicación eliminada correctamente');
        } catch (Exception $e) {
            return redirect()->route('ubicacion-equipo.index')->withErrors('No se puede eliminar la ubicación, ya contiene registros');
        }
    }
}