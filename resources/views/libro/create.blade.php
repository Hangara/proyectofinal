@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/libro') }}" method="post" enctype="multipart/form-data">
@csrf    
@include('libro.form', ['modo'=>'Guardar']);


</form>
</div>
@endsection