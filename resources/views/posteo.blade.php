@extends('inicio')

@section('autos')
<div class="container">
    <div class="img-thumbnail">
        @foreach($autos as $auto)
        <div class="row aling-items-center">
            <div class="m-2">
                <img src="images/{{$auto->imagen}}" class="col-6">
            </div>
        </div>
        @endforeach
        {{$autos->links()}}
    </div>
</div>
@endsection