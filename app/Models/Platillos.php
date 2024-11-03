<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillos extends Model
{
    use HasFactory;
    
    protected $table = 'platillos';

    protected $fillable = [
        'ordenId',
        'productosId',
        'producto',
        'precio',
        'cantidad',
    ];
}
