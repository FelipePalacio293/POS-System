<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table = "ventas"; 
    protected $fillable = [
        'Sede',
        'Caja',
        'NumeroProductos',
        'TotalItems',
        'TotalParcial',
        'iva',
        'TotalDescuento',
        'TotalVenta',
        'FechaDeVenta',
        'IdVendedor',
        'IdCliente',
        'Observaciones'
    ];

    public function detalleVenta() {
        return $this->hasMany('App\Models\DetalleVenta', 'IdVenta', 'id');
    }

    public function vendedor() {
        return $this->belongsTo('App\Models\Vendedor', 'IdVendedor', 'id');
    }

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente', 'IdCliente', 'id');
    }
}
