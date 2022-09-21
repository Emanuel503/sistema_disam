<?php

namespace App\Http\Controllers;

use App\Models\AyudaManuales;
use Exception;
use Illuminate\Http\Request;

class AyudaManualesController extends Controller
{
    public function index()
    {
        $manuales = AyudaManuales::all();
        return view('ayuda.manuales.index-manuales', ['manuales' => $manuales]);
    }

    public function show($id)
    {
        $manuales = AyudaManuales::find($id);
        return view('ayuda.manuales.show-manuales', ['manuales' => $manuales]);
    }

    public function edit($id)
    {
        $manuales = AyudaManuales::find($id);
        return view('ayuda.manuales.edit-manuales', ['manuales' => $manuales]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'manual' => 'required',
        ]);

        $manuales = new AyudaManuales();
        $manuales->titulo = $request->titulo;
        $manuales->descripcion = $request->descripcion;

        //Video
        $file = $request->file('manual');

        if($file->extension() != "pdf"){
            return redirect()->route('manuales.index')->withErrors('Formato de archivo no valido.')->withInput();
        }

        $filename = date('YmdHi') . '-manual-' . $file->getClientOriginalName();
        $file->move(public_path('ayuda'), $filename);
        $manuales->manual = $filename;

        $manuales->save();

        return redirect()->route('manuales.index')->with('success', 'Manual guardado correctamente.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'descripcion' => 'required|min:3',
        ]);

        $manuales = AyudaManuales::find($id);
        $manuales->titulo = $request->titulo;
        $manuales->descripcion = $request->descripcion;

        $file = $request->file('manual');

        //Video
        if(isset($file)){
            
            if($file->extension() != "pdf"){
                return redirect()->route('manuales.index')->withErrors('Formato de archivo no valido.')->withInput();
            }

            $filename = date('YmdHi') . '-manual-' . $file->getClientOriginalName();
            $file->move(public_path('ayuda'), $filename);
            unlink(public_path('ayuda') ."\\". $manuales->manual);
            $manuales->manual = $filename;
        }

        $manuales->save();
        
        return redirect()->route('manuales.index')->with('success', 'Manual actualizado correctamente');
    }

    public function destroy($id)
    {
        try {
            $manuales = AyudaManuales::find($id);
            unlink(public_path('ayuda') ."\\". $manuales->manual);
            AyudaManuales::destroy($id);
            return redirect()->route('manuales.index')->with('success', 'Manual eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('manuales.index')->withErrors(['No se puede eliminar el manual, ya contiene registros']);
        }
    }
}