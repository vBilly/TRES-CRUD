@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/nota/'.$nota->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('nota.form', ['modo'=>'Editar'])

</form>

</div>
@endsection
