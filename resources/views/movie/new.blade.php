@extends('_layout.master')
@section('titulo','AGREGAR PELICULAS NUEVAS AL CATALOGO')
@section('contenido')
    <form action="{{ route('pelicula.store') }}" class="col-12" method="post" enctype="multipart/form-data">
        @include('movie._layout.data')
        <br/>
        <input type="submit" value="GUARDAR VIDEO" class="btn btn-primary">
    </form>
@endsection

