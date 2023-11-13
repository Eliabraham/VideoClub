@extends('_layout.master')
@section('titulo',$cliente->name)
@section('contenido')
    <div class="form-group col-5 d-inline-block"> 
        <b>Nombre</b>
        {{ $cliente->name}}
    </div>
    <div class="form-group col-5 d-inline-block"> 
        <b>Documento de Identidad</b>
        {{ $cliente->identity}}
    </div>
    <div class="form-group col-5 d-inline-block"> 
        <b>Estatus</b>
        {{ $cliente->status }}
    </div>
    <div class="form-group col-5 d-inline-block"> 
        <b>Dia de Nacimiento</b>
        {{ $cliente->birth}}
    </div>
    <div class="form-group col-10 d-inline-block"> 
        <b>Intereses</b>
        {{ $cliente->interest}}
    </div>
@endsection
