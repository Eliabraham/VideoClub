<div  class="col-12 row">
   <h3 class="col-9">Lista de Peliculas</h3>
   <Button class="btn btn-sm btn-success" wire:click="create()">Nueva Pelicula</Button>
   @if ($db_operation=='create_movie' or $db_operation=='update_movie')
      @include('livewire.movie.nueva')
   @endif
   @forelse ($peliculas as $pelicula)
      <div class="card col-4">
         <div class="card-header">
            <h4 class="card-tittle">{{ $pelicula->name}}</h4>
         </div>
         <div class="card-body">
            <p>
               {{ 'Duración: '.$pelicula->duration}} <br>
               {{ 'Director: '.$pelicula->director}}  <br>
               {{ 'Genero: '.$pelicula->genre}} <br>
               {{ 'Clasificacion: '.$pelicula->classification}}<br>
               {{ 'Resumen: '.$pelicula->synopsis}}<br>
               {{ 'Status: '.$pelicula->status}}<br>
               {{ 'Existencia: '.$pelicula->existence}}<br>
               {{ 'Disponibilidad: '.$pelicula->availability}}
            </p>
         </div>
         <div class="card-footer">
            <button class="btn btn-sm btn-primary">ver</button>
            <button class="btn btn-sm btn-primary"wire:click="modificar({{ $pelicula->id}})">Modificar</button>
            <button class="btn btn-sm btn-danger"wire:click="destroy({{ $pelicula->id}})">eliminar</button>
         </div>
      </div>
   @empty
      <h3>SIN REGISTRO DE PELICULAS</h3>
   @endforelse
</div>