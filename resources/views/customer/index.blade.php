@extends('_layout.master')
@section('titulo')
    <h1 class="col-8">Lista de Clientes</h1>
    <a class="btn btn-primary col-4" href="{{ route('cliente.new') }}">Agregar Cliente</a>
@endsection
@section('contenido')
    @forelse($clientes as $cliente)
        <div class="col-4">
            <div class="card">
                <h5 class="card-title">{{ $cliente->name }}</h5> 
                <div class="card-body">
                    <p class="card-text">
                        IDENTIDAD: {{ $cliente->identity}}<br/>
                        STATUS:{{ $cliente->status}}<br/>
                        FECHA DE NACINIENTO:{{ $cliente->birth}}<br/>
                    </p>
                </div>
            </div>
        </div>
    @empty
        <h2>SIN CLIENTES AUN</h2>
    @endforelse
@endsection
