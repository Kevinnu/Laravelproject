<?php

namespace App\Http\Controllers;

use App;
use App\Album_fotos;
use App\Fotos;
use Illuminate\Http\Request;

class FotosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        return redirect('album/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $albums = App\Album_fotos::orderBy('created_at', 'desc')->get();
        return view('formulariofotos', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if($request->hasFile('foto_portada')){
                $imagen = $request->foto_portada;
                $newname = time() . $imagen->getClientOriginalname();
                $imagen->move(public_path() . '/images/', $newname);
                $foto_portada = new App\Fotos();
                $foto_portada->album = $request->album;
                $foto_portada->posicion = 'portada';
                $foto_portada->foto = $newname;
                $foto_portada->save();
        }
        
        if ($request->hasFile('foto')) {
            for ($i = 0; $i < count($request['foto']); $i++) {
                $imagen = $request['foto'][$i];
                $newname = time() . $imagen->getClientOriginalname();
                $imagen->move(public_path() . '/images/', $newname);
                $foto = new App\Fotos();
                $foto->album = $request->album;
                $foto->posicion = 'contenido';
                $foto->foto = $newname;
                $foto->save();
            }
        }
        return back()->with('mensaje', 'Album cargado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function show(Fotos $fotos) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotos $fotos) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotos $fotos) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotos $fotos) {
        //
    }

}
