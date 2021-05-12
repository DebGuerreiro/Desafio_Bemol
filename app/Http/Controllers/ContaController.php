<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos;
use App\Enderecos;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class ContaController extends Controller
{
    public function cadastrar(){
        return view('cadastro');
    }
    public function salvarCadastro(Request $request){
        
        $nova_conta = $request->except('_token');

        try{
            $nova_conta['password'] =  Hash::make($nova_conta['password']);
            $nova_conta['cpf'] = $this->tirarMask($nova_conta['cpf']);
            $nova_conta['cep'] = $this->tirarMask($nova_conta['cep']);
            $nova_conta['tel_resid'] = $this->tirarMask($nova_conta['tel_resid']);
            $nova_conta['tel_cel'] = $this->tirarMask($nova_conta['tel_cel']);
            
            // dd($nova_conta);
            $setUser = User::create($nova_conta);
            $id_user = $setUser->id;
            $nova_conta['id_user'] = $id_user;
            
            Contatos::create($nova_conta);
            Enderecos::create($nova_conta);            

            return redirect('/login')->with(['status' => 'Cadastrado com sucesso']);
        }        
        catch(Exception $e){

            return "erro ao criar conta: {$e->getMessage()}";
        }        
        
    }
    private function tirarMask($var){  

        $var = str_replace('.', '', $var);
        $var = str_replace('/', '', $var);
        $var = str_replace('-', '', $var);
        $var = str_replace('(', '', $var);
        $var = str_replace(')', '', $var);                        

        return $var;
    }
}
