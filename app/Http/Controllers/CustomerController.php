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
}
