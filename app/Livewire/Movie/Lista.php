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
            $pelicula=mod_pelicula::find($id);
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
    }
