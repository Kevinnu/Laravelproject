@extends('inicio')

@section('section')
<div class="container-fluid col-md-8 img-thumbnail">
    <div class="navbar bg-light">
        <a class="navbar-brand">RAWSHIFTERS</a>
    </div>

    <div class="justify-content-center">
        <div class="row">
            @for($i=0; $i<=1;$i++)
            @if($i<=1)
            <div class="float-left col-md-6">
                <div class="container">
                    <img class="img-fluid" style="max-width: 100%" src="images/{{$post[$i]->imagen}}">
                </div>
                <div class="container text-center">
                    <a class="text-muted" href="images/{{$post[$i]->imagen}}">
                        <div class="badge badge-primary text-wrap" style="width: 6rem;">
                            Trackdeable
                        </div>
                        <h4>{{$post[$i]->marca." ".$post[$i]->modelo}}</h4>
                        <p>{{$post[$i]->descripcion}}</p>
                    </a>
                </div>
            </div>
            @endif
            @endfor
            @for($i=2; $i<(count($post));$i++)
            <div class="float-left col-md-4">
                <div class="container">
                    <img class="img-fluid" style="max-width: 100%" src="images/{{$post[$i]->imagen}}">
                </div>
                <div class="container text-center">
                    <a class="text-muted" href="images/{{$post[$i]->imagen}}">
                        <div class="badge badge-primary text-wrap" style="width: 6rem;">
                            Trackdeable
                        </div>
                        <h4>{{$post[$i]->marca." ".$post[$i]->modelo}}</h4>
                        <p>{{$post[$i]->descripcion}}</p>
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </div>
    {{$post->links()}}
</div>
@endsection