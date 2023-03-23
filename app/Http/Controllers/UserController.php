<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class UserController extends Controller
{
    public function show(){
        $user = User::all();
        // return response()->json($user);
        // return response()->json($user[0]->roles);

        return view('admin.addrol', ['users' => $user]);
    }

    public function delete(Request $request, $id){
        User::find($id)->delete();
        return redirect()->to('/admin/aniadir/rol');
    }

    public function update(Request $request, $id){
        return view('admin.changeuser', ['user' => User::find($id)]);
    }

    public function updateUser(Request $request, $id){
        // return response()->json($request);
        User::where('id', '=', $id)->update($request->except(['rol', '_token']));
        $rol = new Rol();
        $rol->IdUsuario = $id;
        $rol->rol = $request->rol;
        $res = $rol->save();
        return redirect()->to("/admin/aniadir/rol");
    }

    public function prueba(){
        $user = User::find(1);
        if ($user->isAdmin()) {
            return 'siuuu';
        } 
        else {
            return 'nouuu';
        }
    }
}
