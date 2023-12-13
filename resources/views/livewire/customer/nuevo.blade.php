<div class="pmodal"></div>
<div class="fmodal">
    @csrf
    <div class="modalp-head">
        <h3>{{ $tituloModal }}</h3>
    </div>
    <div class="modalp-body row">  
        <div class="form-group col-6 d-inline-block"> 
            <label for="name">Nombre</label>
            <input class="form-control form-control-sm" type="search" name="name" id="name" maxlength="30" autocomplete="off" wire:model="name"/>
        </div>
        <div class="form-group col-6 d-inline-block"> 
            <label for="duration">Documento de Identidad</label>
            <input class="form-control form-control-sm" autocomplete="off" type="number" name="identity" id="identity" wire:model="identity"/>
        </div>
        <div class="form-group col-6 d-inline-block"> 
            <label for="status">Estatus</label>
            <select class="form-control form-control-sm" name="status" id="status" required wire:model="status">
                <option value="">--</option>
                <option>inactivo</option>
                <option>activo</option>
                <option>amonestado</option>
                <option>betado</option>
            </select>
        </div>
        <div class="form-group col-6 d-inline-block"> 
            <label for="birth">Dia de Nacimiento</label>
            <input class="form-control form-control-sm" autocomplete="off" type="date" name="birth" id="birth" wire:model="birth"/>
        </div>
        <div class="form-group col-12 d-inline-block"> 
            <label for="interest">Intereses</label>
            <textarea class="form-control form-control-sm" cols="30" rows="3" name="interest" id="interest" wire:model="interest"></textarea>
        </div>
    </div>
    <div class="modalp-footer">  
        @if ($db_operation=='crear')
            <button class="btn btn-sm btn-primary" wire:click="store()">Aceptar</button>
        @else
            <button class="btn btn-sm btn-primary" wire:click="{{ 'update('.$clt.')' }}">Modificar</button>
        @endif
        <button class="btn btn-sm btn-secondary" wire:click="$set('db_operation','')">Cancelar</button>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mensajes">
            <button class="close-alert" onclick="close_alert(this)">
                <span aria-hidden="true"><i class="far fa-times"></i></span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  
</div>
