<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    public function show(){
        $vendedores = Vendedor::all();
        return view('Vendedores.mostrar-vendedores', ['vendedores' => $vendedores]);
    }

    public function showAdmin(){
        $vendedores = Vendedor::all();
        return view('Admin.addvendedores', ['vendedores' => $vendedores]);
    }

    public function aniadirVendedor(Request $request){
        $vend = Vendedor::create($request->except('_token'));
        return view('Admin.addvendedores', ['vendedores' => Vendedor::all()]);
    }

    public function getInfoVendedor($id){
        return view('/Vendedores/update-vendedores', ['vendedor' => Vendedor::find($id)]);
    }

    public function updateVendedor(Request $request){
        Vendedor::where('id', '=', $request->id)->update($request->except(['_token']));
        return redirect()->to('/vendedor/mostrar');
    }

    public function eliminarVendedor(Request $request, $id){
        Vendedor::find($id)->delete();
        return redirect()->to('/vendedor/mostrar');
    }
}
