<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"=>['required','string','min:10','max:60'],
            "identity"=>['numeric','required' ],
            "status"=>['required'],
            "birth"=>['required','date'],
            "interest"=>['nullable'],
        ];
    }
    public function messages(){
        return [
            "name.required"=>'EL NOMBRE DEL CLIENTE ES OBLIGATORIO',
            "name.min"=>'EL NOMBRE DEL CLIENTE DEBE TENER MINIMO 10 CARACTERES',
            "name.max"=>'EL NOMBRE DEL CLIENTE DEBE TENER MAXIMO 60 CARACTERES',
            "identity.numeric"=>'EL DOCUMENTO DE IDENTIDAD DEBE SER NUMERICO',
            'identity.required'=>'EL DOCUMENTO DE IDENTIDAD DEL CLIENTE ES OBLIGATORIO',
            "status.required"=>'EL ESTATUS DEL CLIENTE ES OBLIGATORIO',
            "birth.required"=>'LA FECHA DE NACIMIENTO DEL CLIENTE ES OBLIGATORIO',
            "birth.date"=>'LA FECHA DE NACIMIENTO DEL CLIENTE debe ser una fecha',
        ];
    }
}
