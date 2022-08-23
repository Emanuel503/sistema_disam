<?php

namespace App\Http\Controllers;

use App\Models\FuenteEquipos;
use Exception;
use Illuminate\Http\Request;

class FuenteEquiposController extends Controller
{
    public function index()
    {
        $fuentes = FuenteEquipos::all();

        return view('fuente-equipo.index-fuente', ['fuentes' => $fuentes]);
    }

    public function show($id)
    {
        $fuentes = FuenteEquipos::find($id);
        return view('fuente-equipo.show-fuente', ['fuentes' => $fuentes]);
    }

    public function edit($id)
    {
        $fuentes = FuenteEquipos::find($id);
        return view('fuente-equipo.edit-fuente', ['fuentes' => $fuentes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fuente' => 'required|min:3',
        ]);

        $fuentes = new FuenteEquipos;
        $fuentes->fuente = $request->fuente;
        $fuentes->save();

        return redirect()->route('fuente-equipo.index')->with('success', 'Fuente del equipo guardada correctamente');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'fuente' => 'required|min:3',
        ]);

        $fuentes = FuenteEquipos::find($id);
        $fuentes->fuente = $request->fuente;
        $fuentes->save();

        return redirect()->route('fuente-equipo.index')->with('success', 'Fuente del equipo actualizada correctamente');
    }

    public function destroy($id)
    {
        try {
            FuenteEquipos::destroy($id);
            return redirect()->route('fuente-equipo.index')->with('success', 'Fuente del equipo eliminada correctamente');
        } catch (Exception $e) {
            return redirect()->route('fuente-equipo.index')->with('success', 'No se puede eliminar la fuente del equipo, ya contiene registros');
        }
    }
}
