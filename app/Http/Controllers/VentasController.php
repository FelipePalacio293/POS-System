<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\DetalleVenta;
use App\Models\Item;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VentasExport;

class VentasController extends Controller
{
    public function show(){
        $ventas = Ventas::all();
        return view('Ventas.mostrar-ventas', ['ventas' => $ventas]);
    }

    public function realizarVenta(Request $request){
        if($request->ajax()){
            // return $request->valores[0]['nombre'];
            $venta = Ventas::create(['Sede' => 1, 'Caja' => 1, 'NumeroProductos' => count($request->valores), 
                            'TotalItems' => 0, 'TotalParcial' => 0, 'iva' => 0, 
                            'TotalDescuento' => 0, 'TotalVenta' => 0, 'IdVendedor' => 2, 
                            'IdCliente' => 1
                            ]);

            for($x = 0; $x < count($request->valores); $x++){
                $insert = [
                    'IdVenta'                => $venta->id,
                    'CodigoProducto'         => $request->valores[$x]['nombre'],
                    'CantidadProducto'       => $request->valores[$x]['email'],
                    'PrecioItem'             => $request->valores[$x]['email'] * Item::find($request->valores[$x]['email'])->PrecioProducto
                ];
                DetalleVenta::create($insert);
            }
        }
    }

    public function generarReporteDeVentas(Request $request){
        $fileName = 'today_sales_' . date('Ymd') . '.xlsx';
        return Excel::download(new VentasExport, $fileName);
    }
}
