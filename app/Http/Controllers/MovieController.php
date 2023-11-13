<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
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
            $peli= new peli;
            $fn  = $this->mposter($request);
            $this->igualar($peli,$request,$fn);
            return redirect()->route('pelicula.lista')->with('success','INSERCION SATISFACTORIA');
        }
        public function edit(Request $request){
            $pelicula = peli::find($request->id);
            return view ('movie.edit',['pelicula'=>$pelicula]);
        }
        public function update(Request $request){
            $peli=peli::find($request->id);
            $fn="";
            if($request->poster){
                $this->eliminar_poster($peli->poster);
                $fn  = $this->mposter($request);
            }
            $this->igualar($peli,$request,$fn);
            return redirect()->route('pelicula.lista')->with('success','INSERCION SATISFACTORIA');
        }
        public function show(Request $request){
            $pelicula = peli::find($request->id);
            return view ('movie.show',['pelicula'=>$pelicula]);
        }
        public function destroy(request $request){
            $pelicula = peli::find($request->id);
            $this->eliminar_poster($pelicula->poster);
            $pelicula->delete();
            return redirect()->route('pelicula.lista')->with('danger','pelicula borrada');
        }
        public function mposter($request){
            $archivo = $request->file('poster');
            $extencion = $archivo->extension();
            $filename=time().$request->poster->getfilename().".".$extencion;
            $archivo->move(public_path('/img/poster/'),$filename);
            return($filename);
        }   
        public function eliminar_poster($poster){
            $rutaArchivo = 'img/poster/'.$poster;
            if (File::exists($rutaArchivo)) {
                File::delete($rutaArchivo);
            }
        }
        public function igualar($peli,$request,$fn){
            $peli->name=$request->name;
            $peli->duration=$request->duration;
            $peli->director=$request->director;
            $peli->genre=$request->genre;
            $peli->classification=$request->classification;
            if($fn!=""){$peli->poster=$fn;}
            $peli->synopsis=$request->synopsis;
            $peli->status=$request->status;
            $peli->existence=$request->existence;
            $peli->availability=$request->availability;
            $peli->save();
        }
    }
