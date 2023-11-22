   <div>
      <h3>Lista de Clientes</h3>
      <h4>{{ $db_operation }}</h4>
      <Button wire:click="$set('db_operation','insert')">Nuevo Cliente</Button>
      @if ($db_operation=='insert')
         @include('livewire.customer.nuevo')
      @endif
   </div>

