<?php

namespace App\Http\Controllers;

use App\Models\DescripcionEquipos;
use Exception;
use Illuminate\Http\Request;

class DescripcionEquiposController extends Controller
{
    public function index()
    {
        $descripciones = DescripcionEquipos::all();

        return view('descripcion-equipo.index-descripcion', ['descripciones' => $descripciones]);
    }

    public function show($id)
    {
        $descripciones = DescripcionEquipos::find($id);
        return view('descripcion-equipo.show-descripcion', ['descripciones' => $descripciones]);
    }

    public function edit($id)
    {
        $descripciones = DescripcionEquipos::find($id);
        return view('descripcion-equipo.edit-descripcion', ['descripciones' => $descripciones]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|min:3',
        ]);

        $descripciones = new DescripcionEquipos;
        $descripciones->descripcion = $request->descripcion;
        $descripciones->save();

        return redirect()->route('descripcion-equipo.index')->with('success', 'Descripción guardada correctamente');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'descripcion' => 'required|min:3',
        ]);

        $descripciones = DescripcionEquipos::find($id);
        $descripciones->descripcion = $request->descripcion;
        $descripciones->save();

        return redirect()->route('descripcion-equipo.index')->with('success', 'Descripción actualizada correctamente');
    }

    public function destroy($id)
    {
        try {
            DescripcionEquipos::destroy($id);
            return redirect()->route('descripcion-equipo.index')->with('success', 'Descripción eliminada correctamente');
        } catch (Exception $e) {
            return redirect()->route('descripcion-equipo.index')->with('success', 'No se puede eliminar la descripción, ya contiene registros');
        }
    }
}
