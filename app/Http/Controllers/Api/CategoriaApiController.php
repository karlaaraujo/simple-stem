<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subcategoria;

class CategoriaApiController extends Controller
{
    public function getSubcategorias($idCategoria)
    {

        $subcategorias = Subcategoria::with('categoria')
            ->where('fk_categoria', $idCategoria)
            ->get();

        return response()->json($subcategorias);
    }
}
