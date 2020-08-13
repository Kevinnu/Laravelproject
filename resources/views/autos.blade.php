@extends('inicio')

@section('autos')
<div class="container">
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
    {{$autos->links()}}
</div>
@endsection