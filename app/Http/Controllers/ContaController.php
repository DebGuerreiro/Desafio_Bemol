<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos;
use App\Enderecos;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    public function __contruct(){

        $this->middleware('auth')->except(['cadastrar','salvarCadastro']);
    }

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

            return redirect('/login')->with(['status' => 'Cadastro realizado com sucesso!']);
        }        
        catch(Exception $e){

            return "erro ao criar conta: {$e->getMessage()}";
        }        
        
    }

    public function editarConta(){

        $id_user = Auth::user()->id;

        $user = User::find($id_user);
        $contact = Contatos::where('id_user',$id_user)->get();
        $address = Enderecos::where('id_user',$id_user)->get();

        //dd($contact,$address);

        return view('editar', compact('user','contact','address'));
    }

    private function tirarMask($var){  

        $var = str_replace('.', '', $var);
        $var = str_replace('/', '', $var);
        $var = str_replace('-', '', $var);
        $var = str_replace('(', '', $var);
        $var = str_replace(')', '', $var);                        

        return $var;
    }

    public function atualizarCadastro(Request $request){
        
        $conta = $request->except('_token');

        try{

            $user['name'] = $conta['name'];
            $user['email'] = $conta['email'];
            $user['cpf'] = $conta['cpf'];
           
            $contact['ddd'] = $conta['ddd'];
            $contact['tel_resid'] = $conta['tel_resid'];
            $contact['tel_cel'] = $conta['tel_cel'];   

            $address['cep'] = $conta['cep'];
            $address['logradouro'] = $conta['logradouro'];
            $address['bairro'] = $conta['bairro'];
            $address['complemento'] = $conta['complemento'];
            $address['numero'] = $conta['numero'];
            $address['uf'] = $conta['uf'];
            $address['localidade'] = $conta['localidade'];
        
            User::where('id', Auth::user()->id)->update($user);
            Contatos::where('id_user', Auth::user()->id)->update($contact);
            Enderecos::where('id_user', Auth::user()->id)->update($address);

            return redirect('/home')->with(['status' => 'Conta editada com sucesso!']);
        }        
        catch(Exception $e){

            return "erro ao editar conta: {$e->getMessage()}";
        }        
        
    }

    public function excluirConta(){

        $id_user = Auth::user()->id;

        $contact = Contatos::where('id_user',$id_user)->delete();
        $address = Enderecos::where('id_user',$id_user)->delete();
        $user = User::where('id',$id_user)->delete();
        

        Auth::logout();
        
        return redirect('/login');
    }
}
