<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function admins(){
        $admins = User::all();
        return view('admins', compact('admins'));
    }

    public function login(){

        return view('login');
    }


    public function auth(Request $request){
        if(Auth::attempt(['login' => $request->login, 'password' => $request->password])){
            return redirect()->route('home');
        }
        return redirect()->back()->withInput()->withErrors('Os dados informados não conferem');   
    }


    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->back();
        } 
    }

    public function perfil($id){

        $user =  User::find($id);
        return view('perfil', compact('user'));
        
    }

    public function update(UserFormRequest $request, $id){

        if(!$user =  User::find($id)){
            return redirect()->back();
        }
        

        $data = $request->only('name','login');
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('perfil', $id)->with('mensagem', 'Editado com Sucesso!');
    }
}

