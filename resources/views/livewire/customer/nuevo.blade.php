@csrf
<div class="form-group col-5 d-inline-block"> 
    <label for="name">Nombre</label>
    <input class="form-control form-control-sm" type="search" name="name" id="name" maxlength="30" required wire:model="name"/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="duration">Documento de Identidad</label>
    <input class="form-control form-control-sm" type="number" name="identity" id="identity" required wire:model="identity"/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="status">Estatus</label>
    <select class="form-control form-control-sm" name="status" id="status" required wire:model="status">
        <option value="">--</option>
        <option>inactivo</option>
        <option>activo</option>
        <option>amonestado</option>
        <option>betado</option>
    </select>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="birth">Dia de Nacimiento</label>
    <input class="form-control form-control-sm" type="date" name="birth" id="birth" wire:model="birth"/>
</div>
<div class="form-group col-10 d-inline-block"> 
    <label for="interest">Intereses</label>
    <textarea class="form-control form-control-sm" cols="30" rows="3" name="interest" id="interest" wire:model="interest" required></textarea>
</div>
@if ($db_operation=='crear')
    <button wire:click="store()">Aceptar</button>
@else
    <button wire:click="{{ 'update('.$clt.')' }}">Modificar</button>
@endif
<button wire:click="$set('db_operation','')">Cancelar</button>