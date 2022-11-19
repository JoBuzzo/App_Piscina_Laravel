<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function login(){

        if(!User::find(1)){
            User::create([
                'name' => 'Administrador',
                'admin' => 1,
                'password' => Hash::make('password'), 
                'remember_token' => Str::random(10),
            ]);
            return redirect()->route('login');
        }

        return view('login');
    }


    public function auth(Request $request){
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            return redirect()->route('index');
        }
        return redirect()->back()->withInput()->withErrors('Os dados informados não conferem');   
    }


    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->back();
        } 
    }

    public function perfil(){
        if(!$user =  User::find(1)){
            return redirect()->back('reservas');
        }
        return view('perfil', compact('user'));
        
    }

    public function update(UserFormRequest $request){

        if(!$user = User::find(1)){
            return redirect()->route('reservas');
        }
        

        $data = $request->only('name');
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('perfil');
    }
}
