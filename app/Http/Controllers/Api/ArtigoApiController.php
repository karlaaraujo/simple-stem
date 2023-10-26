<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artigo;

class ArtigoApiController extends Controller
{
    public function getArtigoById($id)
    {
        $artigo = Artigo::with(
            'categoria',
            'autor',
            'nivelHabilidade',
            'artigoPreRequisito'
        )->find($id);

        if (!$artigo) {
            return response()->json(['error' => 'Artigo nao encontrado'], 404);
        }

        return response()->json($artigo);
    }
}
