<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autor';

    protected $primaryKey = 'id_autor';

    protected $fillable = [
        'p_nome',
        'u_nome',
        'descricao_curriculo',
        'telefone',
        'email',
    ];

    public function profissao()
    {
        return $this->belongsTo(Profissao::class, 'fk_profissao', 'id_profissao');
    }

    public function categoriaEspecializacao()
    {
        return $this->belongsTo(Categoria::class, 'fk_categoria_especializacao', 'id_categoria');
    }
}
