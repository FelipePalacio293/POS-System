<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function show(){
        $clientes = Cliente::all();
        return view('Clientes.mostrar-clientes', ['clientes' => $clientes]);
    }

    public function venderProductos(Request $request){
        
        return redirect()->to('/');
    }
}
