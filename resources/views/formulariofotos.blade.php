@extends('inicio')

@section('form')
<div class="container">
    <h1>CREACION DE ALBUM DE FOTOS</h1>
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    <form action="{{action('FotosController@store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('nombre')
        <div class="alert alert-danger">Falta ingresar el nombre del Album</div>
        @enderror
        <label class="form-group">Seleccione el album</label>
        <select class="form-control mb-2" name="album">
            @foreach($albums as $album)
            <option value="{{$album->id}}">{{$album->nombre}}</option>
            @endforeach
        </select>
        <label class="form-group">Esta foto sera la de portada</label>
        <input class="form-control mb-2" type="file" name="foto_portada" accept="images/*">
        <label class="form-group">Estas fotos seran las del contenido</label>
        <input class="form-control mb-2" type="file" name="foto[]" accept="images/*" multiple="">
        <button class="btn btn-primary btn-block" type="submit">Subir</button>
    </form>
</div>
@endsection