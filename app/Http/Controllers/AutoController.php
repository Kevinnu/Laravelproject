<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App;

class AutoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarioEmail = auth()->user()->email;
        $autos = App\Auto::where('usuario', $usuarioEmail)->paginate(6);
        return view('autos', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorias = DB::table('autos_categoria')->get();
        return view('formulario', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'nombre'=>'required',
            'marca'=>'required',
            'modelo'=>'required',
            'anio'=>'required',
            'categoria'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required'
        ]);
        $autos = new App\Auto();
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $newname = time() . $imagen->getClientOriginalname();
            $imagen->move(public_path() . '/images/', $newname);
        }
        $autos->nombre = $request->nombre;
        $autos->marca = $request->marca;
        $autos->modelo = $request->modelo;
        $autos->anio = $request->anio;
        $autos->categoria_id = $request->categoria;
        $autos->descripcion = $request->descripcion;
        $autos->imagen = $newname;
        $autos->usuario = auth()->user()->email;
        $autos->save();

        return back()->with('mensaje', 'Auto agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $auto = App\Auto::Findorfail($id);
        return view('autosedit', compact('auto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $autoedit = App\Auto::findorfail($id);
        $autoedit->nombre = $request->nombre;
        $autoedit->marca = $request->marca;
        $autoedit->modelo = $request->modelo;
        $autoedit->anio = $request->anio;
        $autoedit->categoria_id = $request->categoria;
        $autoedit->descripcion = $request->descripcion;
        if ($request->hasfile('imagen')) {
            $autoedit->imagen = $request->imagen;
        }
        $autoedit->save();
        return back()->with('mensaje', 'Auto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $autodelete = App\Auto::FindOrFail($id);
        $autodelete->delete();
        return back()->with('mensaje', 'El auto fue eliminado');
    }

}
