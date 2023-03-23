<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use PragmaRX\Google2FA\Google2FA;
use App\Models\Rol;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\RendererStyle\RendererStyleInterface;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Encoder\QrCode;

class customAuthController extends Controller
{
    public function login(){
        return view("auth.loginUser");
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
            'password' =>'required|min:8|max:16'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($request->rol){
            $google2fa = new Google2FA();
            $user->google2fa_secret = $google2fa->generateSecretKey();
            $res = $user->save();

            $rol = new Rol();
            $rol->IdUsuario = $user->id;
            $rol->rol = $request->rol;
            $rol->save();

            if($res){
                return view('admin.mostrar-token', ['qrCode' => $user->google2fa_secret]);
            }
        }
        else{
            $res = $user->save();
            $rol = new Rol();
            $rol->IdUsuario = $user->id;
            $rol->rol = 3;
            $rol->save();

            if($res){
                return view('usuario.completaregistro', ['user' => $user]);
            }
            
        }
        return back()->with('No registrado', 'No se ha logrado registrar.');
        
    }

    public function loginUser(Request $request){
        $error = $request->validate
        ([
            'email' =>'required',
            'password' =>'required|min:8|max:16',
            'one_time_password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        
        if($user)
        {
            if(!Hash::check($request->password, $user->password))
            {
                return back()->with('No ingresado', 'Contraseña errónea.');
               
            }
            else
            {
                $google2fa = new Google2FA();

                if ($user->google2fa_secret) {
                    $valid = $google2fa->verifyKey($user->google2fa_secret, $request->one_time_password);

                    if (!$valid) {
                        return redirect()->back()->withErrors(['one_time_password' => 'The two-factor authentication code is invalid.']);
                    }
                }
                $request->Session()->put('loginId', $user->id);
                $request->session()->put('user', $user);
                return redirect('dashboard');
            }
        }
        else
        {
            return back()->with('No ingresado', 'Los datos no coinciden o son erróneos.');
        }
    }

    public function loginUsuario(Request $request){
        $error = $request->validate
        ([
            'email' =>'required',
            'password' =>'required|min:8|max:16'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if($user->esAdmin($user->id) || $user->esVendedor($user->id)){
            return redirect()->to('/administrative/login');
        }

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
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first(); 
        }
        return view('home.home', ['data' => $data]);
    }

    public function logout(){
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
