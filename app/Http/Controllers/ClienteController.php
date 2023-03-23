<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{
    public function show(){
        $clientes = Cliente::all();
        return view('Clientes.mostrar-clientes', ['clientes' => $clientes]);
    }

    public function venderProductos(Request $request){
        
        return redirect()->to('/');
    }

    public function createCliente(Request $request, $id){
        $user = User::find($id);
        $cliente = Cliente::where('Correo', '=', $user->email)->first();
        if($cliente){
            $cliente->update($request->except(['_token']));
        }
        else{
            $cliente = new Cliente();
            $cliente->Nombres = $request->Nombre;
            $cliente->PrimerApellido = $request->PrimerApellido;
            $cliente->SegundoApellido = $request->SegundoApellido;
            $cliente->NumeroDePuntos = 0;
            $cliente->Correo = $user->email;
            $cliente->save();
        }
        return redirect()->to('/login');
    }

    public function getUserPoints(){
        
    }
}
