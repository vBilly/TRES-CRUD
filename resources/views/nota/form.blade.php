<h1>{{ $modo }} nota</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="id_materia">Materia</label>
    <select name="id_materia" id="id_materia" class="form-select" aria-label="Seleccionar materia">
        @foreach ($materias as $materia)
            <option value="{{ $materia->id }}" {{ isset($nota->id_materia) && $nota->id_materia == $materia->id ? 'selected' : '' }}>{{ $materia->materia }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_docente">Docente</label>
    <select name="id_docente" id="id_docente" class="form-select" aria-label="Seleccionar docente">
        @foreach ($docentes as $docente)
            <option value="{{ $docente->id }}" {{ isset($nota->id_docente) && $nota->id_docente == $docente->id ? 'selected' : '' }}>{{ $docente->Nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nota">Nota</label>
    <textarea class="form-control" name="nota" id="nota">{{ isset($nota->nota) ? $nota->nota : old('nota') }}</textarea>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('nota/') }}"> Regresar</a>
