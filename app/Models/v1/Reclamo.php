<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $table = 'reclamos';

    protected $primaryKey = 'reclamoID';

    protected $fillable = [
        'nombres_cliente',
        'apellidos_cliente',
        'dni_cliente',
        'telefono_cliente',
        'correo_cliente',
        'sexo',
        'productoID',
        'tipo_reclamo',
        'descripcion',
    ];



    public function producto()
    {
        //return $this->belongsTo(Producto::class, 'productoID');
        return $this->belongsTo(Producto::class, 'productoID', 'productoID');
    }

}
