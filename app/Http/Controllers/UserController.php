<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class UserController extends Controller {

    public function show($id) {
        return 'UserID: ' . $id;
    }

    public function saludo() {
        return view('users', ['name' => 'Controlador']);
    }

    /* public function mostrartodo($nombre, $apellido, $edad) {
      return 'El usuario ' . $nombre . " " . $apellido . " Tiene " . $edad . " años";
      } */ //Solo se muestra una vista cruda en PHP

    public function mostrartemplate($nombre, $apellido, $edad) {
        return view('users', ['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad]);
    }

//Misma funcion que arriba pero con RETURN VIEW se retorna una HTML llamado USERS con los datos ingresados

    public function inicio() {
        $datos = App\Usuario::paginate(2);
        return view('users', compact('datos'));
    }

    public function detalle($id) {
        $dato = App\Usuario::findOrFail($id);
        return view('usuarios/detalle', compact('dato'));
    }

    public function crear(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required'
        ]);
        $datonuevo = new App\Usuario;
        $datonuevo->nombre = $request->nombre;
        $datonuevo->email = $request->email;
        $datonuevo->save();
        return back()->with('mensaje', 'Nota agregada');
    }

    public function editar($id) {
        $nota = App\Usuario::findorfail($id);
        return view('usuarios/editar', compact('nota'));
    }

    public function update(Request $request, $id) {
        $usuarioUpdate = App\Usuario::findorfail($id);
        $usuarioUpdate->nombre = $request->nombre;
        $usuarioUpdate->email = $request->email;
        $usuarioUpdate->save();
        return back()->with('mensaje', 'Nota actualizada');
    }

    public function eliminar(Request $request, $id) {
        $usuarioeliminar = App\Usuario::findorfail($id);
        $usuarioeliminar->delete();
        return back()->with('mensaje', 'El usuario fue eliminado');
    }

    public function mostrar(Request $request) {
        $autos = App\Auto::all();
        return view('autos', compact('autos'));
    }

    public function cargarautos(Request $request) {
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $newname = time() . $imagen->getClientOriginalName();
            $imagen->move(public_path() . '/images/', $newname);
        }
        $auto = new App\Auto();
        $auto->nombre = $request->nombre;
        $auto->edad = $request->edad;
        $auto->marca = $request->marca;
        $auto->modelo = $request->modelo;
        $auto->descripcion = $request->descripcion;
        $auto->imagen = $newname;
        $auto->save();
        return back();
    }

}
