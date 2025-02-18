<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    protected $table = 'tiendas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',

        'created_at',
        'updated_at',
    ];
}
