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
    }//Misma funcion que arriba pero con RETURN VIEW se retorna una HTML llamado USERS con los datos ingresados

    public function inicio(){
        $datos = App\Usuario::all();
        return view('users', compact('datos'));
    }

    public function detalle($id){
        $dato= App\Usuario::findOrFail($id);
        return view('usuarios/detalle', compact('dato'));
    }
}
