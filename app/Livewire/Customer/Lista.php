<?php
    namespace App\Livewire\Customer;
    use Livewire\Component;
    use App\Models\Customer as mod_cliente;
    class Lista extends Component{
        public $clientes="";
        public $db_operation="";
        public function start_db_operation(){
            $db_operation="create";
        }
        public function mount(){
            $this->clientes=mod_cliente::all();
        }
        public function render(){
            return view('livewire.customer.lista')
                ->extends('layout.master')
                ->section('contenido');
        }
    }
