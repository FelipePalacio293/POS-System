<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = "detalleventas";
    protected $fillable = [
        'IdVenta',
        'CodigoProducto',
        'CantidadProducto',
        'PrecioItem',
        'TotalDescuentoItem'
    ];

    public function detalleVenta() {
        return $this->hasMany('App\Models\Item', 'CodigoProducto', 'CodigoProducto');
    }

    public function venta() {
        return $this->belongsTo('App\Models\Venta', 'id', 'IdVenta');
    }
}
