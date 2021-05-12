<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function cadastrar(){
        return view('cadastro');
    }
    public function salvarCadastro(Request $request){
        dd($request->except('_token'));
    }
}
