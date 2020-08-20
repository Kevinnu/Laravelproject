@extends('inicio')

@section('autos')
<div class="container justify-content-center mt-5">
    <div class=" container col-md-6 text-center">
        <div class="card">
            <div class="card-header">
                <h2>No tienes autos subidos<h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{session('mensaje')}}</h5>
                <p class="card-text">Si queres subir fotos de tu autos haz click en el boton</p>
                <a href="/proyectolaravel/public/autosupload/create" class="btn btn-primary">Subir imagen</a>
            </div>
        </div>
    </div>
</div>
@endsection