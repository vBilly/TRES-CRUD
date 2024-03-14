<h1>{{ $modo }} docente</h1>


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

    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" 
    value="{{ isset($docente->Nombre)? $docente->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
    <label for="Apellidos">Apellidos</label>
    <input type="text" class="form-control" name="Apellidos"
    value="{{ isset($docente->Apellidos)? $docente->Apellidos:old('Apellidos') }}" id="Apellidos">

</div>

<div class="form-group">
    <label for="Rfc">Rcf</label>
    <input type="text" class="form-control" name="Rfc"
    value="{{ isset($docente->Rfc)? $docente->Rfc:old('Rfc') }}" id="Rfc">

</div>

<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="text" class="form-control" name="Correo"
    value="{{ isset($docente->Correo)? $docente->Correo: old('Correo') }}" id="Correo">

</div>

<div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="text" class="form-control" name="Telefono"
    value="{{ isset($docente->Telefono)? $docente->Telefono:old('Telefono') }}" id="Telefono">
    <br>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('docente/') }}"> Regresar</a>