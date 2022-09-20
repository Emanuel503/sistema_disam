<?php

namespace App\Http\Controllers;

use App\Models\TiposEstablecimientosAlimentos;
use Exception;
use Illuminate\Http\Request;

class TiposEstablecimientosAlimentosController extends Controller
{
    public function index()
    {
        $establecimientos = TiposEstablecimientosAlimentos::all();
        return view('tipos-establecimientos-alimentos.index-tipos-establecimientos-alimentos', ['establecimientos' => $establecimientos]);
    }

    public function show($id)
    {
        $establecimientos = TiposEstablecimientosAlimentos::find($id);
        return view('tipos-establecimientos-alimentos.show-tipos-establecimientos-alimentos', ['establecimientos' => $establecimientos]);
    }

    public function edit($id)
    {
        $establecimientos = TiposEstablecimientosAlimentos::find($id);
        return view('tipos-establecimientos-alimentos.edit-tipos-establecimientos-alimentos', ['establecimientos' => $establecimientos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);

        $establecimientos = new TiposEstablecimientosAlimentos();
        $establecimientos->nombre = $request->nombre;
        $establecimientos->save();

        return redirect()->route('tipos-establecimientos-alimentos.index')->with('success', 'Tipo de establecimiento guardado correctamente.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);

        $establecimientos = TiposEstablecimientosAlimentos::find($id);
        $establecimientos->nombre = $request->nombre;
        $establecimientos->save();

        return redirect()->route('tipos-establecimientos-alimentos.index')->with('success', 'Tipo de establecimiento actualizado correctamente');
    }

    public function destroy($id)
    {
        try {
            TiposEstablecimientosAlimentos::destroy($id);
            return redirect()->route('tipos-establecimientos-alimentos.index')->with('success', 'Tipo de establecimiento eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('tipos-establecimientos-alimentos.index')->withErrors(['No se puede eliminar el tipo de establecimiento, ya contiene registros']);
        }
    }
}