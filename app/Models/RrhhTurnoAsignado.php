<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RrhhTurnoAsignado extends Model
{
    use HasFactory;
    protected $table = 'rrhh_turno_asignado';

    public function turno()
    {
        return $this->belongsTo(RrhhTurno::class, 'id_turno');
    }

    public function personal()
    {
        return $this->belongsTo(RrhhPersonal::class, 'id_personal');
    }

    public function puntoAsistencia()
    {
        return $this->belongsTo(RrhhPuntoAsistencia::class, 'id_punto_asistencia');
    }
}
