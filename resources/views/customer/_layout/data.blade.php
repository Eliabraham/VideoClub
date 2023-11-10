@csrf
<div class="form-group col-5 d-inline-block"> 
    <label for="name">Nombre</label>
    <input class="form-control form-control-sm" type="search" name="name" id="name" maxlength="30" required value="{{ isset($cliente) ? $pelicula->name: '' }}"/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="duration">Documento de Identidad</label>
    <input class="form-control form-control-sm" value="{{ isset($cliente) ? $pelicula->duration: '' }}" type="number" name="identity" id="identity" required/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="director">Estatus</label>
    <input class="form-control form-control-sm" value="{{ isset($cleinte) ? $pelicula->director: '' }}" type="search" name="status" id="status" maxlength="30" required/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="genre">Dia de Nacimiento</label>
    <input class="form-control form-control-sm" value="{{ isset($cliente) ? $pelicula->genre: '' }}" type="search" name="birth" id="birth" maxlength="30" required/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="genre">Intereses</label>
    <input class="form-control form-control-sm" value="{{ isset($cliente) ? $pelicula->genre: '' }}" type="search" name="interest" id="interest" maxlength="30" required/>
</div>

