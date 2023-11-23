<script src="{{ asset('js/js.js') }}"></script>
@csrf
<div class="form-group col-5 d-inline-block"> 
    <label for="name">Nombre</label>
    <input class="form-control form-control-sm" type="search" name="name" id="name" autocomplete="off" maxlength="30" required value="{{ isset($pelicula) ? $pelicula->name: '' }}"/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="duration">Duración</label>
    <input class="form-control form-control-sm" value="{{ isset($pelicula) ? $pelicula->duration: '' }}" type="number" name="duration" id="duration" required/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="status">Estatus</label>
    <input type="search" name="status" id="status" autocomplete="off" value="{{ isset($pelicula) ? $pelicula->status: '' }}" maxlength="12" class="form-control form-control-sm" required/>
</div>
<div class="form-group col-5 d-inline-block"> 
    <label for="director">Director</label>
    <input class="form-control form-control-sm" autocomplete="off" value="{{ isset($pelicula) ? $pelicula->director: '' }}" type="search" name="director" id="director" maxlength="30" required/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="genre">Genero</label>
    <input class="form-control form-control-sm" autocomplete="off" value="{{ isset($pelicula) ? $pelicula->genre: '' }}" type="search" name="genre" id="genre" maxlength="30" required/>
</div>
<div class="form-group col-3 d-inline-block"> 
    <label for="classification">Clasificación</label>
    <select name="classification" id="classification" class="form-control form-control-sm" required>
        <option value="" {{ isset($pelicula) && $pelicula->classification == '' ? 'selected' : '' }}>--</option>
        <option value="U" {{ isset($pelicula) && $pelicula->classification == 'U' ? 'selected' : '' }}>Todo Público</option>
        <option value="PG" {{ isset($pelicula) && $pelicula->classification == 'PG' ? 'selected' : '' }}>Documentales</option>
        <option value="12A" {{ isset($pelicula) && $pelicula->classification == '12A' ? 'selected' : '' }}>Mayores de 12</option>
        <option value="15A" {{ isset($pelicula) && $pelicula->classification == '15A' ? 'selected' : '' }}>Mayores de 15</option>
        <option value="18A" {{ isset($pelicula) && $pelicula->classification == '18A' ? 'selected' : '' }}>Mayores de 18</option>
        <option value="18R" {{ isset($pelicula) && $pelicula->classification == '18R' ? 'selected' : '' }}>Reservado</option>
    </select>    
</div>
<div class="form-group col-11 d-inline-block"> 
    <label for="synopsis">Synopsis</label>
    <textarea name="synopsis" id="synopsis" autocomplete="off" maxlength="300" class="form-control form-control-sm" required>{{ isset($pelicula) ? $pelicula->synopsis: '' }}</textarea>
</div>
<div class="form-group col-4 d-inline-block"> 
    <label for="existence">Existencia</label>
    <input type="number" name="existence" id="existence" autocomplete="off" value="{{ isset($pelicula) ? $pelicula->existence: '' }}"  min="1" max="100" required class="form-control form-control-sm"/>
</div>
<div class="form-group col-4 d-inline-block"> 
    <label for="availability">Disponibilidad</label>
    <input type="number" name="availability" id="availability" autocomplete="off" value="{{ isset($pelicula) ? $pelicula->availability: '' }}"  min="0" max="100" required class="form-control form-control-sm" />
</div>
<div class="form-group col-3 d-inline-block">
    <label for="poster" class="selector_imagen">Seleccionar Imagen de Portada</label>
    @if(isset($pelicula))
    <input type="file" class="inputImagen" name="poster" id="poster" onchange="previewImage(event, '#imgPreview')"/>
    @else
    <input type="file" class="inputImagen" name="poster" id="poster" required onchange="previewImage(event, '#imgPreview')"/>
    @endif
</div>
<div id="imagen">
    <img id="imgPreview" class="imagenPreview" src="{{ isset($pelicula) ? '/img/poster/'.$pelicula->poster: '' }}" alt="Imagen Seleccionada">
</div>