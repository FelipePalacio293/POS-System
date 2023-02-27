<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = "vendedores";
    
    protected $fillable = [
        'id',
        'IdEmpresa',
        'Nombres',
        'PrimerApellido',
        'SegundoApellido'
    ];

    public function ventas() {
        return $this->hasMany('App\Models\Venta', 'id', 'IdVendedor');
    }
}
