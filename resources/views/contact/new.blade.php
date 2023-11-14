@extends('_layout.master')
@section('titulo','AGREGAR CONTACTOS A CLIENTE')
@section('contenido')
    <form action="{{ route('contacto.create',['cliente'=>$cliente]) }}" method="post" class="col-12">
        @csrf
        <div class="form-group col-3 d-inline-block"> 
            <label for="duration">Tipo</label>
            <input type="search" name="type" class="form-control form-control-sm">
        </div>
        <div class="form-group col-3 d-inline-block"> 
            <label for="duration">Valor</label>
            <input type="search" name="valor" class="form-control form-control-sm">
        </div>
        <div class="form-group col-3 d-inline-block"> 
            <label for="duration">Status</label>
            <select name="status" class="form-control form-control-sm">
                <option value="">--</option>
                <option value="principal">principal</option>
                <option value="propio">propio</option>
                <option value="mensajero">mensajero</option>
            </select>
        </div>
        <div class="form-group col-2 d-inline-block"> 
            <input type="submit" value="aceptar" class="btn btn-primary btn-success">
        </div>
    </form>
    @forelse($contactos as $contacto)
    <div class="card col-4">
        <div class="form-group d-inline-block"> 
            <b>Tipo:</b> {{ $contacto->type }}
        </div>
        <div class="form-group d-inline-block"> 
            <b>Valor:</b>{{ $contacto->valor }}
        </div>
        <div class="form-group d-inline-block"> 
            <b>Status</b> {{ $contacto->status }}
        </div>
        <div class="form-group d-inline-block"> 
            <form class="d-inline-block" method="post" action="{{route('contacto.destroy',['id'=>$contacto->id, 'cliente'=>$cliente])}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
    @empty
        <h2>CLIENTE SIN CONTACTOS AUN</h2>
    @endforelse

@endsection
