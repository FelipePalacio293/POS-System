<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\DetalleVenta;
use App\Models\Item;
use App\Models\Cliente;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VentasExport;
use Illuminate\Support\Facades\DB;


class VentasController extends Controller
{
    public function show(){
        $ventas = Ventas::all();
        return view('Ventas.mostrar-ventas', ['ventas' => $ventas]);
    }

    public function realizarVenta(Request $request){
        if($request->ajax()){
            $total = 0;

            for($x = 0; $x < count($request->valores); $x++){
                $total += $request->valores[$x]['precioItem'] * $request->valores[$x]['contraseña'];
            }
            $clienteTempId = null;
            if($request->correoCliente){
                $clienteTemp = Cliente::where('Correo', '=', $request->correoCliente)->first();
                
                if($clienteTemp){
                    $clienteTempId = $clienteTemp->id;
                    $clienteTemp->update(['NumeroDePuntos' => $clienteTemp->NumeroDePuntos + $total / 1000]);
                }
                else{
                    $cliente = new Cliente();
                    $cliente->Correo = $request->correoCliente;
                    $cliente->NumeroDePuntos = $total / 1000;
                    $cliente = $cliente->save();
                    $clienteTemp = Cliente::where('Correo', '=', $request->correoCliente)->first();
                    $clienteTempId = $clienteTemp->id;
                }
            }
            $venta = Ventas::create(['Sede' => 1, 'Caja' => 1, 'NumeroProductos' => count($request->valores), 
                                    'TotalItems' => count($request->valores), 'TotalParcial' => $total, 'iva' => $total / 1.19, 
                                    'TotalDescuento' => 0, 'TotalVenta' => $total + ($total / 1.19), 'IdVendedor' => 2, 
                                    'IdCliente' => $clienteTempId
                            ]);

            for($x = 0; $x < count($request->valores); $x++){
                $insert = [
                    'IdVenta'                => $venta->id,
                    'CodigoProducto'         => Item::where('CodigoDeBarras', '=', $request->valores[$x]['nombre'])->first()->CodigoProducto,
                    'CantidadProducto'       => $request->valores[$x]['contraseña'],
                    'PrecioItem'             => $request->valores[$x]['precioItem'] * $request->valores[$x]['contraseña']
                ];
                DetalleVenta::create($insert);
            }
        }
    }

    public function generarReporteDeVentas(Request $request){
        $fileName = 'today_sales_' . date('Ymd') . '.xlsx';
        return Excel::download(new VentasExport, $fileName);
    }

    public function search(Request $request){
        $query = $request->input('query');

        $items = Item::where('CodigoProducto', 'LIKE', "%$query%")
                    ->get();

        return response()->json($items);
    }

    public function verRotacionesProductos(){
        $fechaActual = date('Y-m-d');
        $fechaHaceUnMes = date('Y-m-d', strtotime('-1 month'));
        $ventas = DetalleVenta::select('CodigoProducto', DB::raw('SUM(CantidadProducto) as cantidad'))
           ->whereBetween('created_at', [$fechaHaceUnMes, $fechaActual])
           ->groupBy('CodigoProducto')
           ->get();
        return response()->json($ventas);
    }
}
