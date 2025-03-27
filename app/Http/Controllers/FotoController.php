<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Autor;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with('autor')->get();
        return view('fotos.index', compact('fotos'));
    }

    public function create()
    {
        $autores = Autor::all();
        return view('fotos.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'formato'  => 'required|string|max:50',
            'tamaño'   => 'required|string|max:1000000',
            'foto'     => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
        ]);

        Foto::create($request->all());
        return redirect()->route('fotos.index')->with('success', 'Foto creada correctamente.');
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        $autores = Autor::all();
        return view('fotos.edit', compact('foto', 'autores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'formato'  => 'required|string|max:50',
            'tamaño'   => 'required|string|max:50',
            'foto'     => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
        ]);

        $foto = Foto::findOrFail($id);
        $foto->update($request->all());
        return redirect()->route('fotos.index')->with('success', 'Foto actualizada correctamente.');
    }

    public function destroy($id)
    {
        Foto::findOrFail($id)->delete();
        return redirect()->route('fotos.index')->with('success', 'Foto eliminada correctamente.');
    }
}
