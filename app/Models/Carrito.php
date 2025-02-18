<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    protected $table = 'carrito';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_cliente',
        'id_producto',

        'created_at',
        'updated_at',
    ];

    /**
     * Get the Cliente that owns the Carrito
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Get the Producto that owns the Carrito
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
