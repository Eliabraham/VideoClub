<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Movie as peli;
    class MovieController extends Controller
    {
        public function index(){
            $peliculas = peli::all();
            return view ('movie.index',['peliculas'=>$peliculas]);
        }
        public function create(){
            return view ('movie.new');
        }
        public function store(request $request){
            $peli=new peli;
            $peli->name=$request->name;
            $peli->duration=$request->duration;
            $peli->director=$request->director;
            $peli->genre=$request->genre;
            $peli->classification=$request->classification;
            $peli->poster=$request->poster;
            $peli->synopsis=$request->synopsis;
            $peli->status=$request->status;
            $peli->existence=$request->existence;
            $peli->availability=$request->availability;
            $peli->save();
            return redirect()->route('pelicula.lista')->with('success','INSERCION SATISFACTORIA');
        }
        public function edit(Request $request){
            $pelicula = peli::find($request->id);
            return view ('movie.edit',['pelicula'=>$pelicula]);
        }
        public function update(Request $request){
            $peli=peli::find($request->id);
            $peli->name=$request->name;
            $peli->duration=$request->duration;
            $peli->director=$request->director;
            $peli->genre=$request->genre;
            $peli->classification=$request->classification;
            $peli->poster=$request->poster;
            $peli->synopsis=$request->synopsis;
            $peli->status=$request->status;
            $peli->existence=$request->existence;
            $peli->availability=$request->availability;
            $peli->save();
            return redirect()->route('pelicula.lista')->with('success','INSERCION SATISFACTORIA');
        }
        public function show(){}
        public function destroy(request $request){
            $pelicula = peli::find($request->id); 
            $pelicula->delete(); 
            return redirect()->route('pelicula.lista')->with('danger','pelicula borrada');
        }
    }
