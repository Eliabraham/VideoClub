<?php

namespace App\Http\Controllers;

use App\Models\Contact as contacto;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function new($cliente){
        $contacto=contacto::where('customer_id','=',$cliente)->get();
        return view ('contact.new',['contactos'=>$contacto, 'cliente'=>$cliente]);
    }
    public function store(Request $request, $cliente){
        $contacto=new contacto;
        $contacto->customer_id=$cliente;
        $contacto->type=$request->type;
        $contacto->valor=$request->valor;
        $contacto->status=$request->status;
        $contacto->save();
        $contacto=contacto::where('customer_id','=',$cliente)->get();
        return view ('contact.new',['contactos'=>$contacto, 'cliente'=>$cliente]);
        //return redirect()->route('contacto.create',['cliente'=>$cliente])->with('success','ACCION REALIADA SATISFACTORIAMENTE');
    }
    public function destroy(request $request){
        $contacto = contacto::find($request->id); 
        $contacto->delete(); 
        $contacto=contacto::where('customer_id','=',$request->cliente)->get();
        return view ('contact.new',['contactos'=>$contacto, 'cliente'=>$request->cliente]);
    }
}
