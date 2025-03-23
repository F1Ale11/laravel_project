<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:autores,email',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente');
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            // Para el email, ignoramos el autor actual con unique:autores,email,ID_DEL_AUTOR
            'email' => 'required|email|unique:autores,email,' . $autor->id,
        ]);

        $autor->update($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor actualizado correctamente');
    }

    public function destroy($id)
    {
        $row = autor::find($id);
        $row->delete();
        return redirect("autores");
    }
}
