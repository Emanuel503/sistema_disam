<?php

namespace App\Http\Controllers;

use App\Models\AyudaVideos;
use Exception;
use Illuminate\Http\Request;

class AyudaVideosController extends Controller
{
    public function index()
    {
        $videos = AyudaVideos::all();
        return view('ayuda.videos.index-videos', ['videos' => $videos]);
    }

    public function show($id)
    {
        $videos = AyudaVideos::find($id);
        return view('ayuda.videos.show-videos', ['videos' => $videos]);
    }

    public function edit($id)
    {
        $videos = AyudaVideos::find($id);
        return view('ayuda.videos.edit-videos', ['videos' => $videos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'descripcion' => 'required|min:3',
            'video' => 'required',
        ]);

        $videos = new AyudaVideos();
        $videos->titulo = $request->titulo;
        $videos->descripcion = $request->descripcion;

        //Video
        $file = $request->file('video');

        if($file->extension() != "mp4"){
            return redirect()->route('videos.index')->withErrors('Formato de archivo no valido.')->withInput();
        }

        $filename = date('YmdHi') . '-video-' . $file->getClientOriginalName();
        $file->move(public_path('ayuda'), $filename);
        $videos->video = $filename;

        $videos->save();

        return redirect()->route('videos.index')->with('success', 'Video guardado correctamente.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'descripcion' => 'required|min:3',
        ]);

        $videos = AyudaVideos::find($id);
        $videos->titulo = $request->titulo;
        $videos->descripcion = $request->descripcion;

        //Video
        if(isset($file)){
            
            $file = $request->file('video');

            if($file->extension() != "mp4"){
                return redirect()->route('videos.index')->withErrors('Formato de archivo no valido.')->withInput();
            }

            $filename = date('YmdHi') . '-video-' . $file->getClientOriginalName();
            $file->move(public_path('ayuda'), $filename);
            unlink(public_path('ayuda') ."\\". $videos->video);
            $videos->video = $filename;
        }

        $videos->save();
        
        return redirect()->route('videos.index')->with('success', 'Video actualizado correctamente');
    }

    public function destroy($id)
    {
        try {
            $videos = AyudaVideos::find($id);
            unlink(public_path('ayuda') ."\\". $videos->video);
            AyudaVideos::destroy($id);
            return redirect()->route('videos.index')->with('success', 'Video eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->withErrors(['No se puede eliminar el video, ya contiene registros']);
        }
    }
}