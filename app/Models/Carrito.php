<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{

    //carritos (id, user_id, zapato_id, cantidad)

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function zapato()
    {
        return $this->belongsTo(Zapato::class);
    }
}
