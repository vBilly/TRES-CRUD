@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ url('/nota') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('nota.form', ['modo'=>'Crear'])

    </form>

</div>
@endsection
