<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class customAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $error = $request->validate
        ([
            'name' =>'required|unique:users',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:8|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res)
{
            return back()->with('Registrado', 'Se ha registrado con éxito.');
        }
        else
        {
            return back()->with('No registrado', 'No se ha logrado registrar.');
        }
    }

    public function loginUser(Request $request){
        $error = $request->validate
        ([
            'name' =>'required',
            'password' =>'required|min:8|max:12'
        ]);

        $user = User::where('name', '=', $request->name)->first();
        
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->Session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else
            {
                return back()->with('No ingresado', 'Contraseña errónea.');
            }
        }
        else
        {
            return back()->with('No ingresado', 'Los datos no coinciden o son erróneos.');
        }
    }

    public function dashboard(){
        return 'Bienvenido al sistema de ventas POS del grupo TOXICS!';
    }
}
