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

        return view('equipos.index-equipos', ['equipos' => $equipos, 'ubicaciones' => $ubicaciones, 'fuentes' => $fuentes, 'unidades' => $unidades, 'estados' => $estados, 'descripciones' => $descripciones]);
    }

    public function show($id)
    {
        $equipos = Equipos::find($id);
        return view('equipos.show-equipos', ['equipos' => $equipos]);
    }

    public function edit($id)
    {
        $equipos = Equipos::find($id);
        $ubicaciones = UbicacionEquipos::all();
        $fuentes = FuenteEquipos::all();
        $unidades = Dependencias::all();
        $estados = EstadosEquipos::all();
        $descripciones = DescripcionEquipos::all();
        return view('equipos.edit-equipos', ['equipos' => $equipos, 'ubicaciones' => $ubicaciones, 'fuentes' => $fuentes, 'unidades' => $unidades, 'estados' => $estados, 'descripciones' => $descripciones]);
    }

    public function isImage($file){
        $extension = $file->extension();
        if($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "webp"){
            return true;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'unidad' => 'required',
            'ubicacion' => 'required',
            'estado' => 'required',
            'fuente' => 'required',
            'codigo' => 'required|min:1|unique:equipos,codigo',
            'marca' => 'required|min:2',
            'modelo' => 'required|min:2',
            'serie' => 'required|min:2',
            'color' => 'required|min:2',
            'fecha_adquisicion' => 'required|date',
            'valor_adquisicion' => 'required||min:0',
            'valor_actual' => 'required|min:0',
            'observacion' => 'required|min:2'
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
        
        if(isset($file)){

            $guardar = $this->isImage($file);

            if($guardar == false){
                return redirect()->route('equipos.index')->withErrors('Formato de imagen no valido.')->withInput();
            }

            $filename = date('YmdHi') . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $equipos->imagen = $filename;
        }

        $equipos->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo guardado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
            'unidad' => 'required',
            'ubicacion' => 'required',
            'estado' => 'required',
            'fuente' => 'required',
            'codigo' => 'required|min:1|unique:equipos,codigo, ' . $id,
            'marca' => 'required|min:2',
            'modelo' => 'required|min:2',
            'serie' => 'required|min:2',
            'color' => 'required|min:2',
            'fecha_adquisicion' => 'required|date',
            'valor_adquisicion' => 'required||min:0',
            'valor_actual' => 'required|min:0',
            'observacion' => 'required|min:2'
        ]);

        $equipos = Equipos::find($id);
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
        $file = $request->file('image');
        
        if(isset($file)){
            
            $guardar = $this->isImage($file);

            if($guardar == false){
                return redirect()->route('equipos.edit', ['equipo' => $id])->withErrors('Formato de imagen no valido.')->withInput();
            }

            if($equipos->imagen != null){
                unlink(public_path('images') ."\\". $equipos->imagen);
            }

            $filename = date('YmdHis') . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $equipos->imagen = $filename;
        }

        $equipos->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo modificado correctamente.');
    }

    public function destroy($id)
    {
        try {
            $equipo = Equipos::find($id);
            Equipos::destroy($id);
            if($equipo->imagen != null){
                unlink(public_path('images') ."\\". $equipo->imagen);
            }
            return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('equipos.index')->withErrors('No se puede eliminar el equipo, ya contiene registros');
        }
    }
}