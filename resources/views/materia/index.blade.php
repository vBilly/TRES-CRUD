@extends('layouts.app')
@section('content')
<div class="container">

@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="false">&times;</span>
</button>
</div>
@endif


<a href="{{ url('materia/create') }}" class="btn btn-success"> Registrar Nuevo Matria</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Materia</th>
            <th>Docente</th>
            <th>Accion</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($materias as $materia)
            
        <tr>
            <td>{{ $materia->id }}</td>
            <td>{{ $materia->materia }}</td>
            <td>{{ $materia->docente->Nombre }}</td>
            <td>

            <a href="{{ url('/materia/'.$materia->id.'/edit') }}" class="btn btn-warning">
            Editar 
            </a>
                
            | 

            <form action="{{ url('/materia/'.$materia->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}

            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')"
            value="Borrar">
            </form>
            </td>      
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection