@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/docente') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('docente.form', ['modo'=>'Crear']);

</form>
</div>
@endsection