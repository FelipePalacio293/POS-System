<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes"; 

    protected $fillable = [
        'NumeroDePuntos',
        'Nombres',
        'PrimerApellido',
        'SegundoApellido',
        'Correo'
    ];

    public function compra() {
        return $this->hasMany('App\Models\Venta', 'id', 'IdCliente');
    }
}
