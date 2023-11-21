<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function authorize(): bool{return true;}
    public function rules(): array{
        return [
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
        ];
    }
    public function messages(){
        return [
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

        ];
    }

}
