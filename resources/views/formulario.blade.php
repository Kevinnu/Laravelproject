@extends('inicio')

@section('form')
<div class="container">
    <h1>Autos</h1>
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    <form action="{{action('AutoController@store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('nombre')
        <div class="alert alert-danger">Falta ingresar el nombre</div>
        @enderror
        @error('marca')
        <div class="alert alert-danger">Falta ingresar la marca</div>
        @enderror
        @error('modelo')
        <div class="alert alert-danger">Falta ingresar el modelo</div>
        @enderror
        @error('anio')
        <div class="alert alert-danger">Falta ingresar el año del vehiculo</div>
        @enderror
        @error('descripcion')
        <div class="alert alert-danger">Falta ingresar la descripcion</div>
        @enderror
        @error('imagen')
        <div class="alert alert-danger">Falta ingresar la foto del vehiculo</div>
        @enderror
        <input class="form-control mb-2" type="text" name="nombre" placeholder="Nombre">
        <input class="form-control mb-2" type="text" name="marca" placeholder="Marca">
        <input class="form-control mb-2" type="text" name="modelo" placeholder="Modelo">
        <select class="form-control mb-2" name="categoria">
            <option value="1">Trackdeable</option>
            <option value="2">JDM</option>
        </select>
        <input class="form-control mb-2" type="number" name="anio" placeholder="Año">
        <input class="form-control mb-2" type="text" name="descripcion" placeholder="Descripcion">
        <input class="form-control mb-2" type="file" name="imagen" accept="image/*">
        <button class="btn btn-primary btn-block" type="submit">Subir</button>
    </form>
</div>
@endsection