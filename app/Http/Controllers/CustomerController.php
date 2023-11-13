<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Customer as clie;
    class CustomerController extends Controller
    {
        public function index(){
            $clie=clie::all();
            return view ('customer.index',['clientes'=>$clie]);
        }
        public function create(){
            return view ('customer.new');
        }
        public function store(Request $request){
            $clie=new clie;
            $this->igualar($clie,$request);
            return redirect()->route('cliente.lista')->with('success','ACCION REALIADA SATISFACTORIAMENTE');
        }
        public function edit(Request $request){
            $cliente = clie::find($request->id);
            return view ('customer.edit',['cliente'=>$cliente]);
        }
        public function update(Request $request){
            $clie=clie::find($request->id);
            $this->igualar($clie,$request);
            return redirect()->route('cliente.lista')->with('success','ACCION REALIADA SATISFACTORIAMENTE');
        }
        public function show(Request $request){
            $cliente = clie::find($request->id);
            return view ('customer.show',['cliente'=>$cliente]);
        }
        public function igualar($clie,$request){
            $clie->name=$request->name;
            $clie->identity=$request->identity;
            $clie->status=$request->status;
            $clie->birth=$request->birth;
            $clie->interest=$request->interest;
            $clie->save();
        }
        public function destroy(request $request){
            $clie = clie::find($request->id); 
            $clie->delete(); 
            return redirect()->route('cliente.lista')->with('danger','cliente borrado');
        }
}
