<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;

class VentasExport implements FromArray
{
   
    public function array() : array
    {
        $data = DB::table('ventas')->whereDate('FechaDeVenta', '=', today())->get();
        $array = json_decode(json_encode($data), true);
        return $array;
    }
}
