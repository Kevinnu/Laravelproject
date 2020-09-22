<?php

namespace App\Http\Controllers;

use App\Album_fotos;
use Illuminate\Http\Request;

class AlbumFotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        return redirect('newalbum/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formularioalbum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new Album_fotos();
        $album->nombre = $request->nombre;
        $album->save();
        return redirect('newfotos/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album_fotos  $album_fotos
     * @return \Illuminate\Http\Response
     */
    public function show(Album_fotos $album_fotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album_fotos  $album_fotos
     * @return \Illuminate\Http\Response
     */
    public function edit(Album_fotos $album_fotos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album_fotos  $album_fotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album_fotos $album_fotos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album_fotos  $album_fotos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album_fotos $album_fotos)
    {
        //
    }
}
