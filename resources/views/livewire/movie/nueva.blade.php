<div class="pmodal"></div>
<div class="fmodal row">
    @csrf
    <div class="modalp-head col-12">
        <h3>{{ $tituloModal }}</h3>
    </div>
    <div class="modalp-body row">
        <div class="form-group col-6"> 
            <label for="name">Nombre</label>
            <input class="form-control form-control-sm" type="search" name="name" id="name" autocomplete="off" maxlength="30" required wire:model="name"/>
        </div>
        <div class="form-group col-3"> 
            <label for="duration">Duración</label>
            <input class="form-control form-control-sm" wire:model="duration" type="number" name="duration" id="duration" required/>
        </div>
        <div class="form-group col-3"> 
            <label for="status">Estatus</label>
            <input type="search" name="status" id="status" autocomplete="off" wire:model="status" maxlength="12" class="form-control form-control-sm" required/>
        </div>
        <div class="form-group col-6"> 
            <label for="director">Director</label>
            <input class="form-control form-control-sm" autocomplete="off" wire:model="director" type="search" name="director" id="director" maxlength="30" required/>
        </div>
        <div class="form-group col-3"> 
            <label for="genre">Genero</label>
            <input class="form-control form-control-sm" autocomplete="off" wire:model="genre" type="search" name="genre" id="genre" maxlength="30" required/>
        </div>
        <div class="form-group col-3"> 
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
        <div class="form-group col-12 "> 
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="synopsis" autocomplete="off" maxlength="300" class="form-control form-control-sm" required wire:model="synopsis"></textarea>
        </div>
        <div class="form-group col-4 "> 
            <label for="existence">Existencia</label>
            <input type="number" name="existence" id="existence" autocomplete="off" wire:model="existence"  min="1" max="100" required class="form-control form-control-sm"/>
        </div>
        <div class="form-group col-4 "> 
            <label for="availability">Disponibilidad</label>
            <input type="number" name="availability" id="availability" autocomplete="off" wire:model="availability"  min="0" max="100" required class="form-control form-control-sm" />
        </div>
        <div class="form-group col-4">
            <label for="poster" class="selector_imagen">Seleccionar Imagen de Portada</label>
            <div class="custom-file-upload">
                <input type="file" id="poster" class="inputImagen" name="poster" wire:model="poster" style="display: none;" />
                <button type="button" class="custom-upload-button btn btn-success btn-sm" onclick="document.getElementById('poster').click();">
                    Seleccionar Imagen
                </button>
                <span id="selectedFileName"></span>
            </div>
        </div>
            <p class="col-12">
                @if($poster)
                    <img src="{{ $poster->temporaryURL() }}" alt="poster" width="450">
                @endif
                @if($poster2)
                    <!--
                        para que este codigo funcione se debe crear un link simbolico con el comando
                        COMANDO: php artisan storage:link
                        COMANDO: ./vendor/bin/sail artisan storage:link
                    -->
                    <img src="{{ asset('storage/img/poster/'.$poster2) }}" alt="Nombre de la película" width="450"/>
                @endif
            </p>
            <div class="col-12">  
            @if ($db_operation=='create_movie')
                <button class="btn btn-sm btn-primary" wire:click="store()">Aceptar</button>
            @else
                <button class="btn btn-sm btn-primary" wire:click="update({{$idp}})">Modificar</button>
            @endif
            <button class="btn btn-sm btn-secondary" wire:click="$set('db_operation','')">Cancelar</button>
        </div>
    </div>
</div>
