@extends('users')

@section('section')
<h1>Detalle del Usuario:</h1>
<h4>ID: {{$dato->id}}</h4>
<h4>Nombre:{{$dato->nombre}}</h4>
<h4>Email:{{$dato->email}}</h4>
@endsection
