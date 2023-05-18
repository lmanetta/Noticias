<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Factories\NoticiaFactory;
use App\Models\Noticia;
use App\Models\User;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $noticias = NoticiaFactory::generarNoticias(30);
        $noticias = Noticia::all();
        return view('backend.noticia.index', compact('noticias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::pluck('name', 'id'); //si uso el User::all me trae todo
        return view('backend.noticia.create', compact('users')); //el compact trae los usuarios
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $noticia = new Noticia();
        $noticia->titulo = $request->input('titulo');
        $noticia->cuerpo = $request->input('cuerpo');
        // $archivoImagen = $request->file('imagen');
        $noticia->autor = $request->input('autor');
        $noticia->save();
    }

    /**
     * Display the specified resource.
     */
    public function show ($id)
    {
        // $noticia = (object) array (
        //     'titulo' => "What is Lorem Ipsum?",
        //     'cuerpo' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        //     'imagen' => "https://servicepath.co/wp-content/uploads/2019/11/news-1200x565.jpg",
        //     'id' => $id);
        // return view('backend.noticia.show', compact('noticia'));

        $noticia = Noticia::findOrFail($id);
        return view('backend.noticia.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        $users = User::pluck('name', 'id');
        return view('backend.noticia.edit', compact('noticia', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noticia = Noticia::findOrFail($id);
        $validatedData = $request->validate(
            [
                'titulo' => 'required|unique:noticias,titulo,' . $id,
                'cuerpo' => 'required',
                'autor' => 'required',
                'image' => 'image|max:2048'
            ]
        );

        $noticia->update($validatedData);
        $noticia->autor = $request->input('autor');
        $noticia->save();

        $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $noticia->titulo);
        return redirect()->route('noticias.edit', $noticia->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
