@extends('inicio')
@section('content')
@if(empty($album_muestra))
@else
@foreach($album_muestra as $album)
<div class="container"><a href="{{action('UserController@muestrario',$album->id)}}">{{$album->nombre}}</a></div>
@endforeach
@endif                   

<!-------------------------------------------------------------->


@if(empty($fotos_muestra))
@else
<div class="container">
    <div class="row">
        @foreach($fotos_muestra as $foto)
        <img class="col-4 float-left" src="../images/{{$foto->foto}}" alt="" style="padding: 1px">
        @endforeach

        <div class="container-fluid">
            @foreach($comentarios as $comentario)
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <p class="float-left">{{$comentario->comentario}}</p>
                        @if(empty($usuario))
                        @elseif($usuario[0] == $comentario->usuario || $usuario_rol[0]=='admin')
                        <div class="float-right">
                            <form action="{{action('UserController@comentariodelete',$comentario->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-right">Eliminar</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div class="container-fluid mt-2">
        <form action="{{action('UserController@comentario',$id_album)}}" method="POST">
            @csrf
            @error('nombre')
            <div class="alert alert-danger">Falta ingresar el nombre del Album</div>
            @enderror
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">With textarea</span>
                </div>
                <textarea class="form-control" name="comentario" aria-label="Comentario" placeholder="ingrese su comentario..." rows="1" cols="2" maxlength="400" style="max-height: 100px;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
    </div>
</div>
</div>
@endif
@endsection