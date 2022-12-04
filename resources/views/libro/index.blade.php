@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{Session::get('mensaje') }}

@endif
<br>
<a href="{{url('libro/create')}}" class="btn btn-success"> Registrar Nuevo Libro </a>
<br/>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Categoria</th>
            <th>Isbn</th>
            <th>Paginas</th>
            <th>Encuadernacion</th>
            <th>Tipo</th>
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody>
        
        @foreach($libros as $libro)
        <tr>
            
            <td>{{$libro->id}}</td>
            
            

            <td>
                
            <img src = "{{ asset('storage').'/'.$libro->Foto }}" width = "200" alt="">

                
            </td>

            <td>{{ $libro->Nombre}}</td>
            <td>{{ $libro->user}}</td>
            <td>{{ $libro->Autor}}</td>
            <td>{{ $libro->Editorial}}</td>
            <td>{{ $libro->Categoria}}</td>
            <td>{{ $libro->Isbn}}</td>
            <td>{{ $libro->Paginas}}</td>
            <td>{{ $libro->Encuadernacion}}</td>
            <td>{{ $libro->Tipo}}</td>
            <td>
                
            <a href = "{{ url ('/libro/'.$libro->id.'/edit')  }}" class = "btn btn-warning">
                Edit
            </a>
              
            <form action = "{{ url('/libro/'.$libro->id) }}" class = "d-inline" method = "post">
            @csrf
            {{ method_field('DELETE') }}
            <input class= "btn btn-danger" type="submit" onclick ="return confirm('¿Quiéres borrar?')" value="Borrar">
            
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection