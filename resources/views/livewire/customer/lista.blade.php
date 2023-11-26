<div class="col-12 row">
   <h3 class="col-9">Lista de Clientes</h3>
   <Button class="btn btn-sm btn-success" wire:click.prevent="create()" class="col-2">Nuevo Cliente</Button>
   <div class="table-container col-12 mt-4 mb-3">
      <table class="table table-sm table-bordered table-hover">
         <thead class="thead-light">
            <tr>
               <th>Nombre</th>
               <th>Cedula</th>
               <th>Status</th>
               <th>Edad</th>
            </tr>
            <tr>
               <th>
                  <input wire:model="fil_nombre" wire:keyup="filtrar()" class="form-control form-control-sm" type="search"/>
               </th>
               <th>
                  <input wire:model="fil_cedula" wire:keyup="filtrar()" class="form-control form-control-sm"type="search"/>
               </th>
               <th>
                  <select wire:model="fil_status" wire:change="filtrar()" class="form-control form-control-sm">
                     <option value="">--</option>
                     <option>inactivo</option>
                     <option>activo</option>
                     <option>amonestado</option>
                     <option>betado</option>
                  </select>
               </th>
               <th>
                  <input wire:model="fil_edad" wire:keyup="filtrar()" class="form-control form-control-sm"type="search"/>
               </th>
            </tr>
         </thead>
      </table>
   </div>
   @forelse ($clientes as $cliente)
      <div class="card col-xm-12 col-sm-6 col-lg-4">
         <div class="card-header">
            <h4 class="card-tittle">{{ Str::limit($cliente->name, 15);}}</h4>
         </div>
         <div class="card-body">
            <p>
               {{ $cliente->identity}}<br/>
               {{ $cliente->status}}<br/>
               {{ $cliente->birth}}<br/>
               {{ Str::limit($cliente->interest,30)}}<br/>
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


