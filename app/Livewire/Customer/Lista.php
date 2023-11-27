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
        public $fil_nombre;
        public $fil_cedula;
        public $fil_status;
        public $fil_edad;
        public $errores = [];
        public function create(){
            $this->db_operation="crear";
            $this->tituloModal="Agregar Nuevo Cliente";
            $this->limpiar();
        }
        public function mount(){
            $this->clientes=mod_cliente::all();
        }
        public function modificar($id){
            $clie =mod_cliente::find($id);
            $this->name     =$clie->name;
            $this->identity =$clie->identity;
            $this->status   =$clie->status;
            $this->birth    =$clie->birth;
            $this->interest =$clie->interest;
            $this->clt      =$id;
            $this->db_operation="modificar";
            $this->tituloModal="Modificar Cliente Existente";
        }
        public function validar(){
            $this->validate([
                "name"=>['required','string','min:10','max:60'],
                "identity"=>['numeric','required' ],
                "status"=>['required'],
                "birth"=>['required','date'],
                "interest"=>['nullable'],
            ], [
                "name.required" => 'EL NOMBRE DEL CLIENTE ES OBLIGATORIO',
                "name.min" => 'EL NOMBRE DEL CLIENTE DEBE TENER MÍNIMO 10 CARACTERES',
                "name.max" => 'EL NOMBRE DEL CLIENTE DEBE TENER MÁXIMO 60 CARACTERES',
                "identity.numeric" => 'EL DOCUMENTO DE IDENTIDAD DEBE SER NUMÉRICO',
                'identity.required' => 'EL DOCUMENTO DE IDENTIDAD DEL CLIENTE ES OBLIGATORIO',
                "status.required" => 'EL ESTATUS DEL CLIENTE ES OBLIGATORIO',
                "birth.required" => 'LA FECHA DE NACIMIENTO DEL CLIENTE ES OBLIGATORIA',
                "birth.date" => 'LA FECHA DE NACIMIENTO DEL CLIENTE DEBE SER UNA FECHA',
            ]);
        }
        public function store(){
            $this->validar();
            $clie = new mod_cliente;
            $this->igualar($clie);
            $this->clientes = mod_cliente::all();
            $this->limpiar();
        }
        public function update($id){
            $this->validar();
            $clie = mod_cliente::find($id);
            $this->igualar($clie);
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
        public function filtrar(){
            $query = mod_cliente::query();
            if (!empty($this->fil_nombre)) {$query->where('name', 'like', '%' . $this->fil_nombre . '%');}
            if (!empty($this->fil_cedula)) {$query->where('identity', 'like', '%' . $this->fil_cedula . '%');}
            if (!empty($this->fil_status)) {$query->where('status', '=', $this->fil_status);}
            if (!empty($this->fil_edad)) {
                $fechaNacimiento = now()->subYears($this->fil_edad);
                $query->where('birth', '<=', $fechaNacimiento);
            }
            $this->clientes = $query->get();
        }
        /*----------------------------------------------------*/
        public function limpiar(){
            $this->name="";
            $this->identity="";
            $this->status="";
            $this->birth="";
            $this->interest="";
        }
        public function igualar($clie){
            $clie->name     =$this->name;
            $clie->identity =$this->identity;
            $clie->status   =$this->status;
            $clie->birth    =$this->birth;
            $clie->interest =$this->interest;
            $clie->save();
        }
    }
