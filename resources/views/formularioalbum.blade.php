@extends('inicio')

@section('form')
<div class="container">
    <h1>Titulo del Album</h1>
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    <form action="{{action('AlbumFotosController@store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('nombre')
        <div class="alert alert-danger">Falta ingresar el nombre del Album</div>
        @enderror
        <input class="form-control mb-2" type="text" name="nombre" placeholder="Nombre del Album">
        <button class="btn btn-primary btn-block" type="submit">Subir</button>
    </form>
</div>
@endsection