@extends('inicio')

<div class="container my-3">
    <h1>Usuarios</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Handle</th>
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
                <td>Facebook</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5 bg-dark text-white container text-center">
        <p>FOOTER</p>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>