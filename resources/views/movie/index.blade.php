@extends('_layout.master')
@section('titulo')
    <h1 class="col-8">LISTA DE PELICULAS</h1>
    <a class="btn btn-primary col-4" href="{{ route('pelicula.new') }}">Agregar Video</a>
@endsection
@section('contenido')
    @forelse($peliculas as $pelicula)
        <div class="col-4">
            <div class="card">
                <h5 class="card-title">{{ $pelicula->name }}</h5> 
                <div class="card-body">
                    <p class="card-text">
                        {{ 'DIRECTOR:       '.$pelicula->director }}<br/>
                        {{ 'POSTER:         '.$pelicula->poster }}<br/>
                        {{ 'SINOPSYS:       '.$pelicula->synopsis }}<br/>
                        {{ 'DISPONIBILIDAD: '.$pelicula->availability }}<br/>
                        {{ 'CLASIFICACION:  '.$pelicula->classification }}
                    </p>
                    <a class="btn btn-primary" style="display:inline-block" href="{{route('pelicula.edit',['id'=>$pelicula->id])}}"> <i class="fa fa-edit"></i></a>
                    <a class="btn btn-success" style="display:inline-block" href="{{route('pelicula.show',['id'=>$pelicula->id])}}"><i class="fa fa-eye"></i></a>
                    <form method="post" action="{{route('pelicula.destroy',$pelicula->id)}}" style="display:inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h2>Peliculas Vacias</h2>
    @endforelse
@endsection