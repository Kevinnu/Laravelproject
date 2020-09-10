@extends('inicio')

@section('autosedit')
<div class="container">
    <div class="text-center">
        <h1>Editar: {{$auto->marca." ".$auto->modelo}}</h1>
    </div>
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    <form action="{{action('AutoController@update',$auto->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input class="form-control mb-2" type="text" value="{{$auto->nombre}}" name="nombre" placeholder="Nombre">
        <input class="form-control mb-2" type="text" value="{{$auto->marca}}" name="marca" placeholder="Marca">
        <input class="form-control mb-2" type="text" value="{{$auto->modelo}}" name="modelo" placeholder="Modelo">
        <select class="form-control mb-2" name="categoria">
            <option value="1">Trackdeable</option>
            <option value="2">JDM</option>
        </select>
        <input class="form-control mb-2" type="number" value="{{$auto->anio}}" name="anio" placeholder="Año">
        <input class="form-control mb-2" type="text" value="{{$auto->descripcion}}" name="descripcion" placeholder="Descripcion">
        <input class="form-control mb-2" type="file" name="imagen" accept="image/*">
        <button class="btn btn-primary btn-block" type="submit">Subir</button>
    </form>
</div>

<div class="container mt-2">
    <div class="card" style="width: 500px; height: auto;">
        <a href="../../images/{{$auto->imagen}}"><img src="../../images/{{$auto->imagen}}" class="card-img-top" alt="..."></a>
        <div class="card-body">
            <p class="card-text"><strong>{{$auto->marca. " " . $auto->modelo}}</strong></p>
            <p class="card-text">Dueño {{$auto->nombre}} <br>{{$auto->descripcion}}</p>
        </div>
    </div>
</div>
@endsection