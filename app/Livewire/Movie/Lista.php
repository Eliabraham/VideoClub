<?php
    namespace App\Livewire\Movie;
    use Livewire\Component;
    use Livewire\WithFileUploads;
    use Illuminate\Support\Facades\Storage;
    use App\Models\Movie as mod_pelicula;
    class Lista extends Component{
        use WithFileUploads;
        public $peliculas="";
        public $db_operation="";
        public $name;
        public $duration;
        public $director;
        public $genre;
        public $classification;
        public $poster;
        public $poster2;
        public $synopsis;
        public $status;
        public $existence;
        public $availability;
        public $archname;	
        public $archextencion;
        public $tituloModal;
        public $idp;
        public function mount(){
            $this->peliculas=mod_pelicula::all();
        }
        public function create(){
            $this->db_operation="create_movie";
            $this->name="";
            $this->duration="";
            $this->director="";
            $this->genre="";
            $this->classification="";
            $this->poster="";
            $this->synopsis="";
            $this->status="";
            $this->existence="";
            $this->availability="";
            $this->tituloModal="Agregar Pelicula Nueva";
        }
        public function store(){
            $this->validar();
            $pelicula=new mod_pelicula;
            $pelicula->name=$this->name;
            $pelicula->duration=$this->duration;
            $pelicula->director=$this->director;
            $pelicula->genre=$this->genre;
            $pelicula->classification=$this->classification;
            $pelicula->synopsis=$this->synopsis;
            $pelicula->status=$this->status;
            $pelicula->existence=$this->existence;
            $pelicula->availability=$this->availability;
            $archname=time().$this->poster->getClientOriginalName();
            $pelicula->poster=$archname;
            $this->poster->storeAs('public/img/poster',$pelicula->poster);
            $pelicula->save();
            $this->peliculas=mod_pelicula::all();
            $this->limpiar();
        }
        public function render(){
            return view('livewire.movie.lista')
                ->extends('layout.master')
                ->section('contenido');
        }
        public function modificar($id){
            $pelicula=mod_pelicula::find($id);
            $this->name             =$pelicula->name;
            $this->duration         =$pelicula->duration;
            $this->director         =$pelicula->director;
            $this->genre            =$pelicula->genre;
            $this->classification   =$pelicula->classification;
            $this->synopsis         =$pelicula->synopsis;
            $this->status           =$pelicula->status;
            $this->existence        =$pelicula->existence;
            $this->availability     =$pelicula->availability;
            $this->poster           ="";
            $this->poster2          =$pelicula->poster;
            $this->db_operation     ="update_movie";
            $this->tituloModal      ="Modificar Pelicula Existente";
            $this->idp              =$id;
        }
        public function update($id){
            $this->validar();
            $pelicula=mod_pelicula::find($id);
            $this->capturar($pelicula);
            $this->peliculas=mod_pelicula::all();
            $this->limpiar();
            $this->db_operation="";
        }
        public function destroy($id){
            $pelicula = mod_pelicula::find($id);
            Storage::delete('public/img/poster/'.$pelicula->poster);
            $pelicula->delete();
            $this->peliculas=mod_pelicula::all();
        }
        public function limpiar(){
            $this->name="";
            $this->duration="";
            $this->director="";
            $this->genre="";
            $this->classification="";
            $this->synopsis="";
            $this->status="";
            $this->existence="";
            $this->availability="";
            $this->poster="";
            $this->poster2="";
            $this->idp="";
        }
        public function validar(){
            $this->validate([
                "name"=>['required','min:10','max:60'],
                "duration"=>['required','numeric'],
                "director"=>['required','min:10','max:60'],
                "genre"=>['required'],
                "classification"=>['required',],
                "poster"=>['required',],
                "synopsis"=>['required','min:15','max:150'],
                "status"=>['required',],
                "existence"=>['required','numeric'],
                "availability"=>['required','numeric'],
            ], [
                'name.required'=>'debe ingresar el nombre de la pelicula',
                'name.min'=>'El nombre debe sera al menos de 10 caracteres de largo',
                'name.max'=>'El nombre no debe sobrepasar los 150 caracteres',
                'duration.required'=>'debe ingresar la duración de la pelicula',
                'duration.numeric'=>'la duración de la pelicula debe ser un numero',
                'director.required'=>'debe ingresar el director de la pelicula',
                'director.min'=>'debe ingresar un director de mas de 10 caracteres',
                'director.max'=>'debe ingresar un director de menos de 60 caracteres',
                'genre.required'=>'debe ingresar el genero de la pelicula',
                'classification.required'=>'debe ingresar la clasificacion de la pelicula',
                'poster.required'=>'debe seleccionar un poster para la pelicula',
                'synopsis.required'=>'debe ingresar un resumen de la pelicula',
                'synopsis.min'=>'el resumen debe ser minimo de 10 caracteres',
                'synopsis.max'=>'el maximo del resumen debe ser de 150 caracteres',
                'status.required'=>'debe ingresar el status de la pelicula',
                'existence.required'=>'debe ingresar la cantidad de copias que tenga',
                'existence.numeric'=>'la cantidad debe ser escrita en numeros arabigos',
                'availability.required'=>'debe ingresar las copias que tenga disponibles de esta pelicula',
                'availability.numeric'=>'la disponibilidad debe ser escrita en numeros arabigos',
            ]);
        }
        public function capturar($pelicula){
            if ($this->poster){
                Storage::delete('public/img/poster/'.$pelicula->poster);
                $archname=time().$this->poster->getClientOriginalName();
                $pelicula->poster=$archname;
                $this->poster->storeAs('public/img/poster',$pelicula->poster);
            }
            $pelicula->name=$this->name;
            $pelicula->duration=$this->duration;
            $pelicula->director=$this->director;
            $pelicula->genre=$this->genre;
            $pelicula->classification=$this->classification;
            $pelicula->synopsis=$this->synopsis;
            $pelicula->status=$this->status;
            $pelicula->existence=$this->existence;
            $pelicula->availability=$this->availability;
            $pelicula->save();
        }
        public function filtrar(){
            $query = mod_pelicula::query();
            if (!empty($this->fil_nombre)) {$query->where('name', 'like', '%' . $this->fil_nombre . '%');}
            if (!empty($this->fil_duracion)) {$query->where('duration', '=<',  $this->fil_duracion );}
            if (!empty($this->fil_status)) {$query->where('status', '=', $this->fil_status);}
            if (!empty($this->fil_director)) {$query->where('director', 'like', '%' . $this->fil_director . '%');}
            if (!empty($this->fil_genero)) {$query->where('genre', 'like', '%' . $this->fil_genero . '%');}
            if (!empty($this->fil_clasificacion)) {$query->where('classification', '=', $this->fil_clasificacion);}
            $this->pelicula = $query->get();
        }
    }
