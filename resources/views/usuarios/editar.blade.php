@extends('inicio')

@section('editar')
<div class="container">
    <h1>Editar: {{$nota->id}}</h1>
</div>
<div class="container">
    @if(session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
    @endif
    <form action="{{route('usuarios.update',$nota->id)}}" method="POST">
        @method('PUT')
        @csrf
        @error('nombre')
        <div class="alert alert-danger">Falta ingresar el nombre</div>
        @enderror
        @error('email')
        <div class="alert alert-danger">Falta ingresar el correo electronico</div>
        @enderror
        <input type="text" value="{{$nota->nombre}}" class="form-control mb-2" placeholder="Ingrese nombre" name="nombre">
        <input type="text" value="{{$nota->email}}" class="form-control mb-2" placeholder="Ingrese email" name="email">
        <button type="submit" class="btn btn-warning btn-block">Agregar</button>
    </form>
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
            <tr>
                <th scope="1">{{$nota->id}}</th>
                <td>
                    <a href="{{route('usuarios/detalle',$nota->id)}}">
                        {{$nota->nombre}}
                    </a>
                </td>
                <td>
                    {{$nota->email}}
                </td>
                <td>
                    <a href="{{route('usuarios.editar',$nota->id)}}" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection