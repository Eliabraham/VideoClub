<div>
   <h3>Lista de Clientes</h3>
   <Button wire:click="create()">Nuevo Cliente</Button>
   @if ($db_operation=='crear' or $db_operation=='modificar')
      @include('livewire.customer.nuevo')
   @endif
   @forelse ($clientes as $cliente)
      <div style="border:double">
         <div>
            <div>
               {{ $cliente->name}}
               <button>ver</button>
               <button wire:click="modificar({{ $cliente->id}})">Modificar</button>
               <button wire:click="destroy({{ $cliente->id}})">eliminar</button>
            </div>
            <div>
               <p>
                  {{ $cliente->identity}}<br/>
                  {{ $cliente->status}}<br/>
                  {{ $cliente->birth}}<br/>
                  {{ $cliente->interest}}<br/>
               </p>
            </div>
         </div>
      </div>
   @empty
      <h3>SIN REGISTRO DE CLIENTES</h3>
   @endforelse
</div>

