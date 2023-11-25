<?php
    namespace App\Livewire\Customer;
    use Livewire\Component;
    use App\Models\Customer as mod_cliente;
    class Lista extends Component{
        public $clientes="";
        public $db_operation="";
        public $name;
        public $identity;
        public $status;
        public $birth;
        public $interest;
        public $clt;
        public $tituloModal;
        public function create(){
            $this->db_operation="crear";
            $this->tituloModal="Agregar Nuevo Cliente";
            $this->name="";
            $this->identity="";
            $this->status="";
            $this->birth="";
            $this->interest="";
        }
        public function mount(){
            $this->clientes=mod_cliente::all();
        }
        public function modificar($id){
            $cliente_especifico =mod_cliente::find($id);
            $this->name         =$cliente_especifico->name;
            $this->identity     =$cliente_especifico->identity;
            $this->status       =$cliente_especifico->status;
            $this->birth        =$cliente_especifico->birth;
            $this->interest     =$cliente_especifico->interest;
            $this->clt          =$id;
            $this->db_operation="modificar";
            $this->tituloModal="Modificar Cliente Existente";
        }
        public function store(){
            $clie=new mod_cliente;
            $clie->name=$this->name;
            $clie->identity=$this->identity;
            $clie->status=$this->status;
            $clie->birth=$this->birth;
            $clie->interest=$this->interest;
            $clie->save();
            $this->clientes=mod_cliente::all();
            $this->name="";
            $this->identity="";
            $this->status="";
            $this->birth="";
            $this->interest="";
        }
        public function update($id){
            $clie = mod_cliente::find($id);
            $clie->name     =$this->name;
            $clie->identity =$this->identity;
            $clie->status   =$this->status;
            $clie->birth    =$this->birth;
            $clie->interest =$this->interest;
            $clie->save();
            $this->db_operation="";
            $this->clientes=mod_cliente::all();
        }
        public function destroy($id){
            $clie = mod_cliente::find($id); 
            $clie->delete();
            $this->clientes=mod_cliente::all();
        }
        public function render(){
            return view('livewire.customer.lista')
                ->extends('layout.master')
                ->section('contenido');
        }
    }
