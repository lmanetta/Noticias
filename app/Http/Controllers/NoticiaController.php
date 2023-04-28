<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\NoticiaFactory;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = NoticiaFactory::generarNoticias(30);
        return view('backend.noticia.index', compact('noticias'));

    }
    public function show ($id)
    {
        $noticia = (object) array (
            'titulo' => "What is Lorem Ipsum?",
            'cuerpo' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            'imagen' => "https://servicepath.co/wp-content/uploads/2019/11/news-1200x565.jpg",
            'id' => $id);
        return view('backend.noticia.show', compact('noticia'));
    }
}
