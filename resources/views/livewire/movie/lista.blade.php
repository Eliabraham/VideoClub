<div>
   <h3>Lista de Peliculas</h3>
   <Button wire:click="create()">Nueva Pelicula</Button>
   @if ($db_operation=='create_movie' or $db_operation=='update_movie')
      @include('livewire.movie.nueva')
   @endif
   @forelse ($peliculas as $pelicula)
      <div style="border:double">
         <div>
            <div>
               {{ $pelicula}}
               <button>ver</button>
               <button wire:click="modificar({{ $pelicula->id}})">Modificar</button>
               <button wire:click="destroy({{ $pelicula->id}})">eliminar</button>
            </div>
            <div>
               <p>
                  {{ $pelicula}}
               </p>
            </div>
         </div>
      </div>
   @empty
      <h3>SIN REGISTRO DE PELICULAS</h3>
   @endforelse
</div>