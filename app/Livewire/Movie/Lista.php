<?php
    namespace App\Livewire\Movie;

    use Livewire\Component;
    use Livewire\WithFileUploads; 
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
        public $synopsis;
        public $status;
        public $existence;
        public $availability;
        public $archname;	
        public $archextencion;

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
        }
        public function store(){


            /*public function mposter($request){
                $archivo = $request->file('poster');
                $extencion = $archivo->extension();
                $filename=time().$request->poster->getfilename().".".$extencion;
                $archivo->move(public_path('/img/poster/'),$filename);
                return($filename);
            }*/   

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
            $archextencion=$this->poster->extension();
            $pelicula->poster=$archname;
            $this->poster->storeAs(public_path('/img/poster/'),$pelicula->poster);
            $pelicula->save();
            $this->peliculas=mod_pelicula::all();
        }
        public function render(){
            return view('livewire.movie.lista')
                ->extends('layout.master')
                ->section('contenido');
        }
    }
