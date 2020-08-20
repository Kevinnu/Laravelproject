@extends('inicio')

@section('section')
<div class="container-fluid col-md-8 img-thumbnail">
    <div class="navbar bg-light">
        <a class="navbar-brand">RAWSHIFTERS</a>
    </div>
    <div class="justify-content-center">
        <div class="row">
          
          @foreach($post as $auto)
          <div class="float-left col-md-6">
                <div class="container">
                    <img class="img-fluid" style="max-width: 100%" src="images/{{$auto->imagen}}">
                </div>
                <div class="container text-center">
                    <a class="text-muted" href="images/{{$auto->imagen}}">
                        <div class="badge badge-primary text-wrap" style="width: 6rem;">
                            Trackdeable
                        </div>
                        <h4>{{$auto->marca." ".$auto->modelo}}</h4>
                        <p>{{$auto->descripcion}}</p>
                    </a>
                </div>
            </div>
          @endforeach
        </div>
    </div>
    {{$post->links()}}
</div>
@endsection