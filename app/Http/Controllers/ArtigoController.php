<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ArtigoController extends Controller
{
    /**
     * Retorna o conteudo do artigo com id desejado.
     */
    public function lerArtigo(Request $request): Response
    {
         /*
          * Renderiza o componente Artigo.Vue passando o parametro 'id' da URL como
          * uma prop chamada 'id_artigo'
          */
        return Inertia::render('Artigo', [
            'id_artigo' =>  $request->route('id'),
        ]);
    }

    public function listarArtigosTermo(Request $request): Response
    {

        return Inertia::render('ListagemArtigos', [
            'termoPesquisa' =>  $request->route('termo'),
        ]);
    }

    public function listarArtigosSubcategoria(Request $request): Response
    {

        return Inertia::render('ListagemArtigos', [
            'subcategoria' =>  $request->route('idSubcategoria'),
        ]);
    }



}
