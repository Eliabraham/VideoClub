<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Movie as peli;
class MovieController extends Controller
{
    public function index(){
        $peliculas = peli::all();
        return view ('ruta.vista',['peliculas'=>$peliculas]);
    }
    public function create(){}
    public function store(){}
    public function edit(){}
    public function update(){}
    public function show(){}
    public function destroy(){}
}
