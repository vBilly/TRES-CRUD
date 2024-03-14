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


<a href="{{ url('docente/create') }}" class="btn btn-success"> Registrar Nuevo Docente</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Rfc</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Accion</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($docentes as $docente)
            
        <tr>
            <td>{{ $docente->id }}</td>
            <td>{{ $docente->Nombre }}</td>
            <td>{{ $docente->Apellidos }}</td>
            <td>{{ $docente->Rfc }}</td>
            <td>{{ $docente->Correo }}</td>
            <td>{{ $docente->Telefono }}</td>
            <td>

            <a href="{{ url('/docente/'.$docente->id.'/edit') }}" class="btn btn-warning">
            Editar 
            </a>
                
            | 

            <form action="{{ url('/docente/'.$docente->id) }}" class="d-inline" method="post">
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
{!! $docentes->links() !!}
</div>
@endsection