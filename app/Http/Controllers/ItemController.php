<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Imports\ItemsImport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    public function show(){
        $items = Item::all();
        return view('Inventario.mostrar-items', ['items' => $items]);
    }

    public function addItem(){
        $items = Item::all();
        return view('Inventario.agregar-item', ['items' => $items]);
    }

    public function addItems(){
        $items = Item::all();
        return view('Inventario.agregar-items', ['items' => $items]);
    }

    public function agregarItem(Request $request){
        Item::create($request->except('_token'));
        return view('Inventario.agregar-item', ['items' => Item::all()]);
    }

    public function agregarItems(Request $request){
        $arr = Excel::toArray(new ItemsImport, $request->file('archivo'));
        for($x = 1; $x < count($arr[0]); $x++){
            $insert = ['CodigoProducto' => $arr[0][$x][0],
                        'CodigoDeBarras' => $arr[0][$x][1],
                        'PrecioProducto' => $arr[0][$x][2],
                        'NombreProducto' => $arr[0][$x][3],
                        'Cantidad'       => $arr[0][$x][4]
                ];
            Item::updateOrCreate($insert);
        }
        return view('Inventario.agregar-items', ['items' => Item::all()]);
    }

    public function getInfoItem($id){
        return view('Inventario.modificar-item', ['items' => Item::find($id)]);
    }
    
    public function updateItem(Request $request){
        // return response()->json($request);
        Item::where('CodigoProducto', '=', $request->CodigoProducto)->update($request->except(['CodigoProducto', '_token']));
        return redirect()->to('/inventario/mostrar/items');
    }

    public function deleteItem(Request $request, $id){
        Item::find($id)->delete();
        return redirect()->to('/inventario/mostrar/items');
    }

    public function getItemNameAndPrice2(Request $request){
        $codigoDeBarras = 51541845;
        $item = Item::where('CodigoDeBarras', $codigoDeBarras)->firstOrFail();
        return response()->json($item);
    }

    public function getItemNameAndPrice(Request $request){
        $codigoDeBarras = $request->input('codigoDeBarras');
        $item = Item::where('CodigoDeBarras', $codigoDeBarras)->firstOrFail();
        return response()->json($item);
    }
}