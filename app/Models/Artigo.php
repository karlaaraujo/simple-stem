<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artigo extends Model{

    protected $table = 'artigo';

    protected $primaryKey = 'id_artigo';

    protected $fillable = [
        'titulo',
        'conteudo',
        'descricao',
        'tempo_leitura_segundos',
        'imagem_principal',
        'link_imagem_principal'
    ];

    protected $casts = [
        'dt_criacao' => 'datetime',
        'dt_ultima_atualizacao' => 'datetime',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_categoria', 'id_categoria');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'fk_subcategoria', 'id');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'fk_autor', 'id_autor');
    }

    public function nivelHabilidade()
    {
        return $this->belongsTo(NivelHabilidade::class, 'fk_nivel_habilidade', 'id_nivel_habilidade');
    }

    public function artigoPreRequisito()
    {
        return $this->belongsTo(Artigo::class, 'artigo_pre_requisito', 'id_artigo');
    }

    public function getImagemPrincipalAttribute($value)
    {
        return 'data:image/jpeg;base64,' . base64_encode($value);
    }

}
