<?php
    namespace App\Livewire\Customer;
    use Livewire\Component;
    use App\Models\Customer as mod_cliente;
    class Lista extends Component{
        public $clientes="";
        public $db_operation="";
        public $cliente_especifico;
        public $name;
        public $identity;
        public $status;
        public $birth;
        public $interest;
        public function create(){
            $this->db_operation="crear";
            unset($this->cliente_especifico);
        }
        public function mount(){
            $this->clientes=mod_cliente::all();
        }
        public function modificar($id){
            $this->cliente_especifico=mod_cliente::find($id);
            $this->db_operation="modificar";
        }
        public function store(){
            
        }
        public function update($id){
            
        }
        public function render(){
            return view('livewire.customer.lista')
                ->extends('layout.master')
                ->section('contenido');
        }

    }
