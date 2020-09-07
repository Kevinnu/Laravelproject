@extends('inicio')

@section('autos')
<div class="container">
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    @if($autos[0]==NULL)
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <p class="card-title text-center" style="font-size: 60px;">¡Aun no has subido un auto!</p>
                <p class="card-text text-center">Puedes subir tus autos haciendo click en el boton que esta abajo</p>
                <a href="autosupload/create" class="btn btn-primary btn-block">Subir un auto</a>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        @foreach($autos as $auto)
        <div class="float-left">
            <div class="card m-2">
                <a href="images/{{$auto->imagen}}">
                    <img src="images/{{$auto->imagen}}" class="card-img-top" style="width: 350px; height: 232px;">
                </a>
                <div class="card-body">
                    <p class="card-text"><strong>{{$auto->marca. " " . $auto->modelo}}</strong></p>
                    <p class="card-text">Dueño {{$auto->nombre}} <br>{{$auto->descripcion}}</p>
                    <a href="{{action('AutoController@edit',$auto->id)}}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <form class="d-inline" action="{{action('AutoController@destroy',$auto->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>    
                </div>
            </div>
        </div>
        @endforeach 
    </div>
    @endif
</div>
@endsection