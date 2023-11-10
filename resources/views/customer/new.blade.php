@extends('_layout.master')
@section('titulo','AGREGAR CLIENTES NUEVOS')
@section('contenido')
    <form action="{{ route('cliente.store') }}" class="col-12" method="post">
        @include('customer._layout.data')
        <br/>
        <input type="submit" value="GUARDAR CLIENTE" class="btn btn-primary">
    </form>
@endsection