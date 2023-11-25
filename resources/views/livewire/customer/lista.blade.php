<div class="col-12 row">
   <h3 class="col-9">Lista de Clientes</h3>
   <Button class="btn btn-sm btn-success" wire:click.prevent="create()" class="col-2">Nuevo Cliente</Button>
   @forelse ($clientes as $cliente)
      <div class="card">
         <div class="card-header">
            <h4 class="card-tittle">{{ $cliente->name}}</h4>
         </div>
         <div class="card-body">
            <p>
               {{ $cliente->identity}}<br/>
               {{ $cliente->status}}<br/>
               {{ $cliente->birth}}<br/>
               {{ $cliente->interest}}<br/>
            </p>
         </div>
         <div class="card-footer">
            <button class="btn btn-sm btn-primary">ver</button>
            <button class="btn btn-sm btn-primary" wire:click="modificar({{ $cliente->id}})">Modificar</button>
            <button class="btn btn-sm btn-danger" wire:click="destroy({{ $cliente->id}})">eliminar</button>
         </div>
      </div>
   @empty
      <h3>SIN REGISTRO DE CLIENTES</h3>
   @endforelse
   @if ($db_operation=='crear' or $db_operation=='modificar')
      @include('livewire.customer.nuevo')
   @endif
</div>


