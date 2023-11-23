@csrf
<div class="form-group col-5 d-inline-block"> 
    <label for="name">Nombre</label>
    <input class="form-control form-control-sm" type="search" name="name" id="name" autocomplete="off" maxlength="30" required wire:model="name"/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="duration">Duración</label>
    <input class="form-control form-control-sm" wire:model="duration" type="number" name="duration" id="duration" required/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="status">Estatus</label>
    <input type="search" name="status" id="status" autocomplete="off" wire:model="status" maxlength="12" class="form-control form-control-sm" required/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="director">Director</label>
    <input class="form-control form-control-sm" autocomplete="off" wire:model="director" type="search" name="director" id="director" maxlength="30" required/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="genre">Genero</label>
    <input class="form-control form-control-sm" autocomplete="off" wire:model="genre" type="search" name="genre" id="genre" maxlength="30" required/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="classification">Clasificación</label>
    <select name="classification" id="classification" class="form-control form-control-sm" required wire:model="classification">
        <option value="" >--</option>
        <option value="U">Todo Público</option>
        <option value="PG">Documentales</option>
        <option value="12A">Mayores de 12</option>
        <option value="15A">Mayores de 15</option>
        <option value="18A">Mayores de 18</option>
        <option value="18R">Reservado</option>
    </select>    
</div>
<div class="form-group col-11 d-inline-block"> 
    <label for="synopsis">Synopsis</label>
    <textarea name="synopsis" id="synopsis" autocomplete="off" maxlength="300" class="form-control form-control-sm" required wire:model="synopsis"></textarea>
</div>
<div class="form-group col-4 d-inline-block"> 
    <label for="existence">Existencia</label>
    <input type="number" name="existence" id="existence" autocomplete="off" wire:model="existence"  min="1" max="100" required class="form-control form-control-sm"/>
</div>
<div class="form-group col-4 d-inline-block"> 
    <label for="availability">Disponibilidad</label>
    <input type="number" name="availability" id="availability" autocomplete="off" wire:model="availability"  min="0" max="100" required class="form-control form-control-sm" />
</div>
<div class="form-group col-3 d-inline-block">
    <label for="poster" class="selector_imagen">Seleccionar Imagen de Portada</label>
    @if(isset($pelicula))
        <input type="file" class="inputImagen" name="poster" id="poster" wire:model="poster" onchange="previewImage(event, '#imgPreview')"/>
    @else
        <input type="file" class="inputImagen" name="poster" id="poster" wire:model="poster" required onchange="previewImage(event, '#imgPreview')"/>
    @endif
</div>
<div id="imagen">
    <img id="imgPreview" class="imagenPreview" src="{{ isset($pelicula) ? '/img/poster/'.$pelicula->poster: '' }}" alt="Imagen Seleccionada">
</div>
@if ($db_operation=='create_movie')
    <button wire:click="store()">Aceptar</button>
@else
    <button wire:click="{{ 'update()' }}">Modificar</button>
@endif
<button wire:click="$set('db_operation','')">Cancelar</button>