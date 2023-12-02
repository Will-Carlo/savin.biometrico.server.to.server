<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RrhhAsistencia extends Model
{
    use HasFactory;
    protected $table = 'rrhh_asistencia';

    public function turno()
    {
        return $this->belongsTo(RrhhTurno::class, 'id_turno');
    }

    public function personal()
    {
        return $this->belongsTo(RrhhPersonal::class, 'id_personal');
    }
}
