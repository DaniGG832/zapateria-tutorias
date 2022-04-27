<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    public function zapato()
    {
        return $this->belongsTo(Zapato::class);
    }

    public function factura()
    {
        return $this->belongsTo(factura::class);
    }
}
