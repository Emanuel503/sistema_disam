<?php

namespace App\Http\Controllers;

use App\Models\Dependencias;
use App\Models\DescripcionEquipos;
use App\Models\Equipos;
use App\Models\EstadosEquipos;
use App\Models\FuenteEquipos;
use App\Models\UbicacionEquipos;
use Exception;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function index()
    {
        $equipos = Equipos::all();
        $ubicaciones = UbicacionEquipos::all();
        $fuentes = FuenteEquipos::all();
        $unidades = Dependencias::all();
        $estados = EstadosEquipos::all();
        $descripciones = DescripcionEquipos::all();
        $imageData = Equipos::all();

        return view('equipos.index-equipos', ['equipos' => $equipos, 'ubicaciones' => $ubicaciones, 'fuentes' => $fuentes, 'unidades' => $unidades, 'estados' => $estados, 'descripciones' => $descripciones, compact('imageData')]);
    }

    public function edit($id)
    {
        $equipos = Equipos::find($id);
        return view('equipos.edit-equipos', ['equipos' => $equipos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'serie' => 'required',
            'color' => 'required',
            'fecha_adquisicion' => 'required',
            'valor_adquisicion' => 'required',
            'valor_actual' => 'required'
        ]);

        $equipos = new Equipos();
        $equipos->id_descripcion =  $request->descripcion;
        $equipos->id_unidad =  $request->unidad;
        $equipos->id_ubicacion =  $request->ubicacion;
        $equipos->id_estado =  $request->estado;
        $equipos->id_fuente =  $request->fuente;

        $equipos->codigo =  $request->codigo;
        $equipos->marca = $request->marca;
        $equipos->modelo = $request->modelo;
        $equipos->serie = $request->serie;
        $equipos->color =  $request->color;
        $equipos->fecha_adquisicion = $request->fecha_adquisicion;
        $equipos->valor_adquisicion = $request->valor_adquisicion;
        $equipos->valor_actual = $request->valor_actual;
        $equipos->observacion = $request->observacion;

        //Insertar imagen
        $file = $request->file('image');
        $filename = date('YmdHi') . '-' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $equipos->imagen = $filename;

        $equipos->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo guardado correctamente.');
    }

    public function destroy($id)
    {
        try {
            Equipos::destroy($id);
            return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('equipos.index')->with('errorEliminar', 'No se puede eliminar el equipo, ya contiene registros');
        }
    }
}
