@extends('inicio')

@section('autos')
<div class="container">
    <h1>Autos</h1>
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    <form action="{{route('autos.cargar')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('nombre')
        <div class="alert alert-danger">Falta ingresar el nombre</div>
        @enderror
        @error('edad')
        <div class="alert alert-danger">Falta ingresar la edad</div>
        @enderror
        @error('marca')
        <div class="alert alert-danger">Falta ingresar la marca</div>
        @enderror
        @error('modelo')
        <div class="alert alert-danger">Falta ingresar el modelo</div>
        @enderror
        @error('descripcion')
        <div class="alert alert-danger">Falta ingresar la descripcion</div>
        @enderror
        @error('imagen')
        <div class="alert alert-danger">Falta ingresar la foto del vehiculo</div>
        @enderror
        <input class="form-control mb-2" type="text" name="nombre" placeholder="Nombre">
        <input class="form-control mb-2" type="number" name="edad" placeholder="Edad">
        <input class="form-control mb-2" type="text" name="marca" placeholder="Marca">
        <input class="form-control mb-2" type="text" name="modelo" placeholder="Modelo">
        <input class="form-control mb-2" type="text" name="descripcion" placeholder="Descripcion">
        <input class="form-control mb-2" type="file" name="imagen" accept="image/*">
        <button class="btn btn-primary btn-block" type="submit">Subir</button>
    </form>
</div>

<div class="container">
    @foreach($autos as $auto)
    <div class="float-left">
        <div class="card" style="width: 350px; height: auto;">
            <a href="images/{{$auto->imagen}}"><img src="images/{{$auto->imagen}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <p class="card-text"><strong>{{$auto->marca. " " . $auto->modelo}}</strong></p>
                <p class="card-text">Dueño {{$auto->nombre}} <br>{{$auto->descripcion}}</p>
                <a href="{{route('autos.editar',$auto->id)}}" class="btn btn-warning btn-sm">
                    Editar
                </a>
                <form class="d-inline" action="{{route('autos.eliminar',$auto->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>    
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection