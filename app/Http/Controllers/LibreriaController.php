<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Libreria;

class LibreriaController extends Controller
{
    public function index()
    {
        $librerias = Libreria::all();
        return view('librerias.index', compact('librerias'));
    }

    public function create()
    {
        return view('librerias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'calle' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'cp' => 'nullable|string|max:5',
        ]);

        Libreria::create($request->all());

        return redirect()->route('librerias.index')->with('success', 'Librería agregada correctamente.');
    }

    public function show($id)
    {
        $libreria = Libreria::findOrFail($id);
        return view('librerias.show', compact('libreria'));
    }

    public function edit($id)
    {
        $libreria = Libreria::findOrFail($id);
        return view('librerias.edit', compact('libreria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'calle' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'cp' => 'nullable|string|max:5',
        ]);

        $libreria = Libreria::findOrFail($id);
        $libreria->update($request->all());

        return redirect()->route('librerias.index')->with('success', 'Librería actualizada correctamente.');
    }

    public function destroy($id)
    {
        Libreria::findOrFail($id)->delete();
        return redirect()->route('librerias.index')->with('success', 'Librería eliminada correctamente.');
    }
}
