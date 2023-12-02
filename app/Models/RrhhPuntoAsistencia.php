<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RrhhPuntoAsistencia extends Model
{
    use HasFactory;
    protected $table = 'rrhh_punto_asistencia';

    public function sucursal()
    {
        return $this->belongsTo(InvSucursal::class, 'id_sucursal');
    }

    public function almacen()
    {
        return $this->belongsTo(InvAlmacen::class, 'id_almacen');
    }
}
