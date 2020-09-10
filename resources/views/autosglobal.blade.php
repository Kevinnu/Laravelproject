@extends('inicio')

@section('autos')
<div class="container">
    @if($autos[0]==NULL)
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <p class="card-title text-center" style="font-size: 60px;">¡Aun no se han subido autos!</p>
                <p class="card-text text-center">¡Se el primero en hacerlo! <br> Puedes subir tus autos haciendo click en el boton que esta abajo</p>
                <a href="autosupload/create" class="btn btn-primary btn-block">Subir un auto</a>
            </div>
        </div>
    </div>
    @else
        @foreach($autos as $auto)
        <div class="float-left">
            <div class="card m-2">
                <a href="images/{{$auto->imagen}}">
                    <img src="images/{{$auto->imagen}}" class="card-img-top" style="width: 350px; height: 232px;">
                </a>
                <div class="card-body">
                        <div class="float-right badge badge-primary text-wrap" style="width: 6rem;">
                            {{$auto->categoria}}
                        </div>
                    <div class="float-right badge badge-primary text-wrap" style="width: 6rem;">
                            {{$auto->etiqueta}}
                        </div>
                    <p class="card-text"><strong>{{$auto->marca. " " . $auto->modelo}}</strong></p>
                    <p class="card-text">Dueño {{$auto->nombre}} <br>{{$auto->descripcion}}</p>
                  
                 <!-- Panel exclusivo para administrador --> 
                 
                   @if($usuario[0]=="admin") 
                    <a href="{{action('AutoController@edit',$auto->id)}}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <form class="d-inline" action="{{action('AutoController@destroy',$auto->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form> 
                   @endif
                </div>
            </div>
        </div>
        @endforeach    
    </div>
   @endif
    {{$autos->links()}}
</div>
@endsection