@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Carroceria</th>
                        <th scope="col">Combustible</th>
                        <th scope="col">Tags</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->marca_id}}</td>
                        <td>{{$item->pais_id}}</td>
                        <td>{{$item->carroceria_id}}</td>
                        <td>{{$item->combustible_id}}</td>
                        <td>
                        @foreach($item->tags as $tag)
                        <span class="badge badge-primary"># {{ $tag->etiqueta }}</span>
                        @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

