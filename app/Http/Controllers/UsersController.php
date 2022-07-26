<?php

namespace App\Http\Controllers;

use App\Models\Dependencias;
use App\Models\EstadosUsuarios;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\App;

class UsersController extends Controller
{
    public function reporte(){
        $pdf = App::make('dompdf.wrapper');
        $usuarios = User::orderBy('nombres')->get();
        $pdf->loadView('users.reporte', ['usuarios' => $usuarios]);
        return $pdf->stream();
    }

    public function index()
    {
        $usuarios = User::orderBy('nombres')->get();
        $roles = Roles::orderBy('rol')->get();
        $estadosUsuarios = EstadosUsuarios::all();
        $dependencias = Dependencias::orderBy('nombre')->get();
        return view('users.index-users', ['usuarios' => $usuarios, 'roles' => $roles, 'estadosUsuarios' => $estadosUsuarios, 'dependencias' => $dependencias]);
    }

    public function show($id)
    {
        $usuario = User::find($id);
        return view('users.show-user', ['usuario' => $usuario]);
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Roles::orderBy('rol')->get();
        $estadosUsuarios = EstadosUsuarios::all();
        $dependencias = Dependencias::orderBy('nombre')->get();
        return view('users.edit-user', ['usuario' => $usuario, 'roles' => $roles, 'estadosUsuarios' => $estadosUsuarios, 'dependencias' => $dependencias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rol' => 'required',
            'id_dependencia' => 'required',
            'id_estado' => 'required',
            'email' => 'required|email|unique:users,email',
            'usuario' => 'required|unique:users,usuario',
            'password' => 'required|min:8|confirmed',
            'nombres' => 'required|min:5|max:50',
            'apellidos' => 'required|min:5|max:50',
            'cargo' => 'required|min:3|max:50',
            'ubicacion' => 'required|min:5|max:50',
            'telefono' => 'required|min:5|max:9|',
            'fecha_ingreso' => 'required|date',
            'dias_enfermedad_informales' => 'required|numeric|min:0',
            'dias_enfermedad_formales' => 'required|numeric|min:0',
            'dias_personales' => 'required|numeric|min:0',
            'motorista' => 'required',
            'motorista' => 'required',
            'codigo_marcacion' => 'required|unique:users,codigo_marcacion'
        ]);

        $usuario = new User();
        $usuario->id_rol = $request->id_rol;
        $usuario->id_dependencia = $request->id_dependencia;
        $usuario->id_estado = $request->id_estado;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->password = Hash::make($request->password);
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cargo = $request->cargo;
        $usuario->ubicacion = $request->ubicacion;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_ingreso = $request->fecha_ingreso;
        $usuario->dias_enfermedad_informales = $request->dias_enfermedad_informales;
        $usuario->dias_enfermedad_formales = $request->dias_enfermedad_formales;
        $usuario->dias_personales = $request->dias_personales;
        $usuario->motorista = $request->motorista;
        $usuario->codigo_marcacion = $request->codigo_marcacion;
        $usuario->save();

        return redirect()->route('users.index')->with('success', 'Usuario registrado correctamente');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_rol' => 'required',
            'id_dependencia' => 'required',
            'id_estado' => 'required',
            'email' => 'required|email|unique:users,email, ' . $id,
            'usuario' => 'required|unique:users,usuario, ' . $id,
            'nombres' => 'required|min:5|max:50',
            'apellidos' => 'required|min:5|max:50',
            'cargo' => 'required|min:3|max:50',
            'ubicacion' => 'required|min:5|max:50',
            'telefono' => 'required|min:5|max:9|',
            'fecha_ingreso' => 'required|date',
            'dias_enfermedad_informales' => 'required|numeric|min:0',
            'dias_enfermedad_formales' => 'required|numeric|min:0',
            'dias_personales' => 'required|numeric|min:0',
            'motorista' => 'required',
            'motorista' => 'required',
            'codigo_marcacion' => 'required|unique:users,codigo_marcacion, ' . $id,
        ]);

        $usuario = User::find($id);
        $usuario->id_rol = $request->id_rol;
        $usuario->id_dependencia = $request->id_dependencia;
        $usuario->id_estado = $request->id_estado;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cargo = $request->cargo;
        $usuario->ubicacion = $request->ubicacion;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_ingreso = $request->fecha_ingreso;
        $usuario->dias_enfermedad_informales = $request->dias_enfermedad_informales;
        $usuario->dias_enfermedad_formales = $request->dias_enfermedad_formales;
        $usuario->dias_personales = $request->dias_personales;
        $usuario->motorista = $request->motorista;
        $usuario->codigo_marcacion = $request->codigo_marcacion;

        if ($request->password != null) {
            $request->validate([
                'password' => 'min:8|confirmed'
            ]);
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
        } catch (Exception $e) {
            return redirect()->route('users.index')->withErrors(['No se puede eliminar el usuario, ya contiene registros']);
        }
    }
}