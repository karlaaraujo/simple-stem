<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'subcategoria';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_categoria', 'id_categoria');
    }
}
