<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'CodigoProducto',
        'CodigoDeBarras',
        'PrecioProducto',
        'NombreProducto',
        'Cantidad'
    ];

    protected $table = "items";
    protected $primaryKey = "CodigoProducto";

    public function detalleVenta() {
        return $this->hasMany('App\Models\DetalleVenta', 'CodigoProducto', 'CodigoProducto');
    }
}
