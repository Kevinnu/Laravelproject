@extends('inicio')

@section('autos')
@if($autos[0]==NULL)
@else
<div class="container img-thumbnail">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if($autos[0]==!NULL)
            <div class="carousel-item active">
                <img src="images/{{$autos[0]->imagen}}" class="container d-block col-8" alt="...">
            </div>
            @endif
            @if($autos[1]==!NULL)
            <div class="carousel-item">
                <img src="images/{{$autos[1]->imagen}}" class="container d-block col-8" alt="...">
            </div>
            @endif
            @if($autos[2]==!NULL)
            <div class="carousel-item">
                <img src="images/{{$autos[2]->imagen}}" class="container d-block col-8" alt="...">
            </div>
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endif
</div>

<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title text-center" style="font-size: 100px; font-family: Impact;">
                BIENVENIDO
            </div>
            <p class="card-text text-center" style="font-family: Comic Sans; font-size: 20px;">Te damos la bienvenida al blog de autos</p>

            <a href="{{route('autos')}}" class="btn btn-primary btn-block">Ver los autos</a>

        </div>
    </div>
</div>
@endsection