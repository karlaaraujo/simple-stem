<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    protected $table = 'profissao';

    protected $primaryKey = 'id_profissao';

    protected $fillable = [
        'nome',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_categoria', 'id_categoria');
    }
}
