<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

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
        $datos = App\Usuario::paginate(3);
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

    public function cargarautos(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $newname = time() . $imagen->getClientOriginalName();
            $imagen->move(public_path() . '/images/', $newname);
        }
        $auto = new App\Auto();
        $auto->nombre = $request->nombre;
        $auto->marca = $request->marca;
        $auto->modelo = $request->modelo;
        $auto->anio = $request->anio;
        $auto->categoria = $request->categoria;
        $auto->descripcion = $request->descripcion;
        $auto->imagen = $newname;
        $auto->save();
        return back()->with('mensaje', 'EL auto fue cargado exitosamente');
    }

    public function editarautos($id) {
        $auto = App\Auto::findorfail($id);
        return view('autosedit', compact('auto'));
    }

    public function updateautos(Request $request, $id) {
        $autosedit = App\Auto::findorfail($id);
        $autosedit->nombre = $request->nombre;
        $autosedit->marca = $request->marca;
        $autosedit->modelo = $request->modelo;
        $autosedit->anio = $request->anio;
        $autosedit->categoria = $request->categoria;
        $autosedit->descripcion = $request->descripcion;
        $autosedit->save();
        return back()->with('mensaje', 'El auto fue editado');
    }

    public function deleteautos(Request $request, $id) {
        $deleteautos = App\Auto::findorfail($id);
        $deleteautos->delete();
        return back()->with('mensaje', 'El auto fue eliminado exitosamente');
    }

    public function post(Request $request) {
        $autos = App\Auto::orderBy('created_at', 'DESC')->paginate(9);
        if (empty(auth()->user()->rol)) {
            return view('autosglobal', compact('autos'));
        } else {
            $usuario = [auth()->user()->rol];
            return view('autosglobal', compact('autos', 'usuario'));
        }
    }

    public function start() {
        $autos = App\Auto::orderBy('created_at', 'DESC')->paginate(3);
        return view('posteo', compact('autos'));
    }

    public function albumnes() {
        $album_muestra = App\Album_fotos::all();
        // $album_foto = App\Fotos::all();
        return view('muestrario', compact('album_muestra'));
    }

    public function muestrario($id) {
        
        if(!empty(auth()->user()->email)){
            $usuario = auth()->user()->email;
        }
        $fotos_muestra = App\Fotos::where('album',$id)->get();
        //$fotos_muestra = DB::table('fotos')->select('*')->where('album', '=', $id,'usuario','=',$usuario)->get();
        $id_album = App\Album_fotos::findOrFail($id);
//        $comentarios = DB::table('comentarios')->select('*')->where('album_id', '=', $id)->get();
        $comentarios= App\Comentario::where('album_id',$id)->get();
        if (empty(auth()->user()->email)) {
            return view('muestrario', compact('fotos_muestra', 'id_album', 'comentarios'));
        } else {
            $usuario = [auth()->user()->email];
            return view('muestrario', compact('fotos_muestra', 'id_album', 'comentarios', 'usuario'));
        }
    }

    public function comentario(Request $request, $id) {
        $comentario = new App\Comentario;
        $comentario->comentario = $request->comentario;
        $comentario->album_id = $id;
        $comentario->usuario = auth()->user()->email;
        $comentario->save();
        return back();
    }

    public function comentariodelete($id) {
        $comentariodelete = App\Comentario::FindOrFail($id);
        $comentariodelete->delete();
        return back();
    }

}
