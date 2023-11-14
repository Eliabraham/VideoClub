@extends('_layout.master')
@section('titulo')
    <h1 class="col-8">Lista de Clientes</h1>
    <a class="btn btn-primary col-4" href="{{ route('cliente.new') }}">Agregar Cliente</a>
@endsection
@section('contenido')
    @forelse($clientes as $cliente)
        <div class="col-4 mt-4">
            <div class="card">
                <h5 class="card-title">{{ $cliente->name }}</h5> 
                <div class="card-body">
                    <p class="card-text">
                        {{'IDENTIDAD: '.$cliente->identity}}<br/>
                        {{'STATUS: '.$cliente->status}}<br/>
                        {{'FECHA DE NACIMIENTO: '.$cliente->birth}}<br/>
                    </p>
                    <a class="btn btn-primary"  href="{{route('cliente.edit',['id'=>$cliente->id])}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-success" href="{{route('cliente.show',['id'=>$cliente->id])}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-success" href="{{route('contacto.new',['cliente'=>$cliente->id])}}">
                        <i class="fas fa-phone"></i>
                    </a>                    
                    <form class="d-inline-block" method="post" action="{{route('cliente.destroy',$cliente->id)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h2>SIN CLIENTES AUN</h2>
    @endforelse
@endsection
