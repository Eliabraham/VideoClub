@extends('_layout.master')
@section('titulo',$pelicula->name)
@section('contenido')
    <div class="form-group col-5 d-inline-block"> 
        <b>Duración: </b>
        {{ $pelicula->duration}}
    </div>
    <div class="form-group col-5 d-inline-block"> 
        <b>Director: </b>
        {{ $pelicula->director }}
    </div>
    <div class="form-group col-5 d-inline-block"> 
        <b>Genero: </b>
        {{ $pelicula->genre }}
    </div>
    <div class="form-group col-5 d-inline-block"> 
        <b>clasificación: </b>
        {{ $pelicula->classification }}
    </div>
    <div class="form-group col-4 d-inline-block"> 
        <b>estatus: </b>
        {{$pelicula->status}}
    </div>
    <div class="form-group col-4 d-inline-block"> 
        <b>existencia: </b>
        {{$pelicula->existence}}
    </div>
    <div class="form-group col-4 d-inline-block"> 
        <b>Disponibilidad: </b>
        {{$pelicula->availability}}
    </div>
    <div class="form-group col-12 d-inline-block"> 
        <b>Synopsis: </b>
        {{$pelicula->synopsis}}
    </div>
    <div class="form-group col-10 d-inline-block"> 
        {{ $pelicula->poster }}
        <img style="max-width: 900px" src="{{ '/img/poster/'.$pelicula->poster }}" />
    </div>


@endsection