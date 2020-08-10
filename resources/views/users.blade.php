@extends('inicio')

@section('tabla')
<div class="container my-3">
    @if(session('mensaje'))
    <div class="container alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif
    <div class="container">
        <form action="{{route('usuarios.crear')}}" method="POST">
            @csrf
            @error('nombre')
            <div class="alert alert-danger">Falta ingresar el nombre</div>
            @enderror
            @error('email')
            <div class="alert alert-danger">Falta ingresar el correo electronico</div>
            @enderror
            <input type="text" value="{{old('nombre')}}" class="form-control mb-2" placeholder="Ingrese nombre" name="nombre">
            <input type="text" value="{{old('email')}}" class="form-control mb-2" placeholder="Ingrese email" name="email">
            <button type="submit" class="btn btn-primary btn-block">Agregar</button>
        </form>
    </div>
    <h1>Usuarios</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $item)
            <tr>
                <th scope="1">{{$item->id}}</th>
                <td>
                    <a href="{{route('usuarios/detalle',$item)}}">
                        {{$item->nombre}}
                    </a>
                </td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    <a href="{{route('usuarios.editar',$item)}}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <form action="{{route('usuarios.eliminar',$item)}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$datos->links()}}
</div>
@endsection

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>