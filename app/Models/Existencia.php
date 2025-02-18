<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;
    protected $table = 'existencias';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_tienda',
        'id_producto',
        'cantidad',

        'created_at',
        'updated_at',
    ];
}
