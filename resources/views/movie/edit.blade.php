@extends('_layout.master')
@section('titulo','EDITAR PELICULA EXISTENTE EN EL CATALOGO')
@section('contenido')
    <form action="{{ route('pelicula.update',['id'=>$pelicula->id]) }}" enctype="multipart/form-data" class="col-12" method="post">
        @method('put')
        @include('movie._layout.data')
        <br/>
        <input type="submit" value="GUARDAR VIDEO" class="btn btn-primary">
    </form>
@endsection