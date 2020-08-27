@extends('inicio')

@section('autos')
<div class="container">
   @if(session('mensaje'))
    <div class="row col-md-12">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">{{session('mensaje')}}</h5>
                <p class="card-text">Si queres subir fotos de tu autos hace click en el boton</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endif
        @foreach($autos as $auto)
        <div class="float-left">
            <div class="card m-2">
                <a href="images/{{$auto->imagen}}">
                    <img src="images/{{$auto->imagen}}" class="card-img-top" style="width: 350px; height: 232px;">
                </a>
                <div class="card-body">
                        <div class="float-right badge badge-primary text-wrap" style="width: 6rem;">
                            {{$auto->categoria->nombre}}
                        </div>
                    <div class="float-right badge badge-primary text-wrap" style="width: 6rem;">
                            {{$auto->etiqueta}}
                        </div>
                    <p class="card-text"><strong>{{$auto->marca. " " . $auto->modelo}}</strong></p>
                    <p class="card-text">Dueño {{$auto->nombre}} <br>{{$auto->descripcion}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$autos->links()}}
</div>
@endsection