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


<a href="{{ url('nota/create') }}" class="btn btn-success">Registrar Nueva Nota</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Materia</th>
            <th>Docente</th>
            <th>Nota</th>
            <th>Acción</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($notas as $nota)
            
        <tr>
            <td>{{ $nota->id }}</td>
            <td>{{ $nota->materia->materia }}</td>
            <td>{{ $nota->docente->Nombre }}</td>
            <td>{{ $nota->nota }}</td>
            <td>

            <a href="{{ url('/nota/'.$nota->id.'/edit') }}" class="btn btn-warning">
            Editar 
            </a>
                
            | 

            <form action="{{ url('/nota/'.$nota->id) }}" class="d-inline" method="post">
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
