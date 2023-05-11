<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\NoticiaFactory;
use App\Models\Noticia;
use App\Models\User;

class NoticiaController extends Controller
{
    public function index()
    {
        // $noticias = NoticiaFactory::generarNoticias(30);
        $noticias = Noticia::all();
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

    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('backend.noticias.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'titulo' => 'required|unique:noticias',
                'cuerpo' => 'required',
                'autor' => 'required',
                'image' => 'image|max:2048'
            ]
        );

        $noticia = new Noticia();
        $noticia->titulo = $request->input('titulo');
        $noticia->cuerpo = $request->input('cuerpo');
        $archivoImagen = $request->file('imagen');
        $noticia->autor = $request->input('autor');
        $noticia->save();
        //php artisan storage:link
        if ($request->hasFile('imagen')) {
            $archivoImagen = $request->file('imagen');
            $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
            $savedPath = str_replace("public/", "", $path);
            $noticia->imagen = $savedPath;
            $noticia->save();
        }

        $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $noticia->titulo);
        return redirect()->route('noticias.create');
    }
}
