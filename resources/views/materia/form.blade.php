<h1>{{ $modo }} materia</h1>


@if (count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">

    <label for="materia">Materia</label>
    <input type="text" class="form-control" name="materia" 
    value="{{ isset($materia->materia)? $materia->materia:old('materia') }}" id="materia">
</div>
<br>
<div class="form-group">
    <select name="id_docente" id="id_docente" class="form-select" aria-label="Default select example">
    @foreach ($docentes as $docente)
    <option value="{{ $docente->id }}" {{ isset($materia->id_docente) && $materia->id_docente == $docente->id ? 'selected' : '' }}>{{ $docente->Nombre }}</option>
    @endforeach
    </select>
    
</div>
<br>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('materia/') }}"> Regresar</a>