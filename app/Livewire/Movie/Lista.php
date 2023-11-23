<?php
    namespace App\Livewire\Movie;
    use Livewire\Component;
    use App\Models\Movie as mod_pelicula;
    class Lista extends Component{
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
        public function render(){
            return view('livewire.movie.lista')
                ->extends('layout.master')
                ->section('contenido');
        }
    }