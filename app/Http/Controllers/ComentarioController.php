<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::with('autor')->get();
        return view('comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        $autores = Autor::all();
        return view('comentarios.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'observacion' => 'required|string',
            'autor_id'    => 'required|exists:autores,id',
        ]);

        Comentario::create($request->all());
        return redirect()->route('comentarios.index')->with('success', 'Comentario creado correctamente.');
    }

    public function edit($id)
    {
        $comentario = Comentario::findOrFail($id);
        $autores = Autor::all();
        return view('comentarios.edit', compact('comentario', 'autores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'observacion' => 'required|string',
            'autor_id'    => 'required|exists:autores,id',
        ]);

        $comentario = Comentario::findOrFail($id);
        $comentario->update($request->all());
        return redirect()->route('comentarios.index')->with('success', 'Comentario actualizado correctamente.');
    }

    public function destroy($id)
    {
        Comentario::findOrFail($id)->delete();
        return redirect()->route('comentarios.index')->with('success', 'Comentario eliminado correctamente.');
    }
}
