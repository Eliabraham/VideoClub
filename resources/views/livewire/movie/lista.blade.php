<div  class="col-12 row">
   <h3 class="col-9">Lista de Peliculas</h3>
   <Button class="btn btn-sm btn-success" wire:click="create()">Nueva Pelicula</Button>
   @if ($db_operation=='create_movie' or $db_operation=='update_movie')
      @include('livewire.movie.nueva')
   @endif
   <div class="table-container col-12 mt-4 mb-3">
      <table class="table table-sm table-bordered table-hover">
         <thead class="thead-light">
            <tr>
               <th>Nombre</th>
               <th>Duración</th>
               <th>Status</th>
               <th>Director</th>
               <th>Genero</th>
               <th>Clasificación</th>
            </tr>
            <tr>
               <th>
                  <input wire:model="fil_nombre" wire:keyup="filtrar()" class="form-control form-control-sm" type="search"/>
               </th>
               <th>
                  <input wire:model="fil_duracion" wire:keyup="filtrar()" class="form-control form-control-sm"type="search"/>
               </th>
               <th>
                  <input wire:model="fil_status" wire:keyup="filtrar()" class="form-control form-control-sm"type="search"/>
               </th>
               <th>
                  <input wire:model="fil_director" wire:keyup="filtrar()" class="form-control form-control-sm" type="search"/>
               </th>
               <th>
                  <input wire:model="fil_genero" wire:keyup="filtrar()" class="form-control form-control-sm"type="search"/>
               </th>
               <th>
                  <input wire:model="fil_clasificacion" wire:keyup="filtrar()" class="form-control form-control-sm"type="search"/>
               </th>
            </tr>
         </thead>
      </table>
   </div>
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