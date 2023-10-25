<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NivelHabilidade extends Model
{
    protected $table = 'nivel_habilidade';

    protected $primaryKey = 'id_nivel_habilidade';

    protected $fillable = [
        'nome',
    ];
}





