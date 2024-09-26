<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creditos extends Model
{
    protected $table = 'creditos';

    protected $fillable = [
        'id',
        'id_programa_estudios',
       'autoridades',
       'integrantes',
       'tutores_pedagogicos',
       'docente_lider',
       'equipo_apoyo'
    ];

}
