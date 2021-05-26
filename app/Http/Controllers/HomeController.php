<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos;
use App\Enderecos;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //recupero o id do usuario logado
        $id_user = Auth::user()->id;

        //select * from users where id= id_passado
        $user = User::find($id_user);

        //busco os dados pela chave estrangeira
        $contact = Contatos::where('id_user',$id_user)->get();
        $address = Enderecos::where('id_user',$id_user)->get();

        //dd($contact,$address);

        return view('home', compact('user','contact','address'));
    }
}
