<div>
    <h3>Lista de Peliculas</h3>
    <Button wire:click="create()">Nuevo Pelicula</Button>
    @if ($db_operation=='crear' or $db_operation=='modificar')
       @include('livewire.customer.nueva')
    @endif
    @forelse ($peliculas as $pelicula)
       <div style="border:double">
          <div>
             <div>
                {{ $cliente->name}}
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