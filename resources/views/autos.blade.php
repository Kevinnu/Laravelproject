@extends('inicio')

@section('autos')
<div class="container">
    <h1>Autos</h1>
    <form action="{{route('autos.cargar')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-2" type="text" name="nombre" placeholder="Nombre">
        <input class="form-control mb-2" type="number" name="edad" placeholder="Edad">
        <input class="form-control mb-2" type="text" name="marca" placeholder="Marca">
        <input class="form-control mb-2" type="text" name="modelo" placeholder="Marca">
        <input class="form-control mb-2" type="text" name="descripcion" placeholder="Descripcion">
        <input class="form-control mb-2" type="file" name="imagen" accept="image/*">
        <button class="btn btn-primary btn-block" type="submit">Subir</button>
    </form>
</div>
<div class="container">
    @foreach($autos as $auto)
    <div class="float-left">
        <div class="card" style="width: 300px; height: auto;">
            <a href="images/{{$auto->imagen}}"><img src="images/{{$auto->imagen}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <p class="card-text">{{$auto->descripcion}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection