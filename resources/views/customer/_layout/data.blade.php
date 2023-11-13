@csrf
<div class="form-group col-5 d-inline-block"> 
    <label for="name">Nombre</label>
    <input class="form-control form-control-sm" type="search" name="name" id="name" maxlength="30" required value="{{ isset($cliente) ? $cliente->name: '' }}"/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="duration">Documento de Identidad</label>
    <input class="form-control form-control-sm" value="{{ isset($cliente) ? $cliente->identity: '' }}" type="number" name="identity" id="identity" required/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="status">Estatus</label>
    <select class="form-control form-control-sm" name="status" id="status" required>
        <option value="">--</option>
        <option {{ isset($cliente) && $cliente->status == 'inactivo' ? 'selected' : '' }}>inactivo</option>
        <option {{ isset($cliente) && $cliente->status == 'activo' ? 'selected' : '' }}>activo</option>
        <option {{ isset($cliente) && $cliente->status == 'amonestado' ? 'selected' : '' }}>amonestado</option>
        <option {{ isset($cliente) && $cliente->status == 'betado' ? 'selected' : '' }}>betado</option>
    </select>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="birth">Dia de Nacimiento</label>
    <input class="form-control form-control-sm" value="{{ isset($cliente) ? $cliente->birth: '' }}" type="date" name="birth" id="birth"/>
</div>
<div class="form-group col-10 d-inline-block"> 
    <label for="interest">Intereses</label>
    <textarea class="form-control form-control-sm" cols="30" rows="3" name="interest" id="interest" required>{{ isset($cliente) ? $cliente->interest: '' }}</textarea>
</div>